<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function getById($id)
    {
        try {
            $client = Client::findOrFail($id);
            return response()->json($client); 
        } catch (\Exception $e) {
            return response()->json('Client non trouvé', 404);
        }
    }
    //
    public function getAll(Request $request)
    {
        $limit = $request->get('limit');
        $sort = $request->get('sort');
        $sortOrder = $request->get('sortOrder');
        $nbPage = $request->get('nbPage');
        $offset = $limit * $nbPage;
        $filter = $request->has('filter') ? $request->get('filter') : null;
        if($filter != null){
            $clients = Client::where('firstname', 'like', '%' . $filter . '%')
                                ->orWhere('lastname', 'like', '%' . $filter . '%')
                                ->orWhere('mail', 'like', '%' . $filter . '%')
                                ->orWhere('cellphone', 'like', '%' . $filter . '%')
                                ->orWhere('phone', 'like', '%' . $filter . '%')
                                ->skip($offset)
                                ->limit($limit)
                                ->orderBy($sort, $sortOrder)
                                ->get();
        }else{
            $clients = Client::skip($offset)
                                ->limit($limit)
                                ->orderBy($sort, $sortOrder)
                                ->get();
        }

        return response()->json($clients, 200);
    }

    public function getByUser($userId, Request $request){
        try {
            $user = User::findOrFail($userId);
            $limit = $request->get('limit');
            $sort = $request->get('sort');
            $sortOrder = $request->get('sortOrder');
            $nbPage = $request->get('nbPage');
            $offset = $limit * $nbPage;
            $filter = $request->has('filter') ? $request->get('filter') : null;
            if($filter != null){
                $clients = Client::where('user_id', $user->id)
                                    ->where('firstname', 'like', '%' . $filter . '%')
                                    ->orWhere('lastname', 'like', '%' . $filter . '%')
                                    ->orWhere('mail', 'like', '%' . $filter . '%')
                                    ->orWhere('cellphone', 'like', '%' . $filter . '%')
                                    ->orWhere('phone', 'like', '%' . $filter . '%')
                                    ->skip($offset)
                                    ->limit($limit)
                                    ->orderBy($sort, $sortOrder)
                                    ->get();
            }else{
                $clients = Client::where('user_id', $user->id)
                                    ->skip($offset)
                                    ->limit($limit)
                                    ->orderBy($sort, $sortOrder)
                                    ->get();
            }
            return response()->json($clients, 200);
        } catch (\Exception $e) {
            return response()->json('Utilisateur non trouvé', 404);
        }
        
    }
    
    public function post(Request $request){
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|max:50',
            'lastname' => 'required|max:50',
            'mail' => 'required|email|unique:users|max:255',
            'cellphone' => [
                'size:10',
                Rule::requiredIf($request->input('phone') === null)
            ],
            'phone' => [
                'size:10',
                Rule::requiredIf($request->input('cellphone') === null)
            ],
            'client_type_id' => 'required|integer',
            'user_id' => 'required|integer'
        ],
        [
            'required' => 'Vous devez remplir ce champ',
            'max' => 'Les données entrées sont trop longue, veuillez raccourcir',
            'email' => 'Veuillez remplir un mail valide',
            'mail.unique' => 'Cette adresse mail est déjà utilisée',
            'cellphone.size' => 'Veuillez entrer un numéro de téléphone valide',
            'phone.size' => 'Veuillez entrer un numéro de téléphone valide'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $client = new Client();

        $client->firstname = $request->firstname;
        $client->lastname = $request->lastname;
        $client->mail = $request->mail;
        $client->username = $request->username;
        $client->cellphone = $request->cellphone;
        $client->phone = $request->phone;
        $client->client_type_id = $request->client_type_id;
        $client->user_id = $request->user_id;


        $isSaved = $client->save();

        if($isSaved == true){
            return response()->json(['message' => 'Le client à bien été ajouté.'], 200);
        }else {
            return response()->json(['message' => 'Il y a eu un problème lors de l\'ajout du client.'], 500);
        }
    }

    public function put($id, Request $request){
        try {
            $client = Client::findOrFail($id);
            $validator = Validator::make($request->all(), [
                'firstname' => 'required|max:50',
                'lastname' => 'required|max:50',
                'mail' => 'required|email|unique:users|max:255',
                'cellphone' => [
                    'size:10',
                    Rule::requiredIf($request->input('phone') === null)
                ],
                'phone' => [
                    'size:10',
                    Rule::requiredIf($request->input('cellphone') === null)
                ],
                'client_type_id' => 'required|integer',
                'user_id' => 'required|integer'
            ],
            [
                'required' => 'Vous devez remplir ce champ',
                'max' => 'Les données entrées sont trop longue, veuillez raccourcir',
                'email' => 'Veuillez remplir un mail valide',
                'mail.unique' => 'Cette adresse mail est déjà utilisée',
                'cellphone.size' => 'Veuillez entrer un numéro de téléphone valide',
                'phone.size' => 'Veuillez entrer un numéro de téléphone valide'
            ]);
            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }
    
            $client->firstname = $request->firstname;
            $client->lastname = $request->lastname;
            $client->mail = $request->mail;
            $client->username = $request->username;
            $client->cellphone = $request->cellphone;
            $client->phone = $request->phone;
            $client->client_type_id = $request->client_type_id;
            $client->user_id = $request->user_id;
    
    
            $isSaved = $client->save();
    
            if($isSaved == true){
                return response()->json(['message' => 'Le client à bien été modifié.'], 200);
            }else {
                return response()->json(['message' => 'Il y a eu un problème lors de la modification du client.'], 500);
            }
        } catch (\Exception $e) {
            return response()->json('Client non trouvé', 404);
        }
    }

    public function delete($id) {
        try{
            $client = Client::findOrFail($id);
            $client->delete();
            return response()->json('Client supprimer', 200);
        }catch(\Exception $e){
            return response()->json('Client non trouvé', 404);
        }
    }
}

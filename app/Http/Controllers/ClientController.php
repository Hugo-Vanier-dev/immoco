<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
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
        $client = Client::findOrFail($id);
        return $client;
    }
    public function getAll()
    {
        $clients = Client::all();
        return response()->json($clients) ;
    }
    public function getByUser($id)
    {
        try{
        $user = User::findOrFail($id);
        $clients = Client::where(['user_id'=>$id])->get();
        return response()->json($clients, 200);
        }catch(\Exception $e){
            return response()->json('Commercial non trouvé', 404);
        }
    }
    public function createClient(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|max:50',
            'lastname' => 'required|max:50',
            'mail' => 'required|email|unique:clients|max:255',
            'cellphone' => [
                'size:10',
                Rule::requiredIf($request->input('phone') === null)
            ],
            'phone' => [
                'size:10',
                Rule::requiredIf($request->input('cellphone') === null)
            ],
            'user_type_id' => 'required|integer'
        ],
        [
            'required' => 'Veuillez remplir ce champ',
            'max' => 'Caractères maximum dépassés',
            'email' => 'Veuillez une adresse mail valide',
            'mail.unique' => 'Cette adresse mail est déjà utilisée',
            'cellphone.size' => 'Veuillez entrer un numéro de téléphone valide',
            'phone.size' => 'Veuillez entrer un numéro de téléphone valide'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $client = new Client();

        $client->firstname = $request->firstname;
        $client->lastname = $request->lastname;
        $client->mail = $request->mail;
        $client->cellphone = $request->cellphone;
        $client->phone = $request->phone;
        $client->user_type_id = $request->user_type_id;

        $isSaved = $client->save();

        if($isSaved == true){
            return response()->json(['message' => 'Le client à bien été ajouté.']);
        }else {
            return response()->json(['message' => 'Un problème est survenu lors de l\'ajout du client.']);
        }
    }  
    
    public function updateClient($id){
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|max:50',
            'lastname' => 'required|max:50',
            'mail' => 'required|email|unique:clients|max:255',
            'cellphone' => [
                'size:10',
                Rule::requiredIf($request->input('phone') === null)
            ],
            'phone' => [
                'size:10',
                Rule::requiredIf($request->input('cellphone') === null)
            ],
            'user_type_id' => 'required|integer'
        ],
        [
            'required' => 'Veuillez remplir ce champ',
            'max' => 'Caractères maximum dépassés',
            'email' => 'Veuillez une adresse mail valide',
            'mail.unique' => 'Cette adresse mail est déjà utilisée',
            'cellphone.size' => 'Veuillez entrer un numéro de téléphone valide',
            'phone.size' => 'Veuillez entrer un numéro de téléphone valide'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $client = new Client();

        $client->firstname = $request->firstname;
        $client->lastname = $request->lastname;
        $client->mail = $request->mail;
        $client->cellphone = $request->cellphone;
        $client->phone = $request->phone;
        $client->user_type_id = $request->user_type_id;

        $isSaved = $client->save();

        if($isSaved == true){
            return response()->json(['message' => 'Le client à bien été mis-à-jour.']);
        }else {
            return response()->json(['message' => 'Un problème est survenu lors de la m-à-j du client.']);
        }
    }
    public function deleteClient($id){
        $client = Client::find($id);
        $client->delete();
        return response()->json('Client archivé.');
    }
}

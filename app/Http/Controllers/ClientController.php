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
            $client = Client::with('user')
                ->with('clientType')
                ->with('appointments')
                ->with('properties')
                ->with('clientWish')
                ->findOrFail($id);
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
        if ($filter != null) {
            $clients = Client::with('user')
                ->with('clientType')
                ->with('appointments')
                ->with('properties')
                ->with('clientWish')
                ->where('firstname', 'like', '%' . $filter . '%')
                ->orWhere('lastname', 'like', '%' . $filter . '%')
                ->orWhere('mail', 'like', '%' . $filter . '%')
                ->orWhere('cellphone', 'like', '%' . $filter . '%')
                ->orWhere('phone', 'like', '%' . $filter . '%')
                ->skip($offset)
                ->limit($limit)
                ->orderBy($sort, $sortOrder)

                ->get();
        } else {
            $clients = Client::with('user')
                ->with('clientType')
                ->with('appointments')
                ->with('properties')
                ->with('clientWish')
                ->skip($offset)
                ->limit($limit)
                ->orderBy($sort, $sortOrder)
                ->get();
        }

        return response()->json($clients, 200);
    }

    public function countAllClient()
    {
        $clientCount = Client::where('archive', 0)->count();
        return response()->json($clientCount, 200);
    }

    public function countAllClientByUser($userId)
    {
        $clientCount = Client::where('archive', 0)->where('user_id', $userId)->count();
        return response()->json($clientCount, 200);
    }

    public function getByUser($userId)
    {
        try {
            $user = User::findOrFail($userId);
            $clients = Client::with('user')
                ->with('clientType')
                ->with('appointments')
                ->with('properties')
                ->with('clientWish')
                ->where('user_id', $user->id)
                ->get();
            return response()->json($clients, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getCode());
        }
    }

    public function create(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'firstname' => 'required|max:50',
                'lastname' => 'required|max:50',
                'mail' => 'required|email|unique:users|max:255',
                'client_type_id' => 'required|integer',
                'user_id' => 'required|integer'
            ],
            [
                'required' => 'Vous devez remplir ce champ',
                'max' => 'Les données entrées sont trop longue, veuillez raccourcir',
                'email' => 'Veuillez remplir un mail valide',
                'mail.unique' => 'Cette adresse mail est déjà utilisée'
            ]
        );
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $client = new Client();

        $client->firstname = $request->firstname;
        $client->lastname = $request->lastname;
        $client->mail = $request->mail;
        $client->cellphone = $request->cellphone;
        $client->phone = $request->phone;
        $client->streetNumber = $request->streetNumber;
        $client->birthdate = $request->birthdate;
        $client->streetName = $request->streetName;
        $client->zipCode = $request->zipCode;
        $client->city = $client->city;
        $client->description = $client->description;
        $client->client_type_id = $request->client_type_id;
        $client->user_id = $request->user_id;
        $client->sexe = 1;

        

        $isSaved = $client->save();

        if ($isSaved == true) {
            return response()->json(['message' => 'Le client à bien été ajouté.'], 200);
        } else {
            return response()->json(['message' => 'Il y a eu un problème lors de l\'ajout du client.'], 500);
        }
    }

    public function put($id, Request $request)
    {
        try {
            $client = Client::findOrFail($id);
            $validator = Validator::make(
                $request->all(),
                [
                    'firstname' => 'required|max:50',
                    'lastname' => 'required|max:50',
                    'mail' => 'required|email|unique:users|max:255',
                    'client_type_id' => 'required|integer',
                    'user_id' => 'required|integer'
                ],
                [
                    'required' => 'Vous devez remplir ce champ',
                    'max' => 'Les données entrées sont trop longue, veuillez raccourcir',
                    'email' => 'Veuillez remplir un mail valide',
                    'mail.unique' => 'Cette adresse mail est déjà utilisée'
                ]
            );
            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }

            $client->firstname = $request->firstname;
            $client->lastname = $request->lastname;
            $client->mail = $request->mail;
            $client->cellphone = $request->cellphone;
            $client->phone = $request->phone;
            $client->streetNumber = $request->streetNumber;
            $client->birthdate = $request->birthdate;
            $client->streetName = $request->streetName;
            $client->zipCode = $request->zipCode;
            $client->city = $client->city;
            $client->description = $client->description;
            $client->client_type_id = $request->client_type_id;
            $client->user_id = $request->user_id;
            $client->sexe = $request->sexe;


            $isSaved = $client->save();

            if ($isSaved == true) {
                return response()->json(['message' => 'Le client à bien été modifié.'], 200);
            } else {
                return response()->json(['message' => 'Il y a eu un problème lors de la modification du client.'], 500);
            }
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), $e->getCode());
        }
    }

    public function delete($id)
    {
        try {
            $client = Client::findOrFail($id);
            $client->delete();
            return response()->json('Client supprimer', 200);
        } catch (\Exception $e) {
            return response()->json('Client non trouvé', 404);
        }
    }
}

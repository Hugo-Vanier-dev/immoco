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
    public function getAll(Request $request)
    {
        $limit = $request->input('limit');
        $client = Client::findOrFail($request);
        return $client;
    }
    public function getByUser($id)
    {
        try{
        $user = User::findOrFail($id);
        $client = Client::where(['user_id'=>$id])->get();
        return response()->json($client, 200);
        }catch(\Exception $e){
            return response()->json('Commercial non trouvé', 404);
        }
    }
    public function createClient(Request $request)
    {
        $client = Client::where('user_id',$request->route('id'));
        $client->create();
        return response()->json($client);
    }
    public function updateClient($id){
        $client = Client::find($id);
        $client->save();
        return response()->json($client);
    }
    public function deleteClient($id){
        $client = Client::find($id);
        $client->delete();
        return response()->json('Client archivé.');
    }
}

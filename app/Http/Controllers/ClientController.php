<?php

namespace App\Http\Controllers;

use App\Models\Client;
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
    public function getByUser(Request $request)
    {
        $client = Client::where('id_users', $request->route('id_users'))
        ->whereDate('date', '>', date($request->get('dateStart')))
        ->whereDate('date', '<', date($request->get('dateEnd')))
        ->get();
        return response()->json($client);
    }
    public function createClient(Request $request)
    {
        $client = Client::where('id_users',$request->route('id_clients'));
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

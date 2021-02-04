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
        $client=Client::findOrFail($id);
        return $client;
    }
    //
    public function getAll(Request $request)
    {
        $limit=$request->input('limit');
        $client=Client::findOrFail($request);
        return $client;
    }
    //
}

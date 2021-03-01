<?php

namespace App\Http\Controllers;

use App\Models\ClientType;

class ClientTypeController extends Controller
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

    public function gets(){
        $clientType = ClientType::all();
        return response()->json($clientType);
    }

}
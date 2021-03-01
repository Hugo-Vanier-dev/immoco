<?php

namespace App\Http\Controllers;

use App\Models\ShutterType;

class ShutterTypeController extends Controller
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
        $shutterType = ShutterType::all();
        return response()->json($shutterType);
    }

}
<?php

namespace App\Http\Controllers;

use App\Models\HeaterType;

class HeaterTypeController extends Controller
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
        $heaterType = HeaterType::all();
        return response()->json($heaterType);
    }

}
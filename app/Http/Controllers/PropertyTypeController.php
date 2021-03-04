<?php

namespace App\Http\Controllers;

use App\Models\PropertyType;

class PropertyTypeController extends Controller
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
        $propertyType = PropertyType::all();
        return response()->json($propertyType, 200);
    }

}
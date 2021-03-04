<?php

namespace App\Http\Controllers;

use App\Models\UserType;

class UserTypeController extends Controller
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
        $userType = UserType::all();
        return response()->json($userType, 200);
    }

}
<?php

namespace App\Http\Controllers;

use App\Models\AppointmentType;

class AppointmentTypeController extends Controller
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
        $appointmentType = AppointmentType::all();
        return response()->json($appointmentType);
    }

}


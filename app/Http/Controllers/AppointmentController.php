<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
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
        $appointment=Appointment::findOrFail($id);
        return $appointment;
    }
    //
    public function getByUser($userId, Request $request)
    {
        $appointment = Appointment::all()
        ->where('date', '=', '2021-01-08 10:30:00')
        //->where('date', '<=', '')
        ->where('id_users', '=', $userId)
        ->get('id_clients', 'date');
    }
    //
    public function getByClient($clientId)
    {
        $limit=$request->input('limit');
        $appointment=Appointment::findOrFail($request);
        return $appointment;
    }
    //
    public function createAppointment(Request $request){
       
        $appointment = Appointment::create($request->all());
        return response()->json($appointment);
   
    }
    //
    public function updateAppointment(Request $request, $id){
        $appointment  = Appointment::find($id);
        $appointment->day = $request->input('day');
        $appointment->month = $request->input('month');
        $appointment->year = $request->input('year');
        $appointment->hour = $request->input('hour');
        $appointment->save();
        return response()->json($appointment);
    }  
    //
    public function deleteAppointment($id){
        $appointment  = Appointment::find($id);
        $appointment->delete();
   
        return response()->json('Rendez-vous supprimé avec succès.');
    }
    //
}


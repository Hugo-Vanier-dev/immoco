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
        $appointment = Appointment::findOrFail($id);
        return response()->json($appointment);
    }
    //
    public function getByUser(Request $request)
    {
        $appointments = Appointment::where('id_users', $request->route('id_users'))
        ->whereDate('date', '>', date($request->get('dateStart')))
        ->whereDate('date', '<', date($request->get('dateEnd')))
        ->get();
        return response()->json($appointment);
    }
    //
    public function getByClient(Request $request)
    {
        $appointment = Appointment::where('id_clients', $request->route('id_clients'))
        ->get();
        return response()->json($appointment);
    }
    //
    public function createAppointment(Request $request)
    {
        $appointment = Appointment::where('id_users',$request->route('id_clients'));
        $appointment->create();
        return response()->json($appointment);
   
    }
    //
    public function updateAppointment($id){
        $appointment = Appointment::find($id);
        $appointment->date = input('date');
        $appointment->save();
        return response()->json($appointment);
    }  
    //
    public function deleteAppointment($id){
        $appointment = Appointment::find($id);
        $appointment->delete();
        return response()->json('Rendez-vous supprimé avec succès.');
    }
    //
}


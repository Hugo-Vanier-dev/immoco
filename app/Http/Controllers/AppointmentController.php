<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        try {
            $appointment = Appointment::with('user')->with('client')->with('appointmentType')->findOrFail($id);
            return response()->json($appointment);
        } catch (\Exception $e) {
            return response()->json('Rendez-vous non trouvé', 404);
        }
    }

    public function getNextAppointmentByUser($userId){
        try {
            $user = User::findOrFail($userId);
            $appointment = Appointment::with('user')
                                        ->with('client')
                                        ->with('appointmentType')
                                        ->where('user_id', $user->id)
                                        ->whereDate('date', '>', date('Y-m-d'))
                                        ->orWhere(function($query) {
                                            $query->whereDate('date', '=', date('Y-m-d'))
                                            ->whereTime('date', '>', date('h:m:s'));
                                        })
                                        ->orderBy('date', 'asc')
                                        ->take(1)
                                        ->get()[0];
            return response()->json($appointment);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 404);
        }
    }
    //
    public function getByUser($userId, Request $request)
    {
        try {
            $user = User::findOrFail($userId);
            $appointments = Appointment::with('user')
                                            ->with('client')
                                            ->with('appointmentType')
                                            ->where('user_id', $user->id)
                                            ->whereDate('date', '>', date($request->get('dateStart')))
                                            ->whereDate('date', '<', date($request->get('dateEnd')))
                                            ->get();
            return response()->json($appointments);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 404);
        }
    }
    public function getByUserAndDate($userId,  Request $request){
        try {
            $user = User::findOrFail($userId);
            $appointments = Appointment::with('user')
                                            ->with('client')
                                            ->with('appointmentType')
                                            ->where('user_id', $user->id)
                                            ->whereDate('date', '=', date($request->get('date')))
                                            ->get();
            return response()->json($appointments);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 404);
        }
    }
    //
    public function getByClient($clientId)
    {
        try {
            $client = Client::findOrFail($clientId);
            $appointments = Appointment::with('user')
                                            ->with('client')
                                            ->with('appointmentType')
                                            ->where('id_clients', $client->id)
                                            ->get();
            return response()->json($appointments);
        } catch (\Exception $e) {
            return response()->json('Client non trouvé', 404);
        }
    }

    public function createAppointment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'city' => 'required|max:100',
            'adress' => 'required|max:255',
            'date' => 'required|date',
            'appointment_type_id' => 'required|integer',
            'user_id' => 'required|integer',
            'client_id' => 'required|integer'
        ],
        [
            'required' => 'Vous devez remplir ce champ',
            'max' => 'Les données entrées sont trop longue, veuillez raccourcir',
            'date' => 'A tester, sert à vérifier que c\'est une date'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $appointment = new Appointment();

        $appointment->city = $request->city;
        $appointment->adress = $request->adress;
        $appointment->description = $request->description;
        $appointment->date = $request->date;
        $appointment->appointment_type_id = $request->appointment_type_id;
        $appointment->user_id = $request->user_id;
        $appointment->client_id = $request->client_id;

        $isSaved = $appointment->save();

        if($isSaved == true){
            return response()->json(['message' => 'Le rendez-vous à bien été ajouté.'], 200);
        }else {
            return response()->json(['message' => 'Il y a eu un problème lors de l\'ajout du rendez-vous.'], 500);
        }
    }
    //
    public function updateAppointment($id, Request $request){
        try {
            $appointment = Appointment::findOrFail($id);
            $validator = Validator::make($request->all(), [
                'city' => 'required|max:100',
                'adress' => 'required|max:255',
                'date' => 'required|date',
                'appointment_type_id' => 'required|integer',
                'user_id' => 'required|integer',
                'client_id' => 'required|integer'
            ],
            [
                'required' => 'Vous devez remplir ce champ',
                'max' => 'Les données entrées sont trop longue, veuillez raccourcir',
                'date' => 'A tester, sert à vérifier que c\'est une date'
            ]);
            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }

            $appointment->city = $request->city;
            $appointment->adress = $request->adress;
            $appointment->description = $request->description;
            $appointment->date = $request->date;
            $appointment->appointment_type_id = $request->appointment_type_id;
            $appointment->user_id = $request->user_id;
            $appointment->client_id = $request->client_id;
    
            $isSaved = $appointment->save();
    
            if($isSaved == true){
                return response()->json(['message' => 'Le rendez-vous à bien été modifié.'], 200);
            }else {
                return response()->json(['message' => 'Il y a eu un problème lors de la modification du rendez-vous.'], 500);
            }
        } catch (\Exception $e) {
            return response()->json('Rendez-vous non trouvé', 404);
        }
    }      
    //
    public function deleteAppointment($id){
        try {
            $appointment = Appointment::findOrFail($id);
            $appointment->delete();
            return response()->json('Rendez-vous supprimer', 200);
        } catch (\Exception $e) {
            return response()->json('Rendez-vous non trouvé', 404);
        }
    }
}


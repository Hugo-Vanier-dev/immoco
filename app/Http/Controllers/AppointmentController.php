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
            $appointment = Appointment::findOrFail($id);
            return response()->json($appointment);
        } catch (\Exception $e) {
            return response()->json('Rendez-vous non trouvé', 404);
        }
    }
    //
    public function getByUser($userId, Request $request)
    {
        try {
            $user = User::findOrFail($userId);
            $appointments = Appointment::where('id_users', $user->id)
                                            ->whereDate('date', '>', date($request->get('dateStart')))
                                            ->whereDate('date', '<', date($request->get('dateEnd')))
                                            ->get();
            return response()->json($appointments);
        } catch (\Exception $e) {
            return response()->json('Utilisateur non trouvé', 404);
        }
    }
    //
    public function getByClient($clientId)
    {
        try {
            $client = Client::findOrFail($clientId);
            $appointments = Appointment::where('id_clients', $client->id)->get();
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
            return response()->json($validator->errors());
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
            return response()->json(['message' => 'Le rendez-vous à bien été ajouté.']);
        }else {
            return response()->json(['message' => 'Il y a eu un problème lors de l\'ajout du rendez-vous.']);
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
                return response()->json($validator->errors());
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
                return response()->json(['message' => 'Le rendez-vous à bien été modifié.']);
            }else {
                return response()->json(['message' => 'Il y a eu un problème lors de la modification du rendez-vous.']);
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
            return response()->json('Rendez-vous supprimer');
        } catch (\Exception $e) {
            return response()->json('Rendez-vous non trouvé', 404);
        }
    }
}


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function createUser(Request $request){

        $validator = Validator::make($request->all(), [
            'firstname' => 'required|max:50',
            'lastname' => 'required|max:50',
            'mail' => 'required|email|unique:users|max:255',
            'username' => 'required|max:50',
            'password' => 'required',
            'user_type_id' => 'required|integer'
        ],
        [
            'required' => 'Vous devez remplir ce champ',
            'max' => 'Les données entrées sont trop longue, veuillez raccourcir',
            'email' => 'Veuillez remplir un mail valide',
            'mail.unique' => 'Cette adresse mail est déjà utilisée'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $user = new User();

        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->mail = $request->mail;
        $user->username = $request->username;
        $user->cellphone = $request->cellphone;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->sexe = $request->sexe;
        $user->user_type_id = $request->user_type_id;

        $isSaved = $user->save();

        if($isSaved == true){
            return response()->json(['message' => 'L\'utilisateur à bien été ajouté.'], 200);
        }else {
            return response()->json(['message' => 'Il y a eu un problème lors de l\'ajout de l\'utilisateur.'], 500);
        }
    }

    public function get($id){
        try{
            $user = User::with('userType')
                ->with('appointments')
                ->with('clients')
                ->findOrFail($id);
            return response()->json($user);
        }catch(\Exception $e){
            return response()->json($e->getMessage(), 404);
        }
    }

    public function gets(){
        $users = User::with('userType')->get();
        return response()->json($users);
    }

    public function put($id, Request $request){
        try{
            $user = User::findOrFail($id);
            $validator = Validator::make($request->all(), [
                'firstname' => 'required|max:50',
                'lastname' => 'required|max:50',
                'mail' => 'required|email|unique:users|max:255',
                'username' => 'required|max:50',
                'user_type_id' => 'required|integer'
            ],
            [
                'required' => 'Vous devez remplir ce champ',
                'max' => 'Les données entrées sont trop longue, veuillez raccourcir',
                'email' => 'Veuillez remplir un mail valide',
                'mail.unique' => 'Cette adresse mail est déjà utilisée'
            ]);
            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }
            $user->firstname = $request->firstname;
            $user->lastname = $request->lastname;
            $user->mail = $request->mail;
            $user->username = $request->username;
            if($request->cellphone){
                $user->cellphone = $request->cellphone;
            }
            if($request->phone){
                $user->phone = $request->phone;
            }
            if($request->sexe) {
                $user->sexe = $request->sexe;
            }
            if($request->user_type_id){
                $user->user_type_id = $request->user_type_id;
            }
            

            $isSaved = $user->save();

            if($isSaved == true){
                return response()->json(['message' => 'L\'utilisateur à bien été modifié.'], 200);
            }else {
                return response()->json(['message' => 'Il y a eu un problème lors de l\'ajout de l\'utilisateur.'], 500);
            }
        }catch(\Exception $e){
            return response()->json('Utilisateur non trouvé', 404);
        }
    }

    public function delete($id) {
        try{
            $user = User::findOrFail($id);
            $user->delete();
            return response()->json('Utilisateur supprimer', 200);
        }catch(\Exception $e){
            return response()->json('Utilisateur non trouvé', 404);
        }
    }
}

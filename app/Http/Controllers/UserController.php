<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\User;

class UserController extends Controller
{
    public function createUser(Request $request){

        $validator = Validator::make($request->all(), [
            'firstname' => 'required|max:50|alpha_dash',
            'lastname' => 'required|max:50|alpha_dash',
            'mail' => 'required|email|unique:users|max:255',
            'username' => 'required|unique:users|max:50',
            'cellephone' => [
                'nullable|max:15',
                Rule::requiredIf($request->user()->phone === null)
            ],
            'phone' => [
                'nullable|max:15',
                Rule::requiredIf($request->user()->cellphone === null)
            ]
        ]);
        if ($validator->fails()) {
            return redirect()
                        ->withErrors($validator)
                        ->withInput();
        }
        $user = new User();

        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->mail = $request->mail;
        $user->username = $request->username;
        $user->cellphone = $request->cellphone;
        $user->phone = $request->phone;

        $user->save();

    }
}

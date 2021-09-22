<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

          /**
     * Get a JWT via given credentials.
     *
     * @param  Request  $request
     * @return Response
     */
    public function login(Request $request)
    {
        return response()->json(['message' => 'unnacepted refresh token'], 500);
          //validate incoming request 
        $this->validate($request, [
            'mail' => 'required|string',
            'password' => 'required|string',
        ]);


        $credentials = $request->only(['mail', 'password']);
        if (!$token = Auth::setTTL(60)->attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        } 

        //return $this->respondWithToken($token, 200);
    }

        /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {   
        auth()->user()->userType;
        return response()->json(auth()->user(), 200);
    }


    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        auth()->invalidate(true);

        return response()->json(['message' => 'Successfully logged out'], 200);
    }

        /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh(true, true));
    }

}
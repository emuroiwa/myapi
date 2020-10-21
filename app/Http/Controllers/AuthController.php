<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
{
    /**Read the credentials passed by the user
    */
    $credentials = [
        'email' => $request->email,
        'password' => $request->password
    ];

    /**Check the credentials are valid or not
    */
    if( auth()->attempt($credentials) ){
        /**Store the information of authenticated user
        */
        $user = Auth::user();
        /**Create token for the authenticated user
        */
        $success['token'] = $user->createToken('AppName')->accessToken;
        return response()->json(['success' => $success], 200);
    } else {
        /**Return error message
        */
        return response()->json(['error'=>'Unauthorised'], 401);
    }
}
}

<?php

namespace App\Applications\Authentication\Http\Controllers;

use App\Applications\Authentication\Http\Requests\AuthenticateWithCredentialsRequest;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\JWTAuth;

class AuthenticateController extends BaseController
{
    public function withCredentials(AuthenticateWithCredentialsRequest $request, JWTAuth $auth)
    {
        // grab credentials from the request
        $credentials = $request->only('email', 'password');

        try {
            if (!$token = $auth->attempt($credentials)) {
                return response()->json(['invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json('could_not_create_token', 500);
        }

        // all good so return the token
        return response()->json(compact('token'));
    }

    public function token()
    {
        // renew token here
    }
}

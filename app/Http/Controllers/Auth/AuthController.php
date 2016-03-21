<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Exception\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Http\Response as IlluminateResponse;
use JWTAuth;
use Response;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    /**
     * Handle a login request to the application.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        try {
            $this->validate($request, [
                'email'    => 'required|email|max:255',
                'password' => 'required',
            ]);
        } catch (HttpResponseException $e) {
            return Response::json([
                'error' => [
                    'message' => 'invalid_auth',
                ],
            ], IlluminateResponse::HTTP_BAD_REQUEST);
        }

        $credentials = $this->getCredentials($request);

        try {
            // Attempt to verify the credentials and create a token for the user
            if ( ! $token = JWTAuth::attempt($credentials)) {
                return Response::json([
                    'error' => [
                        'message' => 'invalid_credentials',
                    ],
                ], IlluminateResponse::HTTP_UNAUTHORIZED);
            }
        } catch (JWTException $e) {
            // Something went wrong whilst attempting to encode the token
            return Response::json([
                'error' => [
                    'message' => 'could_not_create_token',
                ],
            ], IlluminateResponse::HTTP_INTERNAL_SERVER_ERROR);
        }

        // All good so return the token
        return Response::json([
            'success' => [
                'message' => 'token_generated',
                'token'   => $token,
            ],
        ]);
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    protected function getCredentials(Request $request)
    {
        return $request->only('email', 'password');
    }
}

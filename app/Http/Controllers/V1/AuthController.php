<?php

namespace App\Http\Controllers\V1;

use App\Http\Requests\V1\SignInRequest;
use App\Http\Requests\V1\SignUpRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 * @group Authentication
 */
class AuthController extends ApiController
{
    /**
     * Sign Up
     * 
     * Creates a new user
     * 
     * @response 200 scenario=Success {
     *      "message": "User created successfully",
     *      "data": {
     *          "id": 1 
     *      },
     *      "status": 200
     * }
     */
    public function signUp(SignUpRequest $request)
    {
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($$request->password),
        ]);

        return $this->success('User created successfully', [
            'id' => $user->id
        ]);
    }

    /**
     * Sign In
     * 
     * Signs in a user and returns an auth token
     * 
     * @response 200 scenario=Success {
     *      "message": "Authenticated",
     *      "data": {
     *          "token": "{YOUR_AUTH_KEY}",
     *          "id": 1
     *      },
     * }
     * 
     * @response 401 scenario="Invalid credentials" {
     *      "message": "Invalid credentials",
     *      "status": 401
     * }
     */
    public function signIn(SignInRequest $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return $this->error('Invalid credentials', 401);
        }

        $user = User::artist()->where('email', $request->email)->firstOr(function () {
            return $this->error('Invalid credentials', 401);
        });

        $token = $user->createToken('authToken')->plainTextToken;

        return $this->success('Authenticated', [
            'token' => $token,
            'id' => $user->id
        ]);
    }

    /**
     * Admin Sign In
     * 
     * Signs in an admin user and returns an auth token
     * 
     * @unauthenticated
     * 
     * @response 200 scenario=success {
     *  "message": "Authenticated",
     *  "data": {
     *      "token": "{YOUR_AUTH_KEY}",
     *      "id": 1
     *  },
     *  "status": 200
     * }
     * 
     * @response 401 scenario="Invalid credentials" {
     *      "message": "Invalid credentials",
     *      "status": 401
     * }
     */
    public function adminSignIn(SignInRequest $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return $this->error('Invalid credentials', 401);
        }

        $user = User::admin()->where('email', $request->email)->firstOr(function () {
            return $this->error('Invalid credentials', 401);
        });

        $token = $user->createToken('authToken')->plainTextToken;

        return $this->success('Authenticated', [
            'token' => $token,
            'id' => $user->id,
        ]);
    }

    /**
     * Sign Out
     * 
     * Signs out a user and deletes the auth token
     * 
     * @authenticated
     * 
     * @response 200 scenario=Success {
     *      "message": "Signed out successfully",
     *      "data": [],
     *      "status": 200
     * }
     * 
     * @response 401 scenario=Unauthenticated {
     *      "message": "Unauthenticated"
     * }
     */
    public function signOut(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return $this->success('Signed out successfully');
    }
}

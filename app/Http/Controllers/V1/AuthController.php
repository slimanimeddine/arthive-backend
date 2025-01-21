<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\SignInRequest;
use App\Http\Requests\V1\SignUpRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 * @group Authentication
 */
class AuthController extends Controller
{
    /**
     * Sign Up
     * 
     * Creates a new user
     * 
     * @unauthenticated
     * 
     * @response 200 {
     * "message": "User created successfully",
     * "data": {
     *      "id": 1 
     * },
     * }
     */
    public function signUp(SignUpRequest $request)
    {
        $validated = $request->validated();

        $user = User::create([
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return response()->json([
            'message' => 'User created successfully',
            'data' => [
                'id' => $user->id,
            ],
        ], 200);
    }

    /**
     * Sign In
     * 
     * Signs in a user and returns an auth token
     * 
     * @unauthenticated
     * 
     * @response 200 {
     *  "message": "Authenticated",
     *  "data": {
     *      "token": "{YOUR_AUTH_KEY}",
     *      "id": 1
     *  },
     * }
     */
    public function signIn(SignInRequest $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Invalid credentials',
            ], 401);
        }

        $user = User::firstWhere('email', $request->email);

        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json([
            'message' => 'Authenticated',
            'data' => [
                'token' => $token,
                'id' => $user->id,
            ],
        ], 200);
    }

    /**
     * Sign Out
     * 
     * Signs out a user and deletes the auth token
     * 
     * @authenticated
     * 
     * @response 200 {
     *      "message": "Signed out successfully",
     * }
     */
    public function signOut(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Signed out successfully',
        ], 200);
    }
}

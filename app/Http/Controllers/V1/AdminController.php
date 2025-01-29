<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\SignInRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

/**
 * @group Admin
 */
class AdminController extends Controller
{
    /**
     * Admin Sign In
     * 
     * Signs in an admin user and returns an auth token
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
    public function adminSignIn(SignInRequest $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Invalid credentials',
            ], 401);
        }

        $user = User::where('role', 'admin')->where('email', $request->email)->firstOrFail();

        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json([
            'message' => 'Authenticated',
            'data' => [
                'token' => $token,
                'id' => $user->id,
            ],
        ], 200);
    }
}

<?php

namespace App\Http\Controllers\V1;

use App\Http\Requests\V1\SignInRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

/**
 * @group Admin
 */
class AdminController extends ApiController
{
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

        $user = User::where('role', 'admin')->where('email', $request->email)->firstOrFail();

        $token = $user->createToken('authToken')->plainTextToken;

        return $this->success('Authenticated', [
            'token' => $token,
            'id' => $user->id,
        ]);
    }
}

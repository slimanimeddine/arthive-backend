<?php

namespace App\Http\Controllers\V1;

use App\Http\Requests\V1\ChangePasswordRequest;
use App\Http\Requests\V1\SignInRequest;
use App\Http\Requests\V1\SignUpRequest;
use App\Http\Requests\V1\VerifyEmailCodeRequest;
use App\Mail\EmailVerifyCode;
use App\Models\EmailVerification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

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
            'password' => Hash::make($request->password),
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
     *      "status": 200
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

        $user = User::artist()->where('email', $request->email)->first();

        if (!$user) {
            return $this->error('Invalid credentials', 401);
        }

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

        $user = User::admin()->where('email', $request->email)->first();

        if (!$user) {
            return $this->error('Invalid credentials', 401);
        }

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
     *      "data": null,
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

    /**
     * Change Password
     * 
     * Changes the password of the authenticated user
     * 
     * @authenticated
     * 
     * @response 200 scenario=Success {
     *      "message": "Password updated successfully",
     *      "data": null,
     *      "status": 200
     * }
     * 
     * @response 401 scenario=Unauthenticated {
     *      "message": "Unauthenticated"
     * }
     * 
     * @response 422 scenario="Invalid current password" {
     *      "message": "Invalid current password",
     *      "status": 422
     * }
     */
    public function changePassword(ChangePasswordRequest $request)
    {
        $authenticatedUser = $request->user();

        if (!Hash::check($request->current_password, $authenticatedUser->password)) {
            return $this->error('Invalid current password', 422);
        }

        $authenticatedUser->update([
            'password' => Hash::make($request->new_password)
        ]);

        return $this->success('Password changed successfully');
    }

    /**
     * Send Email Verification Code
     * 
     * Sends a verification code to the authenticated user's email
     * 
     * @authenticated
     * 
     * @response 200 scenario=Success {
     *     "message": "Verification code sent successfully",
     *     "data": null,
     *    "status": 200
     * }
     * 
     * @response 400 scenario="Email already verified" {
     *     "message": "Email already verified",
     *    "status": 400
     * }
     * 
     * @response 401 scenario=Unauthenticated {
     *    "message": "Unauthenticated"
     * }
     */
    public function sendEmailVerificationCode(Request $request)
    {
        $authenticatedUser = $request->user();

        if ($authenticatedUser->cannot('sendEmailVerificationCode', EmailVerification::class)) {
            return $this->error('Email already verified', 400);
        }

        $email = $authenticatedUser->email;
        $code = Str::random(6);
        $code_expires_at = now()->addMinutes(10);

        EmailVerification::create([
            'email' => $email,
            'code' => $code,
            'code_expires_at' => $code_expires_at
        ]);

        Mail::to($email)->send(new EmailVerifyCode($code));

        return $this->success('Verification code sent successfully');
    }

    /**
     * Verify Email Code
     * 
     * Verifies the email verification code
     * 
     * @authenticated
     * 
     * @response 200 scenario=Success {
     *     "message": "Email verified successfully",
     *    "data": null,
     *    "status": 200
     * }
     * 
     * @response 400 scenario="Invalid code" {
     *    "message": "Invalid code",
     *   "status": 400
     * }
     * 
     * @response 401 scenario=Unauthenticated {
     *    "message": "Unauthenticated"
     * }
     * 
     * @response 400 scenario="Email already verified" {
     *   "message": "Email already verified",
     *  "status": 400
     *  }
     */
    public function verifyEmailCode(VerifyEmailCodeRequest $request)
    {
        $authenticatedUser = $request->user();

        if ($authenticatedUser->cannot('verifyEmailCode', EmailVerification::class)) {
            return $this->error('Email already verified', 400);
        }

        $email = $authenticatedUser->email;

        $email_verification = EmailVerification::where('email', $email)
            ->where('code', $request->code)
            ->latest()
            ->first();

        if (!$email_verification) {
            return $this->error('Invalid code', 400);
        }

        if ($email_verification->code !== $request->code) {
            return $this->error('Invalid code', 400);
        }

        if ($email_verification->code_expires_at < now()) {
            return $this->error('Invalid code', 400);
        }

        $authenticatedUser->email_verified_at = now();
        $authenticatedUser->save();

        $email_verification->delete();

        return $this->success('Email verified successfully');
    }
}
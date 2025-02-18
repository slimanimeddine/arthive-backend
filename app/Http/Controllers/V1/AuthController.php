<?php

namespace App\Http\Controllers\V1;

use App\Http\Requests\V1\ChangePasswordRequest;
use App\Http\Requests\V1\ResetPasswordRequest;
use App\Http\Requests\V1\SendResetPasswordLinkRequest;
use App\Http\Requests\V1\SignInRequest;
use App\Http\Requests\V1\SignUpRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
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

        event(new Registered($user));

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
     */
    public function changePassword(ChangePasswordRequest $request)
    {
        $authenticatedUser = $request->user();

        $authenticatedUser->update([
            'password' => Hash::make($request->new_password)
        ]);

        return $this->success('Password changed successfully');
    }

    /**
     * Verify Email
     * 
     * Verifies the email of the authenticated user
     * 
     * @authenticated
     * 
     * @response 200 scenario=Success {
     *      "message": "Email verified successfully",
     *      "data": null,
     *      "status": 200
     * }
     * 
     * @response 401 scenario=Unauthenticated {
     *      "message": "Unauthenticated"
     * }
     */
    public function verifyEmail(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return $this->success('Email verified successfully');
    }

    /**
     * Resend Verification Email
     * 
     * Resends the verification email to the authenticated user
     * 
     * @authenticated
     * 
     * @response 200 scenario=Success {
     *      "message": "Verification email sent successfully",
     *      "data": null,
     *      "status": 200
     * }
     * 
     * @response 401 scenario=Unauthenticated {
     *      "message": "Unauthenticated"
     * }
     */
    public function resendVerificationEmail(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();

        return $this->success('Verification email sent successfully');
    }

    /**
     * Send Reset Password Link
     * 
     * Sends a reset password link to the user's email
     * 
     * @response 200 scenario=Success {
     *     "message": "Reset password link sent successfully",
     *    "data": {
     *       "status": "passwords.sent"
     *   },
     *  "status": 200
     * }
     * 
     * @response 500 scenario="Failure" {
     *     "message": "Failed to send reset password link",
     *    "status": 500
     * }
     */
    public function sendResetPasswordLink(SendResetPasswordLinkRequest $request)
    {
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::ResetLinkSent
            ? $this->success('Reset password link sent successfully', [
                'status' => __($status)
            ])
            : $this->error('Failed to send reset password link', 500);
    }

    /**
     * Reset Password
     * 
     * Resets the password of the user
     * 
     * @response 200 scenario=Success {
     *    "message": "Password reset successfully",
     *   "data": {
     *     "status": "passwords.reset"
     *  },
     * "status": 200
     * }
     * 
     * @response 500 scenario="Failure" {
     *    "message": "Failed to reset password",
     *  "status": 500
     * }
     */
    public function resetPassword(ResetPasswordRequest $request)
    {
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PasswordReset
            ? $this->success('Password reset successfully', [
                'status' => __($status)
            ])
            : $this->error('Failed to reset password', 500);
    }
}

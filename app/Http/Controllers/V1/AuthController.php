<?php

namespace App\Http\Controllers\V1;

use App\Http\Requests\V1\ChangePasswordRequest;
use App\Http\Requests\V1\DeleteUserRequest;
use App\Http\Requests\V1\ResetPasswordRequest;
use App\Http\Requests\V1\SendPasswordResetLinkRequest;
use App\Http\Requests\V1\SignInRequest;
use App\Http\Requests\V1\SignUpRequest;
use App\Models\User;
use App\Notifications\VerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
     *      "status": 204
     * }
     */
    public function signUp(SignUpRequest $request)
    {
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return $this->noContent('User created successfully');
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
     *          "id": "01jsn7h28c20dfrbybdt530p1d"
     *      },
     *      "status": 200
     * }
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
            'id' => $user->id,
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
     *      "status": 204
     * }
     * @response 401 scenario=Unauthenticated {
     *      "message": "Unauthenticated"
     * }
     */
    public function signOut(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return $this->noContent('Signed out successfully');
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
     *      "status": 204
     * }
     * @response 401 scenario=Unauthenticated {
     *      "message": "Unauthenticated"
     * }
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
            'password' => Hash::make($request->new_password),
        ]);

        return $this->noContent('Password changed successfully');
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
     *      "status": 204
     * }
     * @response 401 scenario=Unauthenticated {
     *      "message": "Unauthenticated"
     * }
     * @response 403 scenario="Invalid url" {
     *      "message": "Invalid url",
     *      "status": 403
     * }
     * @response 403 scenario="Email already verified" {
     *      "message": "Email already verified",
     *      "status": 403
     * }
     */
    public function verifyEmail(Request $request)
    {
        $authenticatedUser = $request->user();

        if (!hash_equals((string) $authenticatedUser->getKey(), (string) $request->route('id'))) {
            return $this->unauthorized('Invalid url');
        }

        if (!hash_equals(sha1($authenticatedUser->getEmailForVerification()), (string) $request->route('hash'))) {
            return $this->unauthorized('Invalid url');
        }

        if ($authenticatedUser->hasVerifiedEmail()) {
            return $this->unauthorized('Email already verified');
        }

        if (!$authenticatedUser->hasVerifiedEmail()) {
            $authenticatedUser->markEmailAsVerified();
        }

        return $this->noContent('Email verified successfully');
    }

    /**
     * Resend Email Verification
     * 
     * Resends the email verification notification to the authenticated user
     * 
     * @authenticated
     * 
     * @response 200 scenario=Success {
     *      "message": "Verification link sent!",
     *      "status": 204
     * }
     * @response 401 scenario=Unauthenticated {
     *     "message": "Unauthenticated"
     * }
     */
    public function resendEmailVerification(Request $request)
    {
        $request->user()->notify(new VerifyEmail());

        return $this->noContent('Verification link sent!');
    }

    /**
     * Send Password Reset Link
     * 
     * Sends a password reset link to the user's email
     * 
     * @response 200 scenario=Success {
     *      "message": "Reset link sent successfully",
     *      "status": 204
     * }
     * @response 400 scenario=Failure {
     *     "message": "Failed to send reset link"
     *     "status": 400
     * }
     */
    public function sendPasswordResetLink(SendPasswordResetLinkRequest $request)
    {
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::ResetLinkSent
            ? $this->noContent('Reset link sent successfully')
            : $this->error('Failed to send reset link', 400);
    }

    /**
     * Reset Password
     * 
     * Resets the password of the user
     * 
     * @response 200 scenario=Success {
     *      "message": "Password reset successfully",
     *      "status": 204
     * }
     * @response 400 scenario=Failure {
     *     "message": "Failed to reset password"
     *     "status": 400
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
            ? $this->noContent('Password reset successfully')
            : $this->error('Failed to reset password', 400);
    }
    /**
     * Delete User
     *
     * Deletes the authenticated user
     *
     * @authenticated
     *
     * @response 200 scenario=Success {
     *      "message": "User deleted successfully",
     *     "status": 204
     * }
     * @response 400 scenario="Incorrect password" {
     *      "message": "Incorrect password.",
     *      "status": 400
     * }
     * @response 401 scenario=Unauthenticated {
     *     "message": "Unauthenticated"
     * }
     */
    public function deleteUser(DeleteUserRequest $request)
    {
        $user = $request->user();

        $request->user()->currentAccessToken()->delete();

        $user->delete();

        return $this->noContent('User deleted successfully');
    }
}

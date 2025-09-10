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
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Spatie\UrlSigner\Laravel\Facades\UrlSigner;

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

        return $this->successNoData('User created successfully');
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
     *          "id": "0197df53-4ed0-7337-b648-1b763a6d6857"
     *      },
     *      "status": 200
     * }
     * @response 401 scenario="Invalid credentials" {
     *      "message": "Invalid credentials",
     *      "status": 401
     * }
     * @response status=404 scenario="User not found" {
     *      "message": "User not found with the provided credentials.",
     *      "status": 404
     * }
     * @response status=429 scenario="Rate limit exceeded" {
     *      "message": "Too many login attempts.",
     *      "status": 429
     * }
     */
    public function signIn(SignInRequest $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return $this->error('Invalid credentials', 401);
        }

        $user = User::artist()->where('email', $request->email)->first();

        if (!$user) {
            return $this->notFound('Invalid credentials');
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
     *      "id": "0197df53-4ed0-7337-b648-1b763a6d6857"
     *  },
     *  "status": 200
     * }
     * @response 401 scenario="Invalid credentials" {
     *      "message": "Invalid credentials",
     *      "status": 401
     * }
     * @response status=404 scenario="Admin not found" {
     *      "message": "Admin not found with the provided credentials.",
     *      "status": 404
     * }
     * @response status=429 scenario="Rate limit exceeded" {
     *      "message": "Too many login attempts.",
     *      "status": 429
     * }
     */
    public function adminSignIn(SignInRequest $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return $this->error('Invalid credentials', 401);
        }

        $user = User::admin()->where('email', $request->email)->first();

        if (!$user) {
            return $this->error('Admin not found with the provided credentials.', 401);
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
     *      "status": 200
     * }
     * @response 401 scenario=Unauthenticated {
     *      "message": "Unauthenticated"
     * }
     */
    public function signOut(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return $this->successNoData('Signed out successfully');
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
     *      "status": 200
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

        return $this->successNoData('Password changed successfully');
    }

    /**
     * Verify Email
     *
     * Verifies the email of the authenticated user
     *
     * @authenticated
     *
     * @queryParam expires string The expiration time of the link in seconds. Example: 1746693113
     * @queryParam signature string The signature of the link. Example: 1234567890abcdef
     *
     * @urlParam id string The ID of the user.
     * @urlParam hash string The hash of the email. Example: 1234567890abcdef1234567890abcdef12345678
     *
     * @response 200 scenario=Success {
     *      "message": "Email verified successfully",
     *      "status": 200
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
    public function verifyEmail(Request $request, string $id, string $hash)
    {
        $authenticatedUser = $request->user();

        $expires = $request->query('expires');

        $signature = $request->query('signature');

        $frontendUrl = $authenticatedUser->user_type === 'admin'
            ? config('app.admin_frontend_url')
            : config('app.frontend_url');

        $url = $frontendUrl . '/email/verify/' . $id . '/' . $hash . '?expires=' . $expires . '&signature=' . $signature;

        if (!UrlSigner::validate($url)) {
            return $this->unauthorized('Link is invalid');
        }

        if (!hash_equals((string) $authenticatedUser->getKey(), (string) $id)) {
            return $this->unauthorized('Id is invalid');
        }

        if (!hash_equals(sha1($authenticatedUser->getEmailForVerification()), (string) $hash)) {
            return $this->unauthorized('Hash is invalid');
        }

        if ($authenticatedUser->hasVerifiedEmail()) {
            return $this->unauthorized('Email already verified');
        }

        if (!$authenticatedUser->hasVerifiedEmail()) {
            $authenticatedUser->markEmailAsVerified();
        }

        return $this->successNoData('Email verified successfully');
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
     *      "status": 200
     * }
     * @response 401 scenario=Unauthenticated {
     *     "message": "Unauthenticated"
     * }
     */
    public function resendEmailVerification(Request $request)
    {
        $request->user()->notify(new VerifyEmail);

        return $this->successNoData('Verification link sent!');
    }

    /**
     * Send Password Reset Link
     *
     * Sends a password reset link to the user's email
     *
     * @response 200 scenario=Success {
     *      "message": "Reset link sent successfully",
     *      "status": 200
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
            ? $this->successNoData('Reset link sent successfully')
            : $this->error('Failed to send reset link', 400);
    }

    /**
     * Reset Password
     *
     * Resets the password of the user
     *
     * @response 200 scenario=Success {
     *      "message": "Password reset successfully",
     *      "status": 200
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
                    'password' => Hash::make($password),
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PasswordReset
            ? $this->successNoData('Password reset successfully')
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
     *     "status": 200
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

        return $this->successNoData('User deleted successfully');
    }
}

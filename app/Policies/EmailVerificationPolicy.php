<?php

namespace App\Policies;

use App\Models\User;

class EmailVerificationPolicy
{
    /**
     * Determine whether the user can send an email verification code.
     */
    public function sendEmailVerificationCode(User $user): bool
    {
        return $user->email_verified_at === null;
    }

    /**
     * Determine whether the user can verify the email code.
     */
    public function verifyEmailCode(User $user): bool
    {
        return $this->sendEmailVerificationCode($user);
    }
}

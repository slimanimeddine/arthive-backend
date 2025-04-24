<?php

namespace App\Policies;

use App\Models\User;

class ArtistVerificationRequestPolicy
{
    /**
     * Determine whether user can submit an artist verification request.
     */
    public function submitArtistVerificationRequest(User $user): bool
    {
        $isArtist = $user->isArtist();
        $isVerified = $user->artist_verified_at !== null;

        return $isArtist && ! $isVerified;
    }

    /**
     * Determine whether user can review an artist verification request.
     */
    public function reviewArtistVerificationRequest(User $user): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether user can list artist verification requests.
     */
    public function listArtistVerificationRequests(User $user): bool
    {
        return $user->isAdmin();
    }
}

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
        $isArtist = $user->role === 'artist';
        $isVerified = $user->artist_verified_at !== null;
        return $isArtist && !$isVerified;
    }
}

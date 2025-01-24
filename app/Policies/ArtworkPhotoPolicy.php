<?php

namespace App\Policies;

use App\Models\ArtworkPhoto;
use App\Models\User;

class ArtworkPhotoPolicy
{
    /**
     * Determine whether user can set artworkPhoto as main.
     */
    public function setArtworkPhotoAsMain(User $user, ArtworkPhoto $artworkPhoto): bool
    {
        return $user->id === $artworkPhoto->artwork->user_id;
    }

    /**
     * Determine whether user can delete artworkPhoto.
     */
    public function deleteArtworkPhoto(User $user, ArtworkPhoto $artworkPhoto): bool
    {
        return $user->id === $artworkPhoto->artwork->user_id;
    }
}

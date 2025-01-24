<?php

namespace App\Policies;

use App\Models\Artwork;
use App\Models\User;

class ArtworkPolicy
{
    /**
     * Determine whether the user can publish the model.
     */
    public function publishArtworkDraft(User $user, Artwork $artwork): bool
    {
        return $user->id === $artwork->user_id;
    }

    /**
     * Determine whether user can upload photos to artwork
     */
    public function uploadArtworkPhotos(User $user, Artwork $artwork): bool
    {
        return $user->id === $artwork->user_id;
    }
}

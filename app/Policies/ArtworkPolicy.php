<?php

namespace App\Policies;

use App\Models\Artwork;
use App\Models\User;

class ArtworkPolicy
{
    /**
     * Determine whether the user can create a draft.
     */
    public function createArtwork(User $user): bool
    {
        return $user->isArtist();
    }

    /**
     * Determine whether user can upload photos to artwork
     */
    public function uploadArtworkPhotos(User $user, Artwork $artwork): bool
    {
        $isArtist = $user->isArtist();
        $isOwner = $user->id === $artwork->user_id;
        return $isArtist && $isOwner;
    }

    /**
     * Determine whether user can update artwork
     */
    public function updateArtwork(User $user, Artwork $artwork): bool
    {
        $isArtist = $user->isArtist();
        $isOwner = $user->id === $artwork->user_id;
        return $isArtist && $isOwner;
    }

    /**
     * Determine whether user can delete artwork
     */
    public function deleteArtwork(User $user, Artwork $artwork): bool
    {
        $isArtist = $user->isArtist();
        $isOwner = $user->id === $artwork->user_id;
        return $isArtist && $isOwner;
    }
}

<?php

namespace App\Policies;

use App\Models\Artwork;
use App\Models\User;

class ArtworkPolicy
{
    /**
     * Determine whether the user can create a draft.
     */
    public function createArtworkDraft(User $user): bool
    {
        return $user->role === 'artist';
    }

    /**
     * Determine whether the user can publish the model.
     */
    public function publishArtworkDraft(User $user, Artwork $artwork): bool
    {
        $isArtist = $user->role === 'artist';
        $isOwner = $user->id === $artwork->user_id;
        return $isArtist && $isOwner;
    }

    /**
     * Determine whether user can upload photos to artwork
     */
    public function uploadArtworkPhotos(User $user, Artwork $artwork): bool
    {
        $isArtist = $user->role === 'artist';
        $isOwner = $user->id === $artwork->user_id;
        return $isArtist && $isOwner;
    }

    /**
     * Determine whether user can delete artwork draft
     */
    public function deleteArtworkDraft(User $user, Artwork $artwork): bool
    {
        $isArtist = $user->role === 'artist';
        $isOwner = $user->id === $artwork->user_id;
        return $isArtist && $isOwner;
    }
}

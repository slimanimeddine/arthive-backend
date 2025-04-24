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
        $isArtist = $user->isArtist();
        $isOwner = $user->id === $artworkPhoto->artwork->user_id;
        $isDraft = $artworkPhoto->artwork->isDraft();

        return $isArtist && $isOwner && $isDraft;
    }

    /**
     * Determine whether user can delete artworkPhoto.
     */
    public function deleteArtworkPhoto(User $user, ArtworkPhoto $artworkPhoto): bool
    {
        $isArtist = $user->isArtist();

        $artwork = $artworkPhoto->artwork;

        $isOwner = $user->id === $artwork->user_id;
        $isDraft = $artwork->isDraft();
        $isMain = $artworkPhoto->is_main;
        $artworkPhotosCount = $artwork->artworkPhotos()->count() > 1;

        return $isArtist && $isOwner && $isDraft && $artworkPhotosCount && ! $isMain;
    }

    /**
     * Determine whether user can replace artworkPhoto.
     */
    public function replaceArtworkPhotoPath(User $user, ArtworkPhoto $artworkPhoto): bool
    {
        $isArtist = $user->isArtist();

        $artwork = $artworkPhoto->artwork;

        $isOwner = $user->id === $artwork->user_id;
        $isDraft = $artwork->isDraft();

        return $isArtist && $isOwner && $isDraft;
    }
}

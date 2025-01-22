<?php

namespace App\Policies;

use App\Models\Artwork;
use App\Models\ArtworkLike;
use App\Models\User;

class ArtworkLikePolicy
{
    /**
     * Determine whether user can like artwork.
     */
    public function likeArtwork(User $user, Artwork $artwork): bool
    {
        $isUserArtist = $user->role === 'artist';

        $alreadyLiked = ArtworkLike::where('user_id', $user->id)
            ->where('artwork_id', $artwork->id)
            ->exists();

        return $isUserArtist && !$alreadyLiked;
    }

    /**
     * Determine whether user can unlike artwork.
     */
    public function unlikeArtwork(User $user, Artwork $artwork): bool
    {
        $isUserArtist = $user->role === 'artist';

        $alreadyLiked = ArtworkLike::where('user_id', $user->id)
            ->where('artwork_id', $artwork->id)
            ->exists();

        return $isUserArtist && $alreadyLiked;
    }
}

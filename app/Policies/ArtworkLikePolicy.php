<?php

namespace App\Policies;

use App\Models\Artwork;
use App\Models\ArtworkLike;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ArtworkLikePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ArtworkLike $artworkLike): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ArtworkLike $artworkLike): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ArtworkLike $artworkLike): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ArtworkLike $artworkLike): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ArtworkLike $artworkLike): bool
    {
        return false;
    }

    /**
     * Determine whether user can like artwork.
     */
    public function like(User $user, Artwork $artwork): bool
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
    public function unlike(User $user, Artwork $artwork): bool
    {
        $isUserArtist = $user->role === 'artist';

        $alreadyLiked = ArtworkLike::where('user_id', $user->id)
            ->where('artwork_id', $artwork->id)
            ->exists();

        return $isUserArtist && $alreadyLiked;
    }
}

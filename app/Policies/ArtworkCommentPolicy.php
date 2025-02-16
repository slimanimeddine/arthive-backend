<?php

namespace App\Policies;

use App\Models\ArtworkComment;
use App\Models\User;

class ArtworkCommentPolicy
{
    /**
     * Determine whether user can update artworkComment.
     */
    public function updateArtworkComment(User $user, ArtworkComment $artworkComment): bool
    {
        $isArtist = $user->isArtist();
        $isOwner = $user->id === $artworkComment->user_id;

        return $isArtist && $isOwner;
    }

    /**
     * Determine whether user can delete artworkComment.
     */
    public function deleteArtworkComment(User $user, ArtworkComment $artworkComment): bool
    {
        $isArtist = $user->isArtist();
        $isOwner = $user->id === $artworkComment->user_id;

        return $isArtist && $isOwner;
    }
}

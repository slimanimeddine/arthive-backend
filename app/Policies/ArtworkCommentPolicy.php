<?php

namespace App\Policies;

use App\Models\ArtworkComment;
use App\Models\User;

class ArtworkCommentPolicy
{
    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ArtworkComment $artworkComment): bool
    {
        return $user->id === $artworkComment->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ArtworkComment $artworkComment): bool
    {
        return $user->id === $artworkComment->user_id;
    }
}

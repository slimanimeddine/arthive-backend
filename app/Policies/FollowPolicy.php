<?php

namespace App\Policies;

use App\Models\Follow;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class FollowPolicy
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
    public function view(User $user, Follow $follow): bool
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
    public function update(User $user, Follow $follow): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Follow $follow): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Follow $follow): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Follow $follow): bool
    {
        return false;
    }

    /**
     * Determine whether user can follow userToFollow
     */
    public function follow(User $user, User $userToFollow): bool
    {
        $isUserArtist = $user->role === 'artist';

        $isUserToFollowArtist = $userToFollow->role === 'artist';

        $sameUser = $user->id === $userToFollow->id;

        $alreadyFollowing = Follow::where('follower_id', $user->id)
            ->where('followed_id', $userToFollow->id)
            ->exists();

        return $isUserArtist && $isUserToFollowArtist && !$sameUser && !$alreadyFollowing;
    }

    /**
     * Determine whether user can unfollow userToFollow
     */
    public function unfollow(User $user, User $userToUnfollow): bool
    {
        $isUserArtist = $user->role === 'artist';

        $isUserToUnfollowArtist = $userToUnfollow->role === 'artist';

        $sameUser = $user->id === $userToUnfollow->id;

        $alreadyFollowing = Follow::where('follower_id', $user->id)
            ->where('followed_id', $userToUnfollow->id)
            ->exists();

        return $isUserArtist && $isUserToUnfollowArtist && !$sameUser && $alreadyFollowing;
    }
}

<?php

namespace App\Policies;

use App\Models\Follow;
use App\Models\User;

class UserPolicy
{
    /**
     * Determine whether the user can update the model.
     */
    public function updateUser(User $user, User $model): bool
    {
        return $user->id === $model->id;
    }

    /**
     * Determine whether user can follow userToFollow
     */
    public function followUser(User $user, User $userToFollow): bool
    {
        $isUserArtist = $user->isArtist();

        $isUserToFollowArtist = $userToFollow->isArtist();

        $sameUser = $user->id === $userToFollow->id;

        $alreadyFollowing = Follow::where('follower_id', $user->id)
            ->where('followed_id', $userToFollow->id)
            ->exists();

        return $isUserArtist && $isUserToFollowArtist && ! $sameUser && ! $alreadyFollowing;
    }

    /**
     * Determine whether user can unfollow userToFollow
     */
    public function unfollowUser(User $user, User $userToUnfollow): bool
    {
        $isUserArtist = $user->isArtist();

        $isUserToUnfollowArtist = $userToUnfollow->isArtist();

        $sameUser = $user->id === $userToUnfollow->id;

        $alreadyFollowing = Follow::where('follower_id', $user->id)
            ->where('followed_id', $userToUnfollow->id)
            ->exists();

        return $isUserArtist && $isUserToUnfollowArtist && ! $sameUser && $alreadyFollowing;
    }
}

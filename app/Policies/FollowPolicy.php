<?php

namespace App\Policies;

use App\Models\Follow;
use App\Models\User;

class FollowPolicy
{
    /**
     * Determine whether user can follow userToFollow
     */
    public function followUser(User $user, User $userToFollow): bool
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
    public function unfollowUser(User $user, User $userToUnfollow): bool
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

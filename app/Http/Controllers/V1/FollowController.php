<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\FollowResource;
use App\Models\Follow;
use App\Models\User;
use App\Notifications\FollowNotification;
use Illuminate\Http\Request;

/**
 * @group Follows
 */
class FollowController extends Controller
{
    /**
     * Follow User
     * 
     * Follow a user
     * 
     * @authenticated
     * 
     * @urlParam userId integer required The ID of the user to follow
     * 
     * @apiResource App\Http\Resources\V1\FollowResource
     * 
     * @apiResourceModel App\Models\Follow
     */
    public function followUser(Request $request, int $userId)
    {
        $authenticatedUser = $request->user();

        $userToFollow = User::findOrFail($userId);

        if ($authenticatedUser->cannot('followUser', $userToFollow)) {
            abort(403);
        }

        $follow = Follow::create([
            'follower_id' => $authenticatedUser->id,
            'followed_id' => $userToFollow->id,
        ]);

        $userToFollow->notify(new FollowNotification($authenticatedUser));

        return new FollowResource($follow);
    }

    /**
     * Unfollow User
     * 
     * Unfollow a user
     * 
     * @authenticated
     * 
     * @urlParam userId integer required The ID of the user to unfollow
     * 
     * @response {
     *      'message' => 'You have successfully unfollowed this user.'
     * }
     */
    public function unfollowUser(Request $request, int $userId)
    {
        $authenticatedUser = $request->user();

        $userToUnfollow = User::findOrFail($userId);

        if ($authenticatedUser->cannot('unfollowUser', $userToUnfollow)) {
            abort(403);
        }

        $follow = Follow::where('follower_id', $authenticatedUser->id)
            ->where('followed_id', $userToUnfollow->id)
            ->first();

        $follow->delete();

        return response()->json(['message' => 'You have successfully unfollowed this user.']);
    }
}

<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\FollowResource;
use App\Models\Follow;
use App\Models\User;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    /**
     * Follow a User
     * 
     * Follow a user
     * 
     * @authenticated
     * 
     * @urlParam id integer required The ID of the user to follow
     * 
     * @apiResource App\Http\Resources\V1\FollowResource
     * 
     * @apiResourceModel App\Models\Follow
     */
    public function followUser(Request $request, int $id)
    {
        $authenticatedUser = $request->user();

        $userToFollow = User::findOrFail($id);

        if ($authenticatedUser->id === $userToFollow->id) {
            return response()->json(['message' => 'You cannot follow yourself.'], 400);
        }

        $alreadyFollowing = Follow::where('follower_id', $authenticatedUser->id)
            ->where('followed_id', $userToFollow->id)
            ->exists();

        if ($alreadyFollowing) {
            return response()->json(['message' => 'You are already following this user.'], 400);
        }

        $follow = Follow::create([
            'follower_id' => $authenticatedUser->id,
            'followed_id' => $userToFollow->id,
        ]);

        return new FollowResource($follow);
    }

    /**
     * Unfollow a User
     * 
     * Unfollow a user
     * 
     * @authenticated
     * 
     * @urlParam id integer required The ID of the user to unfollow
     * 
     * @response {
     *      'message' => 'You have successfully unfollowed this user.'
     * }
     */
    public function unfollowUser(Request $request, int $id)
    {
        $authenticatedUser = $request->user();

        $userToUnfollow = User::findOrFail($id);

        if ($authenticatedUser->id === $userToUnfollow->id) {
            return response()->json(['message' => 'You cannot unfollow yourself.'], 400);
        }

        $follow = Follow::where('follower_id', $authenticatedUser->id)
            ->where('followed_id', $userToUnfollow->id)
            ->first();

        if (!$follow) {
            return response()->json(['message' => 'You are not following this user.'], 400);
        }

        $follow->delete();

        return response()->json(['message' => 'You have successfully unfollowed this user.']);
    }
}

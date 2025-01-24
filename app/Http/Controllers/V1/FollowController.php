<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\FollowResource;
use App\Http\Resources\V1\UserResource;
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

        if ($authenticatedUser->cannot('unfollowUser', $userToUnfollow)) {
            abort(403);
        }

        $follow = Follow::where('follower_id', $authenticatedUser->id)
            ->where('followed_id', $userToUnfollow->id)
            ->first();

        $follow->delete();

        return response()->json(['message' => 'You have successfully unfollowed this user.']);
    }

    /**
     * List Authenticated User Followers
     * 
     * Retrieve a list of users following the currently authenticated user
     * 
     * @authenticated
     * 
     * @queryParam page string The page number to fetch. Example: 1
     * 
     * @apiResourceCollection App\Http\Resources\V1\UserResource
     * 
     * @apiResourceModel App\Models\User paginate=10
     */
    public function listAuthenticatedUserFollowers(Request $request)
    {
        $authenticatedUser = $request->user();

        $followers = $authenticatedUser->followers()->paginate(10);

        return UserResource::collection($followers);
    }

    /**
     * List Authenticated User Following
     * 
     * Retrieve a list of users the authenticated user is following
     * 
     * @authenticated
     * 
     * @queryParam page string The page number to fetch. Example: 1
     * 
     * @apiResourceCollection App\Http\Resources\V1\UserResource
     * 
     * @apiResourceModel App\Models\User paginate=10
     */
    public function listAuthenticatedUserFollowing(Request $request)
    {
        $authenticatedUser = $request->user();

        $following = $authenticatedUser->following()->paginate(10);

        return UserResource::collection($following);
    }
}

<?php

namespace App\Http\Controllers\V1;

use App\Http\Resources\V1\FollowResource;
use App\Http\Resources\V1\UserResource;
use App\Models\Follow;
use App\Models\User;
use App\Notifications\FollowNotification;
use Illuminate\Http\Request;

/**
 * @group Follows
 */
class FollowController extends ApiController
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
     * @apiResource scenario=Success App\Http\Resources\V1\FollowResource
     * 
     * @apiResourceModel App\Models\Follow
     *      
     * @response 401 scenario=Unauthenticated {
     *      "message": "Unauthenticated"
     * }
     * 
     * @response 403 scenario=Unauthorized {
     *     "message": "You are not authorized to follow this user.",
     *     "status": 403
     * }
     * 
     * @response 404 scenario="User not found" {
     *     "message": "The user you are trying to follow does not exist.",
     *     "status": 404
     * }
     */
    public function followUser(Request $request, int $userId)
    {
        $authenticatedUser = $request->user();

        $userToFollow = User::find($userId);

        if (!$userToFollow) {
            return $this->error("The user you are trying to follow does not exist.", 404);
        }

        if ($authenticatedUser->cannot('followUser', $userToFollow)) {
            return $this->error("You are not authorized to follow this user.", 403);
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
     * @response 200 scenario=Success {
     *      'message': 'You have successfully unfollowed this user.'
     *      'data': null,
     *      'status': 200
     * }
     * 
     * @response 401 scenario=Unauthenticated {
     *      "message": "Unauthenticated"
     * }
     * 
     * @response 403 scenario=Unauthorized {
     *     "message": "You are not authorized to unfollow this user.",
     *     "status": 403
     * }
     * 
     * @response 404 scenario="User not found" {
     *     "message": "The user you are trying to unfollow does not exist.",
     *     "status": 404
     * }
     * 
     * @response 404 scenario="Follow not found" {
     *   "message": "You have not followed this user.",
     *   "status": 404
     * }
     */
    public function unfollowUser(Request $request, int $userId)
    {
        $authenticatedUser = $request->user();

        $userToUnfollow = User::find($userId);

        if (!$userToUnfollow) {
            return $this->error("The user you are trying to unfollow does not exist.", 404);
        }

        if ($authenticatedUser->cannot('unfollowUser', $userToUnfollow)) {
            return $this->error("You are not authorized to unfollow this user.", 403);
        }

        $follow = Follow::where('follower_id', $authenticatedUser->id)
            ->where('followed_id', $userToUnfollow->id)
            ->first();
        if (!$follow) {
            return $this->error("You have not followed this user.", 404);
        }

        $follow->delete();

        return $this->success('You have successfully unfollowed this user.');
    }

    /**
     * List Authenticated User Followers
     * 
     * Retrieve a list of users following the currently authenticated user
     * 
     * @authenticated
     * 
     * @apiResourceCollection scenario=Success App\Http\Resources\V1\UserResource
     * 
     * @apiResourceModel App\Models\User
     * 
     * @response 401 scenario=Unauthenticated {
     *      "message": "Unauthenticated"
     * }
     */
    public function listAuthenticatedUserFollowers(Request $request)
    {
        $authenticatedUser = $request->user();

        $followers = $authenticatedUser->followers()->get();

        return UserResource::collection($followers);
    }

    /**
     * List Authenticated User Following
     * 
     * Retrieve a list of users followed by the currently authenticated user
     * 
     * @authenticated
     * 
     * @apiResourceCollection scenario=Success App\Http\Resources\V1\UserResource
     * 
     * @apiResourceModel App\Models\User
     * 
     * @response 401 scenario=Unauthenticated {
     *      "message": "Unauthenticated"
     * }
     */
    public function listAuthenticatedUserFollowing(Request $request)
    {
        $authenticatedUser = $request->user();

        $perPage = $request->query('perPage', 10);

        $following = $authenticatedUser->following()->paginate($perPage);

        return UserResource::collection($following);
    }

    /**
     * Check if Authenticated User is Following
     * 
     * Check if the currently authenticated user is following a user
     * 
     * @authenticated
     * 
     * @urlParam userId integer required The ID of the user to check if the authenticated user is following
     * 
     * @response 200 scenario=Success {
     *      "message": "",
     *      "data": true,
     *      "status": 200
     * }
     * 
     * @response 404 scenario="User not found" {
     *      "message": "The user you are trying to check does not exist.",
     *      "status": 404
     * }
     * 
     * @response 401 scenario=Unauthenticated {
     *      "message": "Unauthenticated"
     * }
     */
    public function isAuthenticatedUserFollowing(Request $request, int $userId)
    {
        $authenticatedUser = $request->user();

        $userToCheck = User::find($userId);

        if (!$userToCheck) {
            return $this->error("The user you are trying to check does not exist.", 404);
        }

        $isFollowing = Follow::where('follower_id', $authenticatedUser->id)
            ->where('followed_id', $userToCheck->id)
            ->exists();

        return $this->success('', $isFollowing);
    }
}

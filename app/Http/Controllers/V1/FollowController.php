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

        $userToFollow = User::findOr($userId, function () {
            return $this->error("The user you are trying to follow does not exist.", 404);
        });

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
     *      'message' => 'You have successfully unfollowed this user.'
     *      'data' => [],
     *      'status' => 200
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

        $userToUnfollow = User::findOr($userId, function () {
            return $this->error("The user you are trying to unfollow does not exist.", 404);
        });

        if ($authenticatedUser->cannot('unfollowUser', $userToUnfollow)) {
            return $this->error("You are not authorized to unfollow this user.", 403);
        }

        $follow = Follow::where('follower_id', $authenticatedUser->id)
            ->where('followed_id', $userToUnfollow->id)
            ->firstOr(function () {
                return $this->error("You have not followed this user.", 404);
            });

        $follow->delete();

        return $this->success('You have successfully unfollowed this user.');
    }

    /**
     * List Authenticated User Follows
     * 
     * Retrieve a list of users following or followed by the currently authenticated user
     * 
     * @authenticated
     * 
     * @queryParam filter[follows] string required If followers retrieve the followers of the authenticated user else the following. Enum: followers, following. Example: follows=followers
     * 
     * @queryParam page integer The page number to fetch. Example: 1
     * 
     * @queryParam perPage integer The number of items to fetch per page. Example: 10
     * 
     * @apiResourceCollection scenario=Success App\Http\Resources\V1\UserResource
     * 
     * @apiResourceModel App\Models\User paginate=10
     * 
     * @response 401 scenario=Unauthenticated {
     *      "message": "Unauthenticated"
     * }
     */
    public function listAuthenticatedUserFollows(Request $request)
    {
        $authenticatedUser = $request->user();

        $perPage = $request->query('perPage', 10);

        $followers = $request->query('filter[follows]', 'followers');

        $query = $followers ? $authenticatedUser->followers()->paginate($perPage) : $authenticatedUser->followed()->paginate($perPage);

        return UserResource::collection($query);
    }
}

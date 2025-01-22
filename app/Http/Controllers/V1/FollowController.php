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
     * @urlParam id integer required The ID of the user to follow
     * 
     * @apiResource App\Http\Resources\V1\FollowResource
     * 
     * @apiResourceModel App\Models\Follow
     */
    public function store(Request $request, int $id)
    {
        $authenticatedUser = $request->user();

        $userToFollow = User::findOrFail($id);

        if ($authenticatedUser->cannot('store', $userToFollow)) {
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
    public function delete(Request $request, int $id)
    {
        $authenticatedUser = $request->user();

        $userToUnfollow = User::findOrFail($id);

        if ($authenticatedUser->cannot('delete', $userToUnfollow)) {
            abort(403);
        }

        $follow = Follow::where('follower_id', $authenticatedUser->id)
            ->where('followed_id', $userToUnfollow->id)
            ->first();

        $follow->delete();

        return response()->json(['message' => 'You have successfully unfollowed this user.']);
    }
}

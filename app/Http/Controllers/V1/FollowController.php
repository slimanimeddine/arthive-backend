<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Models\Follow;
use App\Models\User;
use App\Notifications\UserFollowed;
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
     * @response {
     *      'message' => 'You have successfully followed this user.'
     * }
     */
    public function followUser(Request $request, int $id)
    {
        $authenticatedUser = $request->user();

        $userToFollow = User::findOrFail($id);

        if ($authenticatedUser->cannot('follow', $userToFollow)) {
            abort(403);
        }

        Follow::create([
            'follower_id' => $authenticatedUser->id,
            'followed_id' => $userToFollow->id,
        ]);

        $userToFollow->notify(new UserFollowed($authenticatedUser));

        return response()->json(['message' => 'You have successfully followed this user.']);
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

        if ($authenticatedUser->cannot('unfollow', $userToUnfollow)) {
            abort(403);
        }

        $follow = Follow::where('follower_id', $authenticatedUser->id)
            ->where('followed_id', $userToUnfollow->id)
            ->first();

        $follow->delete();

        return response()->json(['message' => 'You have successfully unfollowed this user.']);
    }
}

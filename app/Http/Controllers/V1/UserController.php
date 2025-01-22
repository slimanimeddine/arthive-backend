<?php

namespace App\Http\Controllers\V1;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ArtworkResource;
use App\Http\Resources\V1\UserResource;
use App\Models\Artwork;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedSort;
use Spatie\QueryBuilder\QueryBuilder;
use App\Sorts\Users\NewSort;
use App\Sorts\Users\PopularSort;

/**
 * @group Users
 */
class UserController extends Controller
{
    /**
     * List Users
     * 
     * Retrieve a list of all users
     * 
     * @queryParam filter[country] string Filter artworks by country. Example: filter[country]=finland
     * 
     * @queryParam filter[category] string Filter artworks by category. Example: filter[category]=ceramics
     * 
     * @queryParam sort string Sort artworks by new, or popular. Example: sort=new
     * 
     * @queryParam page string The page number to fetch. Example: 1
     * 
     * @apiResourceCollection App\Http\Resources\V1\UserResource
     * 
     * @apiResourceModel App\Models\User with=artworks paginate=10
     */
    public function listUsers(Request $request)
    {
        $query = QueryBuilder::for(User::artists()->with(['artworks']))
            ->allowedFilters([
                AllowedFilter::exact('country'),
                AllowedFilter::exact('category', 'artworks.tags.name'),
            ])
            ->allowedSorts([
                AllowedSort::custom('new', new NewSort()),
                AllowedSort::custom('popular', new PopularSort()),
            ])
            ->paginate(10);

        return UserResource::collection($query);
    }

    /**
     * List Verified Users
     * 
     * Retrieve a list of verified users
     * 
     * @urlParam usersCount integer required The number of records to retrieve
     * 
     * @apiResourceCollection App\Http\Resources\V1\UserResource
     * 
     * @apiResourceModel App\Models\User
     */
    public function listVerifiedUsers(Request $request, int $usersCount)
    {
        $query = User::artists()->verified()
            ->limit($usersCount)
            ->get();

        return UserResource::collection($query);
    }

    /**
     * Show User
     * 
     * Retrieve a single user by username
     * 
     * @urlParam username string required The username of the user
     * 
     * @apiResource App\Http\Resources\V1\UserResource
     * 
     * @apiResourceModel App\Models\User
     */
    public function showUser(Request $request, string $username)
    {
        $query = User::artists()->where('username', $username)->firstOrFail();

        return new UserResource($query);
    }

    /**
     * List User Received Likes Count by Tag
     * 
     * Retrieve the number of likes an artist has received by tag
     * 
     * @urlParam username string required The username of the user
     * 
     * @response {
     *   "data": [
     *          {
     *              "tag_name": "abstract",
     *              "total_likes": 5
     *          },
     *          {
     *              "tag_name": "portrait",
     *              "total_likes": 3
     *          }
     *   ]
     * }
     * 
     */
    public function listUserReceivedLikesCountByTag(Request $request, string $username)
    {
        $user = User::artists()->where('username', $username)->firstOrFail();

        $likesByTag = $user->artworks()
            ->join('artwork_likes', 'artworks.id', '=', 'artwork_likes.artwork_id')
            ->join('artwork_tag', 'artworks.id', '=', 'artwork_tag.artwork_id')
            ->join('tags', 'artwork_tag.tag_id', '=', 'tags.id')
            ->select('tags.name as tag_name', DB::raw('COUNT(artwork_likes.id) as total_likes'))
            ->groupBy('tags.name')
            ->get();

        $totalLikes = $user->artworks()
            ->join('artwork_likes', 'artworks.id', '=', 'artwork_likes.artwork_id')
            ->count();

        return response()->json([
            'data' => $likesByTag,
        ]);
    }

    /**
     * Show User Received Likes Count
     * 
     * Retrieve the total number of likes an artist has received
     * 
     * @urlParam username string required The username of the user
     * 
     * @response {
     *  "data": 8
     * }
     */
    public function showUserReceivedLikesCount(Request $request, string $username)
    {
        $user = User::artists()->where('username', $username)->firstOrFail();

        $totalLikes = $user->artworks()
            ->join('artwork_likes', 'artworks.id', '=', 'artwork_likes.artwork_id')
            ->count();

        return response()->json([
            'data' => $totalLikes,
        ]);
    }

    /**
     * List User Artwork Tags
     * 
     * Retrieve a list of tags used by a user's artworks
     * 
     * @urlParam username string required The username of the user
     * 
     * @response {
     *   "data": [
     *          {
     *              "id": 1,
     *              "name": "abstract"
     *          },
     *          {
     *              "id": 5,
     *              "name": "portrait"
     *          }
     *   ]
     * }
     */
    public function listUserArtworkTags(Request $request, string $username)
    {
        $user = User::artists()->where('username', $username)->firstOrFail();

        $tags = $user->artworks()
            ->join('artwork_tag', 'artworks.id', '=', 'artwork_tag.artwork_id')
            ->join('tags', 'artwork_tag.tag_id', '=', 'tags.id')
            ->select('tags.id', 'tags.name')
            ->distinct()
            ->get();

        return response()->json([
            'data' => $tags,
        ]);
    }

    /**
     * List User Artworks
     * 
     * Retrieve a list of artworks submitted by a user
     * 
     * @urlParam username string required The username of the user
     * 
     * @queryParam filter[tag] string Filter artworks by tag. Example: filter[tag]=abstract
     * 
     * @queryParam page string The page number to fetch. Example: 1
     * 
     * @apiResourceCollection App\Http\Resources\V1\ArtworkResource 
     * 
     * @apiResourceModel App\Models\Artwork paginate=10
     */
    public function listUserArtworks(Request $request, string $username)
    {
        $user = User::artists()->where('username', $username)->firstOrFail();

        $query = QueryBuilder::for(Artwork::where('user_id', $user->id))
            ->allowedFilters([
                AllowedFilter::exact('tag', 'tags.name'),
            ])
            ->paginate(10);

        return ArtworkResource::collection($query);
    }

    /**
     * Show Authenticated User
     * 
     * Retrieve the currently authenticated user
     * 
     * @authenticated
     * 
     * @apiResource App\Http\Resources\V1\UserResource
     * 
     * @apiResourceModel App\Models\User
     */
    public function showAuthenticatedUser(Request $request)
    {
        return new UserResource($request->user());
    }

    /**
     * List Authenticated User Artworks
     * 
     * Retrieve a list of artworks submitted by the currently authenticated user
     * 
     * @authenticated
     * 
     * @queryParam page string The page number to fetch. Example: 1
     * 
     * @apiResourceCollection App\Http\Resources\V1\ArtworkResource
     * 
     * @apiResourceModel App\Models\Artwork with=artworkPhotos,tags paginate=10
     */
    public function listAuthenticatedUserArtworks(Request $request)
    {
        $authenticatedUser = $request->user();

        $artworks = $authenticatedUser->artworks()->with(['artworkPhotos', 'tags'])->paginate(10);

        return ArtworkResource::collection($artworks);
    }

    /**
     * List Authenticated User Favorite Artworks
     * 
     * Retrieve a list of artworks marked as favorite by the currently authenticated user
     * 
     * @authenticated
     * 
     * @queryParam page string The page number to fetch. Example: 1
     * 
     * @apiResourceCollection App\Http\Resources\V1\ArtworkResource
     * 
     * @apiResourceModel App\Models\Artwork with=artworkPhotos,tags paginate=10
     */
    public function listAuthenticatedUserFavoriteArtworks(Request $request)
    {
        $authenticatedUser = $request->user();

        $artworks = $authenticatedUser->favorites()->with(['artworkPhotos', 'tags'])->paginate(10);

        return ArtworkResource::collection($artworks);
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

    // /**
    //  * Get Authenticated User Notifications
    //  * 
    //  * Get a list of all the notifications sent to the authenticated user
    //  * 
    //  * @authenticated
    //  * 
    //  * @response {
    //  *      "data" => [
    //  *          "notifications" => [
    //  *              {
    //  * 
    //  *              }
    //  *          ]
    //  *      ]
    //  * }
    //  */
    // public function getAuthenticatedUserNotifications(Request $request)
    // {
    //     $authenticatedUser = $request->user();

    //     $notifications = $authenticatedUser->notifications;

    //     return response()->json([
    //         'data' => [
    //             'notifications' => $notifications
    //         ]
    //     ]);
    // }
}

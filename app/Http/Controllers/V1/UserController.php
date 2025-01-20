<?php

namespace App\Http\Controllers\V1;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\UserResource;
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
     * Get All Users
     * 
     * Get a list of all users
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
    public function getAllUsers(Request $request)
    {
        $query = QueryBuilder::for(User::with(['artworks']))
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
     * Get Verified Users
     * 
     * Get a list of verified users
     * 
     * @urlParam count integer required The number of records to retrieve
     * 
     * @apiResourceCollection App\Http\Resources\V1\UserResource
     * 
     * @apiResourceModel App\Models\User
     */
    public function getVerifiedUsers(Request $request, int $count)
    {
        $query = User::verified()
            ->limit($count)
            ->get();

        return UserResource::collection($query);
    }

    /**
     * Get User by Username
     * 
     * Get a single user by username
     * 
     * @urlParam username string required The username of the user
     * 
     * @apiResourceCollection App\Http\Resources\V1\UserResource
     * 
     * @apiResourceModel App\Models\User
     */
    public function getUser(Request $request, string $username)
    {
        $query = User::where('username', $username)->firstOrFail();

        return new UserResource($query);
    }

    /**
     * Get User Total Likes and Likes by Tag
     * 
     * Get the total number of likes received by a user and the number of likes received by tag
     * 
     * @urlParam username string required The username of the user
     * 
     * @response {
     *   "data": [
     *      "total_likes": 10,
     *      "likes_by_tag": [
     *          {
     *              "tag_name": "abstract",
     *              "total_likes": 5
     *          },
     *          {
     *              "tag_name": "portrait",
     *              "total_likes": 3
     *          }
     *      ]
     *   ]
     * }
     * 
     */
    public function getUserLikesByTag(Request $request, string $username)
    {
        $user = User::where('username', $username)->firstOrFail();

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
            'data' => [
                'total_likes' => $totalLikes,
                'likes_by_tag' => $likesByTag,
            ]
        ]);
    }

    /**
     * Get User Artwork Tags
     * 
     * Get a list of tags used by a user's artworks
     * 
     * @urlParam username string required The username of the user
     * 
     * @response {
     *   "data": [
     *      "tags": [
     *          {
     *              "id": 1,
     *              "name": "abstract"
     *          },
     *          {
     *              "id": 5,
     *              "name": "portrait"
     *          }
     *      ]
     *   ]
     * }
     */
    public function getUserArtworkTags(Request $request, string $username)
    {
        $user = User::where('username', $username)->firstOrFail();

        $tags = $user->artworks()
            ->join('artwork_tag', 'artworks.id', '=', 'artwork_tag.artwork_id')
            ->join('tags', 'artwork_tag.tag_id', '=', 'tags.id')
            ->select('tags.id', 'tags.name')
            ->distinct()
            ->get();

        return response()->json([
            'data' => [
                'tags' => $tags,
            ]
        ]);
    }
}

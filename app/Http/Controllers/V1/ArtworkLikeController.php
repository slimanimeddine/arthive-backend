<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ArtworkLikeResource;
use App\Models\Artwork;
use App\Models\ArtworkLike;
use App\Models\User;
use App\Notifications\ArtworkLikeNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * @group Artwork Likes
 */
class ArtworkLikeController extends Controller
{
    /**
     * Like Artwork
     * 
     * Like an artwork
     * 
     * @authenticated
     * 
     * @urlParam id integer required The ID of the artwork to like
     * 
     * @apiResource App\Http\Resources\V1\ArtworkLikeResource
     * 
     * @apiResourceModel App\Models\ArtworkLike
     */
    public function likeArtwork(Request $request, int $id)
    {
        $authenticatedUser = $request->user();

        $artwork = Artwork::findOrFail($id);

        if ($authenticatedUser->cannot('likeArtwork', $artwork)) {
            abort(403);
        }

        $artworkLike = ArtworkLike::create([
            'user_id' => $authenticatedUser->id,
            'artwork_id' => $artwork->id,
        ]);

        $artwork->user->notify(new ArtworkLikeNotification($authenticatedUser, $artwork));

        return new ArtworkLikeResource($artworkLike);
    }

    /**
     * Unlike Artwork
     * 
     * Unlike an artwork
     * 
     * @authenticated
     * 
     * @urlParam id integer required The ID of the artwork to unlike
     * 
     * @response {
     *      'message' => 'You have successfully unliked this artwork.'
     * }
     */
    public function unlikeArtwork(Request $request, int $id)
    {
        $authenticatedUser = $request->user();

        $artwork = Artwork::findOrFail($id);

        if ($authenticatedUser->cannot('unlikeArtwork', $artwork)) {
            abort(403);
        }

        $artworkLike = ArtworkLike::where('user_id', $authenticatedUser->id)
            ->where('artwork_id', $artwork->id)
            ->first();

        $artworkLike->delete();

        return response()->json([
            'message' => 'You have successfully unliked this artwork.'
        ]);
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
}

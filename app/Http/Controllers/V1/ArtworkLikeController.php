<?php

namespace App\Http\Controllers\V1;

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
class ArtworkLikeController extends ApiController
{
    /**
     * Like Artwork
     * 
     * Like an artwork
     * 
     * @authenticated
     * 
     * @urlParam artworkId integer required The ID of the artwork to like
     * 
     * @apiResource scenario=Success App\Http\Resources\V1\ArtworkLikeResource
     * 
     * @apiResourceModel App\Models\ArtworkLike
     * 
     * @response 401 scenario=Unauthenticated {
     *     "message": "Unauthenticated"
     * }
     * 
     * @response 404 scenario="Artwork not found" {
     *    "message": "The artwork you are trying to like does not exist.",
     *    "status": 404
     * }
     * 
     * @response 403 scenario=Unauthorized {
     *    "message": "You are not authorized to like this artwork.",
     *    "status": 403
     * }
     */
    public function likeArtwork(Request $request, int $artworkId)
    {
        $authenticatedUser = $request->user();

        $artwork = Artwork::find($artworkId);

        if (!$artwork) {
            return $this->error("The artwork you are trying to like does not exist.", 404);
        }

        if ($authenticatedUser->cannot('likeArtwork', $artwork)) {
            return $this->error("You are not authorized to like this artwork.", 403);
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
     * @urlParam artworkId integer required The ID of the artwork to unlike
     * 
     * @response 200 scenario=Success {
     *      'message' => 'You have successfully unliked this artwork.',
     *      'data' => [],
     *      'status' => 200
     * }
     * 
     * @response 401 scenario=Unauthenticated {
     *     "message": "Unauthenticated"
     * }
     * 
     * @response 404 scenario="Artwork not found" {
     *   "message": "The artwork you are trying to unlike does not exist.",
     *   "status": 404
     * }
     * 
     * @response 403 scenario=Unauthorized {
     *    "message": "You are not authorized to unlike this artwork.",
     *    "status": 403
     * }
     * 
     */
    public function unlikeArtwork(Request $request, int $artworkId)
    {
        $authenticatedUser = $request->user();

        $artwork = Artwork::published()->where('id', $artworkId)->first();

        if (!$artwork) {
            return $this->error("The artwork you are trying to unlike does not exist.", 404);
        }

        if ($authenticatedUser->cannot('unlikeArtwork', $artwork)) {
            return $this->error("You are not authorized to unlike this artwork.", 403);
        }

        $artworkLike = ArtworkLike::where('user_id', $authenticatedUser->id)
            ->where('artwork_id', $artwork->id)
            ->first();

        $artworkLike->delete();

        return $this->success('You have successfully unliked this artwork.');
    }

    /**
     * List User Received Likes Count by Tag
     * 
     * Retrieve the number of likes an artist has received by tag
     * 
     * @urlParam username string required The username of the user
     * 
     * @response 200 scenario=Success {
     *      "message": "",
     *      "data": [
     *          {
     *              "tag_name": "abstract",
     *              "total_likes": 5
     *          },
     *          {
     *              "tag_name": "portrait",
     *              "total_likes": 3
     *          }
     *      ],
     *      "status": 200
     * }
     * 
     * @response 404 scenario="User not found" {
     *      "message": "The user you are trying to retrieve likes for does not exist.",
     *      "status": 404
     * }
     */
    public function listUserReceivedLikesCountByTag(Request $request, string $username)
    {
        $user = User::artist()->where('username', $username)->first();

        if (!$user) {
            return $this->error("The user you are trying to retrieve likes for does not exist.", 404);
        }

        $artworksCount = $user->artworks()->count();

        if ($artworksCount === 0) {
            return $this->success('', []);
        }

        $likesByTag = DB::table('tags')
            ->join('artwork_tags', 'tags.id', '=', 'artwork_tags.tag_id')
            ->join('artworks', 'artwork_tags.artwork_id', '=', 'artworks.id')
            ->join('artwork_likes', 'artworks.id', '=', 'artwork_likes.artwork_id')
            ->where('artworks.user_id', $user->id)
            ->where('artworks.status', 'published')
            ->select('tags.name as tag_name', DB::raw('COUNT(DISTINCT artwork_likes.id) as total_likes'))
            ->groupBy('tags.name')
            ->get();

        return $this->success('', $likesByTag);
    }

    /**
     * Show User Received Likes Count
     * 
     * Retrieve the total number of likes an artist has received
     * 
     * @urlParam username string required The username of the user
     * 
     * @response 200 scenario=Success {
     *      "message": "",
     *      "data": 8,
     *      "status": 200
     * }
     * 
     * @response 404 scenario="User not found" {
     *     "message": "The user you are trying to retrieve likes for does not exist.",
     *     "status": 404
     * }
     */
    public function showUserReceivedLikesCount(Request $request, string $username)
    {
        $user = User::artist()->where('username', $username)->first();

        if (!$user) {
            return $this->error("The user you are trying to retrieve likes for does not exist.", 404);
        }

        $artworksCount = $user->artworks()->count();

        if ($artworksCount === 0) {
            return $this->success('', 0);
        }

        $totalLikes = $user->artworks()
            ->join('artwork_likes', 'artworks.id', '=', 'artwork_likes.artwork_id')
            ->where('artworks.status', 'published')
            ->count();

        return $this->success('', $totalLikes);
    }
}

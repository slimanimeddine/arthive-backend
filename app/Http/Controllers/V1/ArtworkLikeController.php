<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ArtworkLikeResource;
use App\Models\Artwork;
use App\Models\ArtworkLike;
use App\Notifications\ArtworkLikeNotification;
use Illuminate\Http\Request;

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
}

<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Models\Artwork;
use App\Models\ArtworkLike;
use App\Notifications\ArtworkLiked;
use Illuminate\Http\Request;

class ArtworkLikeController extends Controller
{
    /**
     * Like an Artwork
     * 
     * Like an artwork
     * 
     * @authenticated
     * 
     * @urlParam id integer required The ID of the artwork to like
     * 
     * @response {
     *      'message' => 'You have successfully liked this artwork.'
     * }
     */
    public function likeArtwork(Request $request, int $id)
    {
        $authenticatedUser = $request->user();

        $artwork = Artwork::findOrFail($id);

        if ($authenticatedUser->cannot('like', $artwork)) {
            abort(403);
        }

        ArtworkLike::create([
            'user_id' => $authenticatedUser->id,
            'artwork_id' => $artwork->id,
        ]);

        $artwork->user->notify(new ArtworkLiked($authenticatedUser, $artwork));

        return response()->json([
            'message' => 'You have successfully liked this artwork.'
        ]);
    }

    /**
     * Unlike an Artwork
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

        if ($authenticatedUser->cannot('unlike', $artwork)) {
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

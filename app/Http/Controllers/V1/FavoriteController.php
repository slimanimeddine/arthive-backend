<?php

namespace App\Http\Controllers\V1;

use App\Http\Resources\V1\ArtworkResource;
use App\Http\Resources\V1\FavoriteResource;
use App\Models\Artwork;
use App\Models\Favorite;
use Illuminate\Http\Request;

/**
 * @group Favorites
 */
class FavoriteController extends ApiController
{
    /**
     * List Authenticated User Favorite Artworks
     * 
     * Retrieve a list of artworks favorites by the currently authenticated user
     * 
     * @authenticated
     * 
     * @apiResourceCollection scenario=Success App\Http\Resources\V1\ArtworkResource
     * 
     * @apiResourceModel App\Models\Artwork
     * 
     * @response 401 scenario=Unauthenticated {
     *      "message": "Unauthenticated"
     * }
     */
    public function listAuthenticatedUserFavoriteArtworks(Request $request)
    {
        $authenticatedUser = $request->user();

        $query = $authenticatedUser->favorites()->get();

        return ArtworkResource::collection($query);
    }

    /**
     * Mark Artwork As Favorite
     * 
     * Mark an artwork as favorite
     * 
     * @authenticated
     * 
     * @urlParam artworkId integer required The ID of the artwork to mark as favorite
     * 
     * @apiResource scenario=Success App\Http\Resources\V1\FavoriteResource
     * 
     * @apiResourceModel App\Models\Favorite
     * 
     * @response 401 scenario=Unauthenticated {
     *     "message": "Unauthenticated"
     * }
     * 
     * @response 404 scenario="Artwork not found" {
     *    "message": "The artwork you are trying to mark as favorite does not exist.",
     *    "status": 404
     * }
     * 
     * @response 403 scenario=Unauthorized {
     *    "message": "You are not authorized to mark as favorite this artwork.",
     *    "status": 403
     * }
     */
    public function markArtworkAsFavorite(Request $request, int $artworkId)
    {
        $authenticatedUser = $request->user();

        $artwork = Artwork::find($artworkId);

        if (!$artwork) {
            return $this->error("The artwork you are trying to mark as favorite does not exist.", 404);
        }

        if ($authenticatedUser->cannot('markArtworkAsFavorite', $artwork)) {
            return $this->error("You are not authorized to mark as favorite this artwork.", 403);
        }

        $favorite = Favorite::create([
            'user_id' => $authenticatedUser->id,
            'artwork_id' => $artwork->id,
        ]);

        return new FavoriteResource($favorite);
    }

    /**
     * Remove Artwork From Favorites
     * 
     * Remove an artwork from favorites
     * 
     * @authenticated
     * 
     * @urlParam artworkId integer required The ID of the artwork to remove from favorites
     * 
     * @response 200 scenario=Success {
     *      'message': 'You have successfully removed this artwork from your favorites.',
     *      'data': null,
     *      'status' => 200
     * }
     * 
     * @response 401 scenario=Unauthenticated {
     *     "message": "Unauthenticated"
     * }
     * 
     * @response 404 scenario="Artwork not found" {
     *   "message": "The artwork you are trying to remove from favorites does not exist.",
     *   "status": 404
     * }
     * 
     * @response 403 scenario=Unauthorized {
     *    "message": "You are not authorized to remove from favorites this artwork.",
     *    "status": 403
     * }
     */
    public function removeArtworkFromFavorites(Request $request, int $artworkId)
    {
        $authenticatedUser = $request->user();

        $artwork = Artwork::find($artworkId);

        if (!$artwork) {
            return $this->error("The artwork you are trying to remove from favorites does not exist.", 404);
        }

        if ($authenticatedUser->cannot('removeArtworkFromFavorites', $artwork)) {
            return $this->error("You are not authorized to remove from favorites this artwork.", 403);
        }

        $favorite = Favorite::where('user_id', $authenticatedUser->id)
            ->where('artwork_id', $artwork->id)
            ->first();

        $favorite->delete();

        return $this->success("You have successfully removed this artwork from your favorites.");
    }

    /**
     * Check if Authenticated User is Favoriting
     * 
     * Check if the currently authenticated user is favoriting an artwork
     * 
     * @authenticated
     * 
     * @urlParam artworkId integer required The ID of the artwork to check if the authenticated user is favoriting
     * 
     * @response 200 scenario=Success {
     *      "message": "",
     *      "data": true,
     *      "status": 200
     * }
     * 
     * @response 404 scenario="Artwork not found" {
     *      "message": "The artwork you are trying to check if you favorited does not exist.",
     *      "status": 404
     * }
     * 
     * @response 401 scenario=Unauthenticated {
     *      "message": "Unauthenticated"
     * }
     */

    public function isAuthenticatedUserFavoriting(Request $request, int $artworkId)
    {
        $authenticatedUser = $request->user();

        $artwork = Artwork::published()->where('id', $artworkId)->first();

        if (!$artwork) {
            return $this->error("The artwork you are trying to check if you favorited does not exist.", 404);
        }

        $isFavoriting = Favorite::where('user_id', $authenticatedUser->id)
            ->where('artwork_id', $artwork->id)
            ->exists();

        return $this->success('', $isFavoriting);
    }
}

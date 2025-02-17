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
     * @queryParam page integer The page number to fetch. Example: 1
     * 
     * @queryParam perPage integer The number of records to fetch per page. Example: 10
     * 
     * @apiResourceCollection scenario=Success App\Http\Resources\V1\ArtworkResource
     * 
     * @apiResourceModel App\Models\Artwork with=artworkPhotos,tags paginate=10
     * 
     * @response 401 scenario=Unauthenticated {
     *      "message": "Unauthenticated"
     * }
     */
    public function listAuthenticatedUserFavoriteArtworks(Request $request)
    {
        $authenticatedUser = $request->user();

        $perPage = $request->query('perPage', 10);

        $query = $authenticatedUser->favorites()->with(['artworkPhotos', 'tags'])
            ->paginate($perPage);

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
}

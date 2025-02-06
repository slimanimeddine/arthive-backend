<?php

namespace App\Http\Controllers\V1;

use App\Http\Resources\V1\ArtworkResource;
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
}

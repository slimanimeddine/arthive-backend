<?php

namespace App\Http\Controllers\V1;

use App\Http\Resources\V1\ArtworkResource;
use App\Models\Artwork;
use App\Sorts\Artworks\NewSort;
use App\Sorts\Artworks\PopularSort;
use App\Sorts\Artworks\RisingSort;
use App\Sorts\Artworks\TrendingSort;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedSort;
use Spatie\QueryBuilder\QueryBuilder;

/**
 * @group Admin
 */
class AdminController extends ApiController
{
    /**
     * List Artworks
     *
     * Retrieve a list of all artworks
     * 
     * @authenticated
     *
     * @queryParam filter[tag] string Filter artworks by tag. Example: graphic
     * @queryParam filter[status] string Filter artworks by status. Enum: draft, published. Example: draft
     * @queryParam sort string Sort artworks. Enum: rising, new, popular, trending. Example: trending
     * @queryParam page string The page number to fetch. Example: 1
     * @queryParam perPage string The number of records to fetch per page. Example: 10
     *
     * @apiResourceCollection scenario=Success App\Http\Resources\V1\ArtworkResource
     *
     * @apiResourceModel App\Models\Artwork paginate=10
     * 
     * @response 401 scenario=Unauthenticated {
     *      "message": "Unauthenticated"
     * }
     * 
     * @response 403 scenario=Unauthorized {
     *     "message": "You are not authorized to update this user.",
     *     "status": 403
     * }
     */
    public function listArtworks(Request $request)
    {
        $perPage = $request->query('perPage', 10);

        $artworks = QueryBuilder::for(Artwork::class)
            ->allowedFilters([
                AllowedFilter::exact('tag', 'tags.name'),
                AllowedFilter::exact('status'),
            ])
            ->allowedSorts([
                AllowedSort::custom('trending', new TrendingSort),
                AllowedSort::custom('rising', new RisingSort),
                AllowedSort::custom('new', new NewSort),
                AllowedSort::custom('popular', new PopularSort),
            ])
            ->paginate($perPage);

        return ArtworkResource::collection($artworks);
    }

}

<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ArtworkResource;
use App\Models\Artwork;
use App\Sorts\Artworks\NewSort;
use App\Sorts\Artworks\PopularSort;
use App\Sorts\Artworks\RisingSort;
use App\Sorts\Artworks\TrendingSort;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedSort;

/**
 * @group Artworks
 */
class ArtworkController extends Controller
{
    /**
     * List Artworks
     * 
     * Retrieve a list of all artworks
     * 
     * @queryParam filter[tag] string Filter artworks by tag. Example: filter[tag]=abstract
     * 
     * @queryParam sort string Sort artworks by trending, rising, new, or popular. Example: sort=trending
     * 
     * @queryParam page string The page number to fetch. Example: 1
     * 
     * @apiResourceCollection App\Http\Resources\V1\ArtworkResource
     * 
     * @apiResourceModel App\Models\Artwork with=user paginate=10
     */
    public function listArtworks(Request $request)
    {
        $query = QueryBuilder::for(Artwork::with(['user']))
            ->allowedFilters([
                AllowedFilter::exact('tag', 'tags.name'),
            ])
            ->allowedSorts([
                AllowedSort::custom('trending', new TrendingSort()),
                AllowedSort::custom('rising', new RisingSort()),
                AllowedSort::custom('new', new NewSort()),
                AllowedSort::custom('popular', new PopularSort()),
            ])
            ->paginate(10);

        return ArtworkResource::collection($query);
    }

    /**
     * List Trending Artworks
     * 
     * Retrieve a list of trending artworks
     * 
     * @urlParam artworksCount integer required The number of records to retrieve
     * 
     * @apiResourceCollection App\Http\Resources\V1\ArtworkResource
     * 
     * @apiResourceModel App\Models\Artwork with=user
     */
    public function listTrendingArtworks(Request $request, int $artworksCount)
    {
        $query = QueryBuilder::for(Artwork::trending()->with(['user']))
            ->limit($artworksCount)
            ->get();

        return ArtworkResource::collection($query);
    }

    /**
     * List New Artworks
     * 
     * Retrieve a list of new artworks
     * 
     * @urlParam artworksCount integer required The number of records to retrieve
     * 
     * @apiResourceCollection App\Http\Resources\V1\ArtworkResource
     * 
     * @apiResourceModel App\Models\Artwork with=user
     */
    public function listNewArtworks(Request $request, int $artworksCount)
    {
        $query = QueryBuilder::for(Artwork::new()->with(['user']))
            ->limit($artworksCount)
            ->get();

        return ArtworkResource::collection($query);
    }

    /**
     * Show Artwork
     * 
     * Retrieve a single artwork by id
     * 
     * @urlParam artworkId integer required The id of the artwork
     * 
     * @apiResourceCollection App\Http\Resources\V1\ArtworkResource
     * 
     * @apiResourceModel App\Models\Artwork with=user,artworkPhotos,artworkComments.user,artworkLikes.user,tags
     */
    public function showArtwork(Request $request, int $artworkId)
    {
        $query = Artwork::findOrFail($artworkId)
            ->with([
                'user',
                'artworkPhotos',
                'artworkLikes.user',
                'artworkComments.user',
                'tags'
            ]);

        return new ArtworkResource($query);
    }
}

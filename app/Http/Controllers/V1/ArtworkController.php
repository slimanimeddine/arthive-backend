<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ArtworkResource;
use App\Models\Artwork;
use App\Models\User;
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
     * Get All Artworks
     * 
     * Get a list of all artworks
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
    public function getAllArtworks(Request $request)
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
     * Get Trending Artworks
     * 
     * Get a list of trending artworks
     * 
     * @urlParam count integer required The number of records to retrieve
     * 
     * @apiResourceCollection App\Http\Resources\V1\ArtworkResource
     * 
     * @apiResourceModel App\Models\Artwork with=user
     */
    public function getTrendingArtworks(Request $request, int $count)
    {
        $query = QueryBuilder::for(Artwork::trending()->with(['user']))
            ->limit($count)
            ->get();

        return ArtworkResource::collection($query);
    }

    /**
     * Get New Artworks
     * 
     * Get a list of new artworks
     * 
     * @urlParam count integer required The number of records to retrieve
     * 
     * @apiResourceCollection App\Http\Resources\V1\ArtworkResource
     * 
     * @apiResourceModel App\Models\Artwork with=user
     */
    public function getNewArtworks(Request $request, int $count)
    {
        $query = QueryBuilder::for(Artwork::new()->with(['user']))
            ->limit($count)
            ->get();

        return ArtworkResource::collection($query);
    }

    /**
     * Get Artwork by Id
     * 
     * Get a single artwork by id
     * 
     * @urlParam id integer required The id of the artwork
     * 
     * @apiResourceCollection App\Http\Resources\V1\ArtworkResource
     * 
     * @apiResourceModel App\Models\Artwork with=user,artworkPhotos,artworkComments.user,artworkLikes.user,tags
     */
    public function getArtwork(Request $request, int $id)
    {
        $query = Artwork::findOrFail($id)
            ->with([
                'user',
                'artworkPhotos',
                'artworkLikes.user',
                'artworkComments.user',
                'tags'
            ]);

        return new ArtworkResource($query);
    }

    /**
     * Get User Artworks
     * 
     * Get a list of artworks by a user
     * 
     * @urlParam username string required The username of the user
     * 
     * @queryParam filter[tag] string Filter artworks by tag. Example: filter[tag]=abstract
     * 
     * @queryParam page string The page number to fetch. Example: 1
     * 
     * @apiResourceCollection App\Http\Resources\V1\ArtworkResource 
     * 
     * @apiResourceModel App\Models\Artwork with=user paginate=10
     */
    public function getUserArtworks(Request $request, string $username)
    {
        $user = User::where('username', $username)->firstOrFail();

        $query = QueryBuilder::for(Artwork::where('user_id', $user->id))
            ->allowedFilters([
                AllowedFilter::exact('tag', 'tags.name'),
            ])
            ->paginate(10);

        return ArtworkResource::collection($query);
    }
}

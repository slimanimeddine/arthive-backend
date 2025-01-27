<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\CreateArtworkDraftRequest;
use App\Http\Resources\V1\ArtworkResource;
use App\Models\Artwork;
use App\Models\Tag;
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
     * List Published Artworks
     * 
     * Retrieve a list of all published artworks
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
    public function listPublishedArtworks(Request $request)
    {
        $query = QueryBuilder::for(Artwork::published()->with(['user']))
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
     * List Searched Published Artworks
     * 
     * Retrieve a list of published artworks that match a search query
     * 
     * @urlParam search string required The search query
     * 
     * @queryParam page string The page number to fetch. Example: 1
     * 
     * @apiResourceCollection App\Http\Resources\V1\ArtworkResource
     * 
     * @apiResourceModel App\Models\Artwork with=user paginate=10
     */
    public function listSearchedPublishedArtworks(Request $request, string $search)
    {
        $query = Artwork::search($search)
            ->published()
            ->with(['user'])
            ->paginate(10);

        return ArtworkResource::collection($query);
    }

    /**
     * List Trending Published Artworks
     * 
     * Retrieve a list of trending published artworks
     * 
     * @urlParam count integer required The number of records to retrieve
     * 
     * @apiResourceCollection App\Http\Resources\V1\ArtworkResource
     * 
     * @apiResourceModel App\Models\Artwork with=user
     */
    public function listTrendingPublishedArtworks(Request $request, int $count)
    {
        $query = QueryBuilder::for(Artwork::published()->trending()->with(['user']))
            ->limit($count)
            ->get();

        return ArtworkResource::collection($query);
    }

    /**
     * List New Published Artworks
     * 
     * Retrieve a list of new published artworks
     * 
     * @urlParam count integer required The number of records to retrieve
     * 
     * @apiResourceCollection App\Http\Resources\V1\ArtworkResource
     * 
     * @apiResourceModel App\Models\Artwork with=user
     */
    public function listNewPublishedArtworks(Request $request, int $count)
    {
        $query = QueryBuilder::for(Artwork::published()->new()->with(['user']))
            ->limit($count)
            ->get();

        return ArtworkResource::collection($query);
    }

    /**
     * Show Published Artwork
     * 
     * Retrieve a single published artwork by id
     * 
     * @urlParam id integer required The id of the artwork
     * 
     * @apiResourceCollection App\Http\Resources\V1\ArtworkResource
     * 
     * @apiResourceModel App\Models\Artwork with=user,artworkPhotos,artworkComments.user,artworkLikes.user,tags
     */
    public function showPublishedArtwork(Request $request, int $id)
    {
        $query = Artwork::published()->where('id', $id)
            ->with([
                'user',
                'artworkPhotos',
                'artworkLikes.user',
                'artworkComments.user',
                'tags'
            ])
            ->firstOrFail();

        return new ArtworkResource($query);
    }

    /**
     * List User Published Artworks
     * 
     * Retrieve a list of artworks published by a user
     * 
     * @urlParam username string required The username of the user
     * 
     * @queryParam filter[tag] string Filter artworks by tag. Example: filter[tag]=abstract
     * 
     * @queryParam page string The page number to fetch. Example: 1
     * 
     * @apiResourceCollection App\Http\Resources\V1\ArtworkResource 
     * 
     * @apiResourceModel App\Models\Artwork paginate=10
     */
    public function listUserPublishedArtworks(Request $request, string $username)
    {
        $user = User::artists()->where('username', $username)->firstOrFail();

        $query = QueryBuilder::for(Artwork::published()->where('user_id', $user->id))
            ->allowedFilters([
                AllowedFilter::exact('tag', 'tags.name'),
            ])
            ->paginate(10);

        return ArtworkResource::collection($query);
    }

    /**
     * List Authenticated User Published Artworks
     * 
     * Retrieve a list of artworks published by the currently authenticated user
     * 
     * @authenticated
     * 
     * @queryParam page string The page number to fetch. Example: 1
     * 
     * @apiResourceCollection App\Http\Resources\V1\ArtworkResource
     * 
     * @apiResourceModel App\Models\Artwork with=artworkPhotos,tags paginate=10
     */
    public function listAuthenticatedUserArtworks(Request $request)
    {
        $authenticatedUser = $request->user();

        $artworks = $authenticatedUser->artworks()->published()->with(['artworkPhotos', 'tags'])->paginate(10);

        return ArtworkResource::collection($artworks);
    }

    /**
     * List Authenticated User Favorite Artworks
     * 
     * Retrieve a list of artworks marked as favorite by the currently authenticated user
     * 
     * @authenticated
     * 
     * @queryParam page string The page number to fetch. Example: 1
     * 
     * @apiResourceCollection App\Http\Resources\V1\ArtworkResource
     * 
     * @apiResourceModel App\Models\Artwork with=artworkPhotos,tags paginate=10
     */
    public function listAuthenticatedUserFavoriteArtworks(Request $request)
    {
        $authenticatedUser = $request->user();

        $artworks = $authenticatedUser->favorites()->with(['artworkPhotos', 'tags'])->paginate(10);

        return ArtworkResource::collection($artworks);
    }

    /**
     * Create Artwork Draft
     * 
     * Create a new artwork draft
     * 
     * @authenticated
     * 
     * @apiResource App\Http\Resources\V1\ArtworkResource
     * 
     * @apiResourceModel App\Models\Artwork
     */
    public function createArtworkDraft(CreateArtworkDraftRequest $request)
    {
        $authenticatedUser = $request->user();

        $artwork = Artwork::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $authenticatedUser->id,
        ]);

        $photos = $request->input('photos');

        foreach ($photos as $photo) {
            $artwork->artworkPhotos()->create([
                'path' => $photo['file']->store('artwork-photos'),
                'is_main' => $photo['is_main'],
            ]);
        }

        $tags = $request->input('tags');

        foreach ($tags as $tagName) {
            $tag = Tag::where('name', $tagName)->firstOrFail();

            $artwork->tags()->attach($tag->id);
        }

        return new ArtworkResource($artwork);
    }

    public function updateArtworkDraft() {}

    public function deleteArtworkDraft() {}

    /**
     * Publish Artwork Draft
     * 
     * Publish an artwork draft
     * 
     * @authenticated
     * 
     * @urlParam id integer required The id of the artwork
     * 
     * @apiResource App\Http\Resources\V1\ArtworkResource
     * 
     * @apiResourceModel App\Models\Artwork
     */
    public function publishArtworkDraft(Request $request, int $id)
    {
        $authenticatedUser = $request->user();

        $artwork = Artwork::draft()->where('id', $id)->firstOrFail();

        if ($authenticatedUser->cannot('publishArtworkDraft', $artwork)) {
            abort(403);
        }

        $artwork->status = 'published';
        $artwork->save();

        return new ArtworkResource($artwork);
    }
}

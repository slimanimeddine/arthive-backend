<?php

namespace App\Http\Controllers\V1;

use App\Http\Requests\V1\CreateArtworkRequest;
use App\Http\Requests\V1\UpdateArtworkRequest;
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
class ArtworkController extends ApiController
{
    /**
     * List Published Artworks
     * 
     * Retrieve a list of all published artworks
     * 
     * @queryParam filter[tag] string Filter artworks by tag. Enum: painting, graphic, sculpture, folk art, textile, ceramics, stained glass windows, beads, paper, glass, dolls, jewellery, fresco, metal, mosaic. Example: graphic
     * 
     * @queryParam searchQuery string Search for artworks by title or description. Example: lorem
     * 
     * @queryParam sort string Sort artworks. Enum: rising, new, popular, trending. Example: trending
     * 
     * @queryParam page integer The page number to fetch. Example: 1
     * 
     * @queryParam perPage integer The number of records to fetch per page. Example: 10
     * 
     * @apiResourceCollection scenario=Success App\Http\Resources\V1\ArtworkResource
     * 
     * @apiResourceModel App\Models\Artwork with=user paginate=10
     */
    public function listPublishedArtworks(Request $request)
    {
        $perPage = $request->query('perPage', 10);

        $searchQuery = $request->query('searchQuery');

        $searchIds = isset($searchQuery) ? Artwork::search($searchQuery)->get()->pluck('id')->toArray() : [];

        $artworks = QueryBuilder::for(Artwork::published()->with(['user']))
            ->allowedFilters([
                AllowedFilter::exact('tag', 'tags.name'),
            ])
            ->allowedSorts([
                AllowedSort::custom('trending', new TrendingSort()),
                AllowedSort::custom('rising', new RisingSort()),
                AllowedSort::custom('new', new NewSort()),
                AllowedSort::custom('popular', new PopularSort()),
            ])
            ->tap(function ($query) use ($searchIds) {
                return empty($searchIds) ? $query :  $query->whereIn('artworks.id', $searchIds);
            })
            ->paginate($perPage);

        return ArtworkResource::collection($artworks);
    }

    /**
     * Show Published Artwork
     * 
     * Retrieve a single published artwork by id
     * 
     * @urlParam artworkId integer required The id of the artwork
     * 
     * @apiResourceCollection scenario=Success App\Http\Resources\V1\ArtworkResource
     * 
     * @apiResourceModel App\Models\Artwork with=user,artworkPhotos,artworkComments.user,artworkLikes.user,tags
     * 
     * @response 404 scenario="Artwork not found" {
     *    "message": "The artwork you are trying to retrieve does not exist.",
     *    "status": 404
     * }
     */
    public function showPublishedArtwork(Request $request, int $artworkId)
    {
        $artwork = Artwork::published()->where('id', $artworkId)
            ->with([
                'user',
                'artworkPhotos',
                'artworkLikes.user',
                'artworkComments.user',
                'tags'
            ])
            ->first();

        if (!$artwork) {
            return $this->error("The artwork you are trying to retrieve does not exist.", 404);
        }

        return new ArtworkResource($artwork);
    }

    /**
     * List User Published Artworks
     * 
     * Retrieve a list of artworks published by a user
     * 
     * @urlParam username string required The username of the user
     * 
     * @queryParam filter[tag] string Filter artworks by tag. Enum: painting, graphic, sculpture, folk art, textile, ceramics, stained glass windows, beads, paper, glass, dolls, jewellery, fresco, metal, mosaic. Example: graphic
     * 
     * @queryParam page string The page number to fetch. Example: 1
     * 
     * @queryParam perPage integer The number of records to fetch per page. Example: 10
     * 
     * @apiResourceCollection scenario=Success App\Http\Resources\V1\ArtworkResource 
     * 
     * @apiResourceModel App\Models\Artwork paginate=10
     * 
     * @response 404 scenario="User not found" {
     *   "message": "The user you are trying to retrieve his artworks does not exist.",
     *   "status": 404
     * }
     */
    public function listUserPublishedArtworks(Request $request, string $username)
    {
        $user = User::artist()->where('username', $username)->first();

        if (!$user) {
            return $this->error("The user you are trying to retrieve his artworks does not exist.", 404);
        }

        $perPage = $request->query('perPage', 10);

        $artworks = QueryBuilder::for(Artwork::published()->where('user_id', $user->id))
            ->allowedFilters([
                AllowedFilter::exact('tag', 'tags.name'),
            ])
            ->paginate($perPage);

        return ArtworkResource::collection($artworks);
    }

    /**
     * List Authenticated User Artworks
     * 
     * Retrieve a list of artworks published or drafts by the currently authenticated user
     * 
     * @authenticated
     * 
     * @queryParam filter[status] string Filter artworks by status. Enum: draft, published. Example: published
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
    public function listAuthenticatedUserArtworks(Request $request)
    {
        $authenticatedUser = $request->user();

        $perPage = $request->query('perPage', 10);

        $artworks = QueryBuilder::for(Artwork::where('user_id', $authenticatedUser->id)->with(['artworkPhotos', 'tags']))
            ->allowedFilters(['status'])
            ->paginate($perPage);

        return ArtworkResource::collection($artworks);
    }

    /**
     * Create Artwork
     * 
     * Create a new artwork
     * 
     * @authenticated
     * 
     * @apiResource scenario=Success App\Http\Resources\V1\ArtworkResource
     * 
     * @apiResourceModel App\Models\Artwork
     * 
     * @response 401 scenario=Unauthenticated {
     *     "message": "Unauthenticated"
     * }
     *
     * @response 403 scenario=Unauthorized {
     *    "message": "You are not authorized to create an artwork draft.",
     *    "status": 403
     * }
     */
    public function createArtwork(CreateArtworkRequest $request)
    {
        $authenticatedUser = $request->user();

        if ($authenticatedUser->cannot('createArtwork', Artwork::class)) {
            return $this->error("You are not authorized to create an artwork draft.", 403);
        }

        $artwork = Artwork::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $authenticatedUser->id,
        ]);

        $photos = $request->photos;

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

    /**
     * Update Artwork Draft
     * 
     * Update an artwork draft
     * 
     * @authenticated
     * 
     * @urlParam artworkId integer required The id of the artwork
     * 
     * @apiResource scenario=Success App\Http\Resources\V1\ArtworkResource
     * 
     * @apiResourceModel App\Models\Artwork
     * 
     * @response 403 scenario=Unauthorized {
     *     "message": "You are not authorized to update this artwork draft.",
     *     "status": 403
     * }
     * 
     * @response 401 scenario=Unauthenticated {
     *    "message": "Unauthenticated"
     * }
     * 
     * @response 404 scenario="Artwork not found" {
     *   "message": "The artwork you are trying to update does not exist.",
     *   "status": 404
     * }
     */
    public function updateArtwork(UpdateArtworkRequest $request, int $artworkId)
    {
        $authenticatedUser = $request->user();

        $artwork = Artwork::find($artworkId);

        if (!$artwork) {
            return $this->error("The artwork you are trying to update does not exist.", 404);
        }

        if ($authenticatedUser->cannot('updateArtwork', $artwork)) {
            return $this->error("You are not authorized to update this artwork.", 403);
        }

        $artwork->update($request->safe()->except(['tags']));

        if ($request->has('tags')) {
            $tags = $request->tags;

            $artwork->tags()->detach();

            foreach ($tags as $tagName) {
                $tag = Tag::where('name', $tagName)->firstOrFail();

                $artwork->tags()->attach($tag->id);
            }
        }

        return new ArtworkResource($artwork);
    }

    /**
     * Delete Artwork
     * 
     * Delete an artwork
     * 
     * @authenticated
     * 
     * @urlParam artworkId integer required The id of the artwork
     * 
     * @response 200 scenario=Success {
     *      "message": "Artwork deleted successfully"
     * }
     * 
     * @response 403 scenario=Unauthorized {
     *     "message": "You are not authorized to delete this artwork.",
     *     "status": 403
     * }
     * 
     * @response 401 scenario=Unauthenticated {
     *    "message": "Unauthenticated"
     * }
     * 
     * @response 404 scenario="Artwork not found" {
     *   "message": "The artwork you are trying to delete does not exist.",
     *   "status": 404
     * }
     */
    public function deleteArtwork(Request $request, int $artworkId)
    {
        $authenticatedUser = $request->user();

        $artwork = Artwork::find($artworkId);

        if (!$artwork) {
            return $this->error("The artwork you are trying to delete does not exist.", 404);
        }

        if ($authenticatedUser->cannot('deleteArtwork', $artwork)) {
            return $this->error("You are not authorized to delete this artwork.", 403);
        }

        $artwork->delete();

        return $this->success('Artwork deleted successfully.');
    }
}

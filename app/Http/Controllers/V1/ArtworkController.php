<?php

namespace App\Http\Controllers\V1;

use App\Http\Requests\V1\CreateArtworkRequest;
use App\Http\Requests\V1\UpdateArtworkRequest;
use App\Http\Resources\V1\ArtworkResource;
use App\Models\Artwork;
use App\Models\ArtworkTag;
use App\Models\Tag;
use App\Models\User;
use App\Sorts\Artworks\NewSort;
use App\Sorts\Artworks\PopularSort;
use App\Sorts\Artworks\RisingSort;
use App\Sorts\Artworks\TrendingSort;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedSort;
use Spatie\QueryBuilder\QueryBuilder;

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
     * @queryParam filter[tag] string Filter artworks by tag. Example: graphic
     * @queryParam searchQuery string Search for artworks by title or description. Example: lorem
     * @queryParam sort string Sort artworks. Enum: rising, new, popular, trending. Example: trending
     * @queryParam page string The page number to fetch. Example: 1
     * @queryParam perPage string The number of records to fetch per page. Example: 10
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
                AllowedSort::custom('trending', new TrendingSort),
                AllowedSort::custom('rising', new RisingSort),
                AllowedSort::custom('new', new NewSort),
                AllowedSort::custom('popular', new PopularSort),
            ])
            ->tap(function ($query) use ($searchIds) {
                return empty($searchIds) ? $query : $query->whereIn('artworks.id', $searchIds);
            })
            ->paginate($perPage);

        return ArtworkResource::collection($artworks);
    }

    /**
     * Show Published Artwork
     *
     * Retrieve a single published artwork by id
     *
     * @urlParam artworkId string required The id of the artwork
     *
     * @apiResource scenario=Success App\Http\Resources\V1\ArtworkResource
     *
     * @apiResourceModel App\Models\Artwork with=user,artworkPhotos,artworkLikes.user,artworkComments.user,tags
     *
     * @response 404 scenario="Artwork not found" {
     *    "message": "The artwork you are trying to retrieve does not exist.",
     *    "status": 404
     * }
     */
    public function showPublishedArtwork(Request $request, string $artworkId)
    {
        $artwork = Artwork::published()->where('id', $artworkId)
            ->with([
                'user',
                'artworkPhotos',
                'artworkLikes.user',
                'artworkComments.user',
                'tags',
            ])
            ->first();

        if (!$artwork) {
            return $this->notFound('The artwork you are trying to retrieve does not exist.');
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
     * @queryParam sort string Sort artworks. Enum: rising, new, popular, trending. Example: trending
     * @queryParam page string The page number to fetch. Example: 1
     * @queryParam perPage string The number of records to fetch per page. Example: 10
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
            return $this->notFound('The user you are trying to retrieve his artworks does not exist.');
        }

        $perPage = $request->query('perPage', 10);

        $artworks = QueryBuilder::for(Artwork::published()->where('user_id', $user->id))
            ->allowedFilters([
                AllowedFilter::exact('tag', 'tags.name'),
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

    /**
     * List Authenticated User Artworks
     *
     * Retrieve a list of artworks published or drafts by the currently authenticated user
     *
     * @authenticated
     *
     * @queryParam filter[status] string Filter artworks by status. Enum: draft, published. Example: published
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
     */
    public function listAuthenticatedUserArtworks(Request $request)
    {
        $authenticatedUser = $request->user();

        $perPage = $request->query('perPage', 10);

        $artworks = QueryBuilder::for(Artwork::where('user_id', $authenticatedUser->id))
            ->allowedFilters(['status'])
            ->paginate($perPage);

        return ArtworkResource::collection($artworks);
    }

    /**
     * Show Authenticated User Artwork
     *
     * Retrieve a single artwork published or draft by the currently authenticated user
     *
     * @authenticated
     *
     * @urlParam artworkId string required The id of the artwork
     *
     * @apiResource scenario=Success App\Http\Resources\V1\ArtworkResource
     *
     * @apiResourceModel App\Models\Artwork with=artworkPhotos,tags
     *
     * @response 404 scenario="Artwork not found" {
     *  "message": "The artwork you are trying to retrieve does not exist.",
     *  "status": 404
     * }
     * @response 401 scenario=Unauthenticated {
     *     "message": "Unauthenticated"
     * }
     */
    public function showAuthenticatedUserArtwork(Request $request, string $artworkId)
    {
        $authenticatedUser = $request->user();

        $artwork = Artwork::where('user_id', $authenticatedUser->id)->where('id', $artworkId)->with([
            'artworkPhotos',
            'tags',
        ])->first();

        if (!$artwork) {
            return $this->notFound('The artwork you are trying to retrieve does not exist.');
        }

        return new ArtworkResource($artwork);
    }

    /**
     * Create Artwork
     *
     * Create a new artwork
     *
     * @authenticated
     *
     * @header Content-Type multipart/form-data
     *
     * @apiResource scenario=Success App\Http\Resources\V1\ArtworkResource
     *
     * @apiResourceModel App\Models\Artwork
     *
     * @response 401 scenario=Unauthenticated {
     *     "message": "Unauthenticated"
     * }
     * @response 403 scenario=Unauthorized {
     *    "message": "You are not authorized to create an artwork draft.",
     *    "status": 403
     * }
     */
    public function createArtwork(CreateArtworkRequest $request)
    {
        $authenticatedUser = $request->user();

        if ($authenticatedUser->cannot('createArtwork', Artwork::class)) {
            return $this->unauthorized('You are not authorized to create an artwork draft.');
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

            ArtworkTag::create([
                'artwork_id' => $artwork->id,
                'tag_id' => $tag->id,
            ]);
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
     * @urlParam artworkId string required The id of the artwork
     *
     * @apiResource scenario=Success App\Http\Resources\V1\ArtworkResource
     *
     * @apiResourceModel App\Models\Artwork
     *
     * @response 403 scenario=Unauthorized {
     *     "message": "You are not authorized to update this artwork draft.",
     *     "status": 403
     * }
     * @response 401 scenario=Unauthenticated {
     *    "message": "Unauthenticated"
     * }
     * @response 404 scenario="Artwork not found" {
     *   "message": "The artwork you are trying to update does not exist.",
     *   "status": 404
     * }
     */
    public function updateArtwork(UpdateArtworkRequest $request, string $artworkId)
    {
        $authenticatedUser = $request->user();

        $artwork = Artwork::find($artworkId);

        if (!$artwork) {
            return $this->notFound('The artwork you are trying to update does not exist.');
        }

        if ($authenticatedUser->cannot('updateArtwork', $artwork)) {
            return $this->unauthorized('You are not authorized to update this artwork.');
        }

        $artwork->update($request->safe()->except(['tags']));

        if ($request->has('tags')) {
            $tags = $request->tags;

            ArtworkTag::where('artwork_id', $artwork->id)->delete();

            foreach ($tags as $tagName) {
                $tag = Tag::where('name', $tagName)->firstOrFail();

                ArtworkTag::create([
                    'artwork_id' => $artwork->id,
                    'tag_id' => $tag->id,
                ]);
            }
        }

        return new ArtworkResource($artwork);
    }

    /**
     * Publish Artwork
     *
     * Publish an artwork draft
     *
     * @authenticated
     *
     * @urlParam artworkId string required The id of the artwork
     *
     * @apiResource scenario=Success App\Http\Resources\V1\ArtworkResource
     *
     * @apiResourceModel App\Models\Artwork
     *
     * @response 403 scenario=Unauthorized {
     *    "message": "You are not authorized to publish this artwork.",
     *   "status": 403
     * }
     * @response 401 scenario=Unauthenticated {
     *   "message": "Unauthenticated"
     * }
     * @response 404 scenario="Artwork not found" {
     *  "message": "The artwork you are trying to publish does not exist.",
     * "status": 404
     * }
     */
    public function publishArtwork(Request $request, string $artworkId)
    {
        $authenticatedUser = $request->user();

        $artwork = Artwork::find($artworkId);

        if (!$artwork) {
            return $this->notFound('The artwork you are trying to publish does not exist.');
        }

        if ($authenticatedUser->cannot('publishArtwork', $artwork)) {
            return $this->unauthorized('You are not authorized to publish this artwork.');
        }

        $artwork->update(['status' => 'published']);

        return new ArtworkResource($artwork);
    }

    /**
     * Delete Artwork
     *
     * Delete an artwork
     *
     * @authenticated
     *
     * @urlParam artworkId string required The id of the artwork
     *
     * @response 200 scenario=Success {
     *      "message": "Artwork deleted successfully"
     *     "status": 200
     * }
     * @response 403 scenario=Unauthorized {
     *     "message": "You are not authorized to delete this artwork.",
     *     "status": 403
     * }
     * @response 401 scenario=Unauthenticated {
     *    "message": "Unauthenticated"
     * }
     * @response 404 scenario="Artwork not found" {
     *   "message": "The artwork you are trying to delete does not exist.",
     *   "status": 404
     * }
     */
    public function deleteArtwork(Request $request, string $artworkId)
    {
        $authenticatedUser = $request->user();

        $artwork = Artwork::find($artworkId);

        if (!$artwork) {
            return $this->notFound('The artwork you are trying to delete does not exist.');
        }

        if ($authenticatedUser->cannot('deleteArtwork', $artwork)) {
            return $this->unauthorized('You are not authorized to delete this artwork.');
        }

        $artwork->delete();

        return $this->noContent('Artwork deleted successfully.');
    }
}

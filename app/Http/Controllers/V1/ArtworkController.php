<?php

namespace App\Http\Controllers\V1;

use App\Http\Requests\V1\CreateArtworkDraftRequest;
use App\Http\Requests\V1\UpdateArtworkDraftRequest;
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
     * @queryParam filter[tag] string Filter artworks by tag. Example: filter[tag]=abstract
     * 
     * @queryParam sort string Sort artworks by trending, rising, new, or popular. Example: sort=trending
     * 
     * @queryParam page string The page number to fetch. Example: 1
     * 
     * @apiResourceCollection scenario=Success App\Http\Resources\V1\ArtworkResource
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
     * @urlParam searchQuery string required The search query
     * 
     * @queryParam page string The page number to fetch. Example: 1
     * 
     * @apiResourceCollection scenario=Success App\Http\Resources\V1\ArtworkResource
     * 
     * @apiResourceModel App\Models\Artwork with=user paginate=10
     */
    public function listSearchedPublishedArtworks(Request $request, string $searchQuery)
    {
        $query = Artwork::search($searchQuery)
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
     * @apiResourceCollection scenario=Success App\Http\Resources\V1\ArtworkResource
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
     * @apiResourceCollection scenario=Success App\Http\Resources\V1\ArtworkResource
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
        $query = Artwork::published()->where('id', $artworkId)
            ->with([
                'user',
                'artworkPhotos',
                'artworkLikes.user',
                'artworkComments.user',
                'tags'
            ])
            ->firstOr(function () {
                return $this->error("The artwork you are trying to retrieve does not exist.", 404);
            });

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
        $user = User::artists()->where('username', $username)->firstOr(function () {
            return $this->error("The user you are trying to retrieve his artworks does not exist.", 404);
        });

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
     * @apiResourceCollection scenario=Success App\Http\Resources\V1\ArtworkResource
     * 
     * @apiResourceModel App\Models\Artwork with=artworkPhotos,tags paginate=10
     * 
     * @response 401 scenario=Unauthenticated {
     *     "message": "Unauthenticated"
     * }
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
    public function createArtworkDraft(CreateArtworkDraftRequest $request)
    {
        $authenticatedUser = $request->user();

        if ($authenticatedUser->cannot('createArtworkDraft', Artwork::class)) {
            return $this->error("You are not authorized to create an artwork draft.", 403);
        }

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
    public function updateArtworkDraft(UpdateArtworkDraftRequest $request, int $artworkId)
    {
        $authenticatedUser = $request->user();

        $artwork = Artwork::draft()->where('id', $artworkId)->firstOr(function () {
            return $this->error("The artwork you are trying to update does not exist.", 404);
        });

        if ($authenticatedUser->cannot('updateArtworkDraft', $artwork)) {
            return $this->error("You are not authorized to update this artwork draft.", 403);
        }

        $artwork->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        $tags = $request->input('tags');

        $artwork->tags()->detach();

        foreach ($tags as $tagName) {
            $tag = Tag::where('name', $tagName)->firstOrFail();

            $artwork->tags()->attach($tag->id);
        }

        return new ArtworkResource($artwork);
    }

    /**
     * Delete Artwork Draft
     * 
     * Delete an artwork draft
     * 
     * @authenticated
     * 
     * @urlParam artworkId integer required The id of the artwork
     * 
     * @response 200 scenario=Success {
     *      "message": "Artwork draft deleted successfully"
     * }
     * 
     * @response 403 scenario=Unauthorized {
     *     "message": "You are not authorized to delete this artwork draft.",
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
    public function deleteArtworkDraft(Request $request, int $artworkId)
    {
        $authenticatedUser = $request->user();

        $artwork = Artwork::draft()->where('id', $artworkId)->firstOr(function () {
            return $this->error("The artwork you are trying to delete does not exist.", 404);
        });

        if ($authenticatedUser->cannot('deleteArtworkDraft', $artwork)) {
            return $this->error("You are not authorized to delete this artwork draft.", 403);
        }

        $artwork->delete();

        return $this->success('Artwork draft deleted successfully.');
    }

    /**
     * Publish Artwork Draft
     * 
     * Publish an artwork draft
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
     *    "message": "You are not authorized to publish this artwork draft.",
     *    "status": 403
     * }
     * 
     * @response 401 scenario=Unauthenticated {
     *   "message": "Unauthenticated"
     * }
     * 
     * @response 404 scenario="Artwork not found" {
     *   "message": "The artwork you are trying to publish does not exist.",
     *   "status": 404
     * }
     */
    public function publishArtworkDraft(Request $request, int $artworkId)
    {
        $authenticatedUser = $request->user();

        $artwork = Artwork::draft()->where('id', $artworkId)->firstOr(function () {
            return $this->error("The artwork you are trying to publish does not exist.", 404);
        });

        if ($authenticatedUser->cannot('publishArtworkDraft', $artwork)) {
            return $this->error("You are not authorized to publish this artwork draft.", 403);
        }

        $artwork->update([
            'status' => 'published',
        ]);

        return new ArtworkResource($artwork);
    }
}

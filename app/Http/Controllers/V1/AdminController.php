<?php

namespace App\Http\Controllers\V1;

use App\Filters\Users\VerifiedFilter;
use App\Http\Requests\V1\ReviewArtistVerificationRequestRequest;
use App\Http\Resources\V1\ArtistVerificationRequestResource;
use App\Http\Resources\V1\ArtworkResource;
use App\Http\Resources\V1\UserResource;
use App\Models\ArtistVerificationRequest;
use App\Models\Artwork;
use App\Models\User;
use App\Notifications\ArtistVerificationResponseNotification;
use App\Sorts\Artworks\NewSort;
use App\Sorts\Artworks\PopularSort;
use App\Sorts\Artworks\RisingSort;
use App\Sorts\Artworks\TrendingSort;
use App\Sorts\Users\NewSort as UserNewSort;
use App\Sorts\Users\PopularSort as UserPopularSort;
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
     * @response 403 scenario=Unauthorized {
     *     "message": "You are not authorized to access this resource.",
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

    /**
     * Show Artwork
     *
     * Retrieve a specific artwork by its ID.
     *
     * @authenticated
     *
     * @urlParam artworkId string required the id of the artwork. Example: 0197df53-4ed0-7337-b648-1b763a6d6857
     *
     * @apiResource scenario=Success App\Http\Resources\V1\ArtworkResource
     *
     * @apiResourceModel App\Models\Artwork with=user,artworkPhotos,tags
     *
     * @response 401 scenario=Unauthenticated {
     *       "message": "Unauthenticated",
     * }
     * @response 403 scenario=Unauthorized {
     *       "message": "You are not authorized to access this resource.",
     *       "status": 403
     * }
     * @response 404 scenario="Artwork Not Found" {
     *       "message": "The artwork you are trying to retrieve does not exist.",
     *       "status": 404
     * }
     */
    public function showArtwork(Request $request, string $artworkId)
    {
        $artwork = Artwork::with([
            'user',
            'artworkPhotos',
            'tags',
        ])->find($artworkId);

        if (! $artwork) {
            return $this->notFound('The artwork you are trying to retrieve does not exist.');
        }

        return new ArtworkResource($artwork);
    }

    /**
     * List Users
     *
     * Retrieve a list of all users
     *
     * @queryParam filter[country] string Filter artists by country. Example: finland
     * @queryParam filter[tag] string Filter artists by artwork tag. Example: ceramics
     * @queryParam filter[verified] boolean Filter artists by verification status. Example: true
     * @queryParam sort string Sort artists by new, or popular. Enum: new, popular. Example: new
     * @queryParam page string The page number to fetch. Example: 1
     * @queryParam perPage string The number of records to retrieve per page. Example: 10
     *
     * @apiResourceCollection scenario=Success App\Http\Resources\V1\UserResource
     *
     * @apiResourceModel App\Models\User paginate=10
     *
     * @response 401 scenario=Unauthenticated {
     *      "message": "Unauthenticated"
     * }
     * @response 403 scenario=Unauthorized {
     *      "message": "You are not authorized to access this resource.",
     *      "status": 403
     * }
     */
    public function listUsers(Request $request)
    {
        $perPage = $request->query('perPage', 10);

        $query = QueryBuilder::for(User::artist())
            ->allowedFilters([
                AllowedFilter::exact('country'),
                AllowedFilter::exact('tag', 'artworks.tags.name'),
                AllowedFilter::custom('verified', new VerifiedFilter),
            ])
            ->allowedSorts([
                AllowedSort::custom('new', new UserNewSort),
                AllowedSort::custom('popular', new UserPopularSort),
            ])
            ->paginate($perPage);

        return UserResource::collection($query);
    }

    /**
     * Show Artist
     *
     * Retrieve a specific artist by its ID.
     *
     * @authenticated
     *
     * @urlParam artistId string required the id of the artwork. Example: 0197df53-4ed0-7337-b648-1b763a6d6857
     *
     * @apiResource scenario=Success App\Http\Resources\V1\UserResource
     *
     * @apiResourceModel App\Models\User with=artworks
     *
     * @response 401 scenario=Unauthenticated {
     *       "message": "Unauthenticated",
     * }
     * @response 403 scenario=Unauthorized {
     *       "message": "You are not authorized to access this resource.",
     *       "status": 403
     * }
     * @response 404 scenario="Artist Not Found" {
     *       "message": "The artist you are trying to retrieve does not exist.",
     *       "status": 404
     * }
     */
    public function showArtist(Request $request, string $artistId)
    {
        $artist = User::with([
            'artworks',
        ])->find($artistId);

        if (! $artist) {
            return $this->notFound('The artist you are trying to retrieve does not exist.');
        }

        return new UserResource($artist);
    }

    /**
     * Review Artist Verification Request
     *
     * Reviews an artist verification request
     *
     * @authenticated
     *
     * @urlParam artistVerificationRequestId string required The ID of the artist verification request to review. Example: 0197df53-4ed0-7337-b648-1b763a6d6857
     *
     * @apiResource scenario=Success App\Http\Resources\V1\ArtistVerificationRequestResource
     *
     * @apiResourceModel App\Models\ArtistVerificationRequest
     *
     * @response 401 scenario=Unauthenticated {
     *      "message": "Unauthenticated"
     * }
     * @response 403 scenario=Unauthorized {
     *      "message": "You are not authorized to access this resource.",
     *      "status": 403
     * }
     * @response 404 scenario="Artist verification request not found" {
     *      "message": "The artist verification request you are trying to review does not exist.",
     *      "status": 404
     * }
     */
    public function reviewArtistVerificationRequest(ReviewArtistVerificationRequestRequest $request, string $artistVerificationRequestId)
    {
        $artistVerificationRequest = ArtistVerificationRequest::find($artistVerificationRequestId);

        if (! $artistVerificationRequest) {
            return $this->notFound('The artist verification request you are trying to review does not exist.');
        }

        $status = $request->status;
        $reason = $request->has('reason') ? $request->reason : '';

        $artistVerificationRequest->update([
            'status' => $status,
            'reason' => $reason,
        ]);

        $artistVerificationRequest->user->notify(new ArtistVerificationResponseNotification($artistVerificationRequest));

        return new ArtistVerificationRequestResource($artistVerificationRequest);
    }

    /**
     * List Artist Verification Requests
     *
     * Retrieve a list of artist verification requests submitted by artists.
     *
     * @authenticated
     *
     * @queryParam perPage integer The number of records to fetch per page. Example: 10
     * @queryParam page string The page number to fetch. Example: 1
     * @queryParam filter[status] string Filter artworks by status. Enum: pending, approved, rejected. Example: approved
     *
     * @apiResourceCollection App\Http\Resources\V1\ArtistVerificationRequestResource
     *
     * @apiResourceModel App\Models\ArtistVerificationRequest paginate=10
     *
     * @response 401 scenario=Unauthenticated {
     *     "message": "Unauthenticated"
     * }
     * @response 403 scenario=Unauthorized {
     *      "message": "You are not authorized to access this resource.",
     *      "status": 403
     * }
     */
    public function listArtistVerificationRequests(Request $request)
    {
        $perPage = $request->query('perPage', 10);

        $query = QueryBuilder::for(ArtistVerificationRequest::class)
            ->allowedFilters(['status'])
            ->paginate($perPage);

        return ArtistVerificationRequestResource::collection($query);
    }

    /**
     * Show Artist Verification Request
     *
     * Retrieve a specific artist verification request by its ID.
     *
     * @authenticated
     *
     * @urlParam artistVerificationRequestId string required the id of the artist verification request. Example: 0197df53-4ed0-7337-b648-1b763a6d6857
     *
     * @apiResource scenario=Success App\Http\Resources\V1\ArtistVerificationRequestResource
     *
     * @apiResourceModel App\Models\ArtistVerificationRequest
     *
     * @response 401 scenario=Unauthenticated {
     *       "message": "Unauthenticated",
     * }
     * @response 403 scenario=Unauthorized {
     *       "message": "You are not authorized to access this resource.",
     *       "status": 403
     * }
     * @response 404 scenario="Artist Not Found" {
     *       "message": "The artist verification request you are trying to retrieve does not exist.",
     *       "status": 404
     * }
     */
    public function showArtistVerificationRequest(Request $request, string $artistVerificationRequestId)
    {
        $artistVerificationRequest = ArtistVerificationRequest::find($artistVerificationRequestId);

        if (! $artistVerificationRequest) {
            return $this->notFound('The artist verification request you are trying to retrieve does not exist.');
        }

        return new ArtistVerificationRequestResource($artistVerificationRequest);
    }
}

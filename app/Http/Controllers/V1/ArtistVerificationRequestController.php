<?php

namespace App\Http\Controllers\V1;

use App\Http\Requests\V1\ReviewArtistVerificationRequestRequest;
use App\Http\Resources\V1\ArtistVerificationRequestResource;
use App\Models\ArtistVerificationRequest;
use App\Models\User;
use App\Notifications\ArtistVerificationRequestNotification;
use App\Notifications\ArtistVerificationResponseNotification;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

/**
 * @group Artist Verification Requests
 */
class ArtistVerificationRequestController extends ApiController
{
    /**
     * Submit Artist Verification Request
     *
     * Submits an artist verification request
     *
     * @authenticated
     *
     * @apiResource scenario=Success App\Http\Resources\V1\ArtistVerificationRequestResource
     *
     * @apiResourceModel App\Models\ArtistVerificationRequest
     *
     * @response 401 scenario=Unauthenticated {
     *      "message": "Unauthenticated"
     * }
     * @response 403 scenario=Unauthorized {
     *      "message": "You are not authorized to submit an artist verification request.",
     *      "status": 403
     * }
     * @response 400 scenario="Request limit reached" {
     *    "message": "You can only submit a verification request once every 7 days.",
     *   "status": 400
     * }
     * @response 400 scenario="Pending request exists" {
     *   "message": "You already have a pending verification request.",
     *  "status": 400
     * }
     * @response 400 scenario="Insufficient artworks" {
     *   "message": "You must have at least 3 published artworks to submit a verification request.",
     * "status": 400
     * }
     * @response 400 scenario="Incomplete profile" {
     *  "message": "You must complete your profile details before submitting a verification request (first name, last name, bio, country, photo).",
     * "status": 400
     * }
     */
    public function submitArtistVerificationRequest(Request $request)
    {
        $authenticatedUser = $request->user();

        if ($authenticatedUser->cannot('submitArtistVerificationRequest', ArtistVerificationRequest::class)) {
            return $this->unauthorized('You are not authorized to submit an artist verification request.');
        }

        $lastSubmission = ArtistVerificationRequest::where('user_id', $authenticatedUser->id)->latest()->first();

        if ($lastSubmission && now()->diffInDays($lastSubmission->created_at) < 7) {
            return $this->error('You can only submit a verification request once every 7 days.', 400);
        }

        if ($lastSubmission && $lastSubmission->status === 'pending') {
            return $this->error('You already have a pending verification request.', 400);
        }

        $publishedArtworksCount = $authenticatedUser->artworks()->published()->count();

        if ($publishedArtworksCount < 3) {
            return $this->error('You must have at least 3 published artworks to submit a verification request.', 400);
        }

        if (empty($authenticatedUser->first_name) || empty($authenticatedUser->last_name) || empty($authenticatedUser->country) || empty($authenticatedUser->bio) || empty($authenticatedUser->photo)) {
            return $this->error('You must complete your profile details before submitting a verification request (first name, last name, bio, country, photo).', 400);
        }

        $verificationRequest = ArtistVerificationRequest::create([
            'user_id' => $authenticatedUser->id,
        ]);

        $adminUsers = User::admin()->get();

        foreach ($adminUsers as $adminUser) {
            $adminUser->notify(new ArtistVerificationRequestNotification($authenticatedUser));
        }

        return new ArtistVerificationRequestResource($verificationRequest);
    }

    /**
     * Review Artist Verification Request
     *
     * Reviews an artist verification request
     *
     * @authenticated
     *
     * @urlParam artistVerificationRequestId string required The ID of the artist verification request to review.
     *
     * @apiResource scenario=Success App\Http\Resources\V1\ArtistVerificationRequestResource
     *
     * @apiResourceModel App\Models\ArtistVerificationRequest
     *
     * @response 401 scenario=Unauthenticated {
     *      "message": "Unauthenticated"
     * }
     * @response 403 scenario=Unauthorized {
     *      "message": "You are not authorized to review this artist verification request.",
     *      "status": 403
     * }
     * @response 404 scenario="Artist verification request not found" {
     *      "message": "The artist verification request you are trying to review does not exist.",
     *      "status": 404
     * }
     */
    public function reviewArtistVerificationRequest(ReviewArtistVerificationRequestRequest $request, string $artistVerificationRequestId)
    {
        $authenticatedUser = $request->user();

        $artistVerificationRequest = ArtistVerificationRequest::find($artistVerificationRequestId);

        if (!$artistVerificationRequest) {
            return $this->notFound('The artist verification request you are trying to review does not exist.');
        }

        if ($authenticatedUser->cannot('reviewArtistVerificationRequest', $artistVerificationRequest)) {
            return $this->unauthorized('You are not authorized to review this artist verification request.');
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
     *
     * @apiResourceCollection App\Http\Resources\V1\ArtistVerificationRequestResource
     *
     * @apiResourceModel App\Models\ArtistVerificationRequest with=user paginate=10
     *
     * @response 401 scenario=Unauthenticated {
     *     "message": "Unauthenticated"
     * }
     */
    public function listArtistVerificationRequests(Request $request)
    {
        $authenticatedUser = $request->user();

        $perPage = $request->query('perPage', 10);

        if ($authenticatedUser->cannot('listArtistVerificationRequests', ArtistVerificationRequest::class)) {
            return $this->unauthorized('You are not authorized to list artist verification requests.');
        }

        $query = QueryBuilder::for(ArtistVerificationRequest::with(['user']))
            ->allowedFilters(['status'])
            ->allowedSorts(['created_at', 'status'])
            ->defaultSort('-created_at')
            ->paginate($perPage);

        return ArtistVerificationRequestResource::collection($query);
    }

    /**
     * Get Authenticated User Artist Verification Requests
     * 
     * Retrieve a list of artist verification requests submitted by the authenticated user.
     * 
     * @authenticated
     * 
     * @apiResourceCollection App\Http\Resources\V1\ArtistVerificationRequestResource
     *
     * @apiResourceModel App\Models\ArtistVerificationRequest paginate=10
     * 
     * @response 401 scenario=Unauthenticated {
     *     "message": "Unauthenticated"
     * }
     */
    public function getAuthenticatedUserArtistVerificationRequests(Request $request)
    {
        $authenticatedUser = $request->user();

        $query = ArtistVerificationRequest::where('user_id', $authenticatedUser->id)->paginate();

        return ArtistVerificationRequestResource::collection($query);
    }
}

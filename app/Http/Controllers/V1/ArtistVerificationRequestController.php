<?php

namespace App\Http\Controllers\V1;

use App\Http\Resources\V1\ArtistVerificationRequestResource;
use App\Models\ArtistVerificationRequest;
use App\Models\User;
use App\Notifications\ArtistVerificationRequestNotification;
use Illuminate\Http\Request;

/**
 * @group Artist Verification Request
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
     *     "message": "Unauthenticated"
     * }
     * 
     * @response 403 scenario=Unauthorized {
     *    "message": "You are not authorized to submit an artist verification request.",
     *    "status": 403
     * }
     * 
     * @response 400 scenario="Request limit reached" {
     *    "message": "You can only submit a verification request once every 7 days.",
     *   "status": 400
     * }
     * 
     * @response 400 scenario="Pending request exists" {
     *   "message": "You already have a pending verification request.",
     *  "status": 400
     * }
     * 
     * @response 400 scenario="Insufficient artworks" {
     *   "message": "You must have at least 3 published artworks to submit a verification request.",
     * "status": 400
     * }
     * 
     * @response 400 scenario="Incomplete profile" {
     *  "message": "You must complete your profile details before submitting a verification request (first name, last name, bio, country, photo).",
     * "status": 400
     * }
     */
    public function submitArtistVerificationRequest(Request $request)
    {
        $authenticatedUser = $request->user();

        if ($authenticatedUser->cannot('submitArtistVerificationRequest', ArtistVerificationRequest::class)) {
            return $this->error('You are not authorized to submit an artist verification request.', 403);
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

        $adminUsers = User::where('role', 'admin')->get();

        foreach ($adminUsers as $adminUser) {
            $adminUser->notify(new ArtistVerificationRequestNotification($authenticatedUser));
        }

        return new ArtistVerificationRequestResource($verificationRequest);
    }
}

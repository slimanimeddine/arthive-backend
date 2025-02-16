<?php

namespace App\Http\Controllers\V1;

use App\Http\Requests\V1\UploadArtworkPhotosRequest;
use App\Http\Resources\V1\ArtworkPhotoResource;
use App\Models\Artwork;
use App\Models\ArtworkPhoto;
use Illuminate\Http\Request;

/**
 * @group Artwork Photos
 */
class ArtworkPhotoController extends ApiController
{
    /**
     * Upload Artwork Photos
     * 
     * Upload photos to an artwork draft
     * 
     * @authenticated
     * 
     * @urlParam artworkId integer required The id of the artwork
     * 
     * @apiResourceCollection scenario=Success App\Http\Resources\V1\ArtworkPhotoResource
     * 
     * @apiResourceModel App\Models\ArtworkPhoto
     * 
     * @response 401 scenario=Unauthenticated {
     *     "message": "Unauthenticated"
     * }
     * 
     * @response 403 scenario=Unauthorized {
     *     "message": "You are not authorized to upload photos to this artwork."
     *     "status": 403
     * }
     * 
     * @response 404 scenario="Artwork not found" {
     *     "message": "The artwork you are trying to upload photos to does not exist.",
     *     "status": 404
     * }
     * 
     */
    public function uploadArtworkPhotos(UploadArtworkPhotosRequest $request, int $artworkId)
    {
        $authenticatedUser = $request->user();

        $artwork = Artwork::find($artworkId);

        if (!$artwork) {
            return $this->error("The artwork you are trying to upload photos to does not exist.", 404);
        }

        if ($authenticatedUser->cannot('uploadArtworkPhotos', $artwork)) {
            return $this->error("You are not authorized to upload photos to this artwork.", 403);
        }

        $photos = $request->file('photos');

        foreach ($photos as $photo) {
            $artwork->artworkPhotos()->create([
                'path' => $photo->store('artwork-photos'),
                'is_main' => false,
            ]);
        }

        return ArtworkPhotoResource::collection($artwork->artworkPhotos);
    }

    /**
     * Set Artwork Photo As Main
     * 
     * Set an artwork photo as the main photo of the artwork
     * 
     * @authenticated
     * 
     * @urlParam artworkPhotoId integer required The id of the artwork photo
     * 
     * @apiResource scenario=Success App\Http\Resources\V1\ArtworkPhotoResource
     * 
     * @apiResourceModel App\Models\ArtworkPhoto
     * 
     * @response 401 scenario=Unauthenticated {
     *    "message": "Unauthenticated"
     * }
     * 
     * @response 403 scenario=Unauthorized {
     *    "message": "You are not authorized to set this photo as the main photo of the artwork."
     *    "status": 403
     * }
     * 
     * @response 404 scenario="Artwork photo not found" {
     *   "message": "The artwork photo you are trying to set as main does not exist.",
     *   "status": 404
     * }
     */
    public function setArtworkPhotoAsMain(Request $request, int $artworkPhotoId)
    {
        $authenticatedUser = $request->user();

        $artworkPhoto = ArtworkPhoto::find($artworkPhotoId);

        if (!$artworkPhoto) {
            return $this->error("The artwork photo you are trying to set as main does not exist.", 404);
        }

        $artwork = $artworkPhoto->artwork;

        if ($authenticatedUser->cannot('setArtworkPhotoAsMain', $artworkPhoto)) {
            return $this->error("You are not authorized to set this photo as the main photo of the artwork.", 403);
        }

        $artworkPhotoAlreadyMain = $artwork->artworkPhotos()->where('is_main', true)->first();

        if ($artworkPhotoAlreadyMain) {
            $artworkPhotoAlreadyMain->update([
                'is_main' => false,
            ]);
        }

        $artworkPhoto->update([
            'is_main' => true,
        ]);

        return new ArtworkPhotoResource($artworkPhoto);
    }

    /**
     * Delete Artwork Photo
     * 
     * Delete an artwork photo
     * 
     * @authenticated
     * 
     * @urlParam artworkPhotoId integer required The id of the artwork photo
     * 
     * @response 200 scenario=Success {
     *    "message": "Artwork photo deleted successfully",
     *    "data" => [],
     *    "status": 200
     * }
     * 
     * @response 401 scenario=Unauthenticated {
     *    "message": "Unauthenticated"
     * }
     * 
     * @response 403 scenario=Unauthorized {
     *    "message": "You are not authorized to delete this artwork photo.",
     *    "status": 403
     * }
     * 
     * @response 404 scenario="Artwork photo not found" {
     *    "message": "The artwork photo you are trying to delete does not exist.",
     *    "status": 404
     * }
     * 
     */
    public function deleteArtworkPhoto(Request $request, int $artworkPhotoId)
    {
        $authenticatedUser = $request->user();

        $artworkPhoto = ArtworkPhoto::find($artworkPhotoId);

        if (!$artworkPhoto) {
            return $this->error("The artwork photo you are trying to delete does not exist.", 404);
        }

        if ($authenticatedUser->cannot('deleteArtworkPhoto', $artworkPhoto)) {
            return $this->error("You are not authorized to delete this artwork photo.", 403);
        }

        $artworkPhoto->delete();

        return $this->success("Artwork photo deleted successfully");
    }
}

<?php

namespace App\Http\Controllers\V1;

use App\Http\Requests\V1\ReplaceArtworkPhotoPathRequest;
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
     * @response 403 scenario=Unauthorized {
     *     "message": "You are not authorized to upload photos to this artwork."
     *     "status": 403
     * }
     * @response 404 scenario="Artwork not found" {
     *     "message": "The artwork you are trying to upload photos to does not exist.",
     *     "status": 404
     * }
     */
    public function uploadArtworkPhotos(UploadArtworkPhotosRequest $request, int $artworkId)
    {
        $authenticatedUser = $request->user();

        $artwork = Artwork::find($artworkId);

        if (! $artwork) {
            return $this->notFound('The artwork you are trying to upload photos to does not exist.');
        }

        if ($authenticatedUser->cannot('uploadArtworkPhotos', $artwork)) {
            return $this->unauthorized('You are not authorized to upload photos to this artwork.');
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
     * @response 403 scenario=Unauthorized {
     *    "message": "You are not authorized to set this photo as the main photo of the artwork."
     *    "status": 403
     * }
     * @response 404 scenario="Artwork photo not found" {
     *   "message": "The artwork photo you are trying to set as main does not exist.",
     *   "status": 404
     * }
     */
    public function setArtworkPhotoAsMain(Request $request, int $artworkPhotoId)
    {
        $authenticatedUser = $request->user();

        $artworkPhoto = ArtworkPhoto::find($artworkPhotoId);

        if (! $artworkPhoto) {
            return $this->notFound('The artwork photo you are trying to set as main does not exist.');
        }

        $artwork = $artworkPhoto->artwork;

        if ($authenticatedUser->cannot('setArtworkPhotoAsMain', $artworkPhoto)) {
            return $this->unauthorized('You are not authorized to set this photo as the main photo of the artwork.');
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
     *    "status": 204
     * }
     * @response 401 scenario=Unauthenticated {
     *    "message": "Unauthenticated"
     * }
     * @response 403 scenario=Unauthorized {
     *    "message": "You are not authorized to delete this artwork photo.",
     *    "status": 403
     * }
     * @response 404 scenario="Artwork photo not found" {
     *    "message": "The artwork photo you are trying to delete does not exist.",
     *    "status": 404
     * }
     */
    public function deleteArtworkPhoto(Request $request, int $artworkPhotoId)
    {
        $authenticatedUser = $request->user();

        $artworkPhoto = ArtworkPhoto::find($artworkPhotoId);

        if (! $artworkPhoto) {
            return $this->notFound('The artwork photo you are trying to delete does not exist.');
        }

        if ($authenticatedUser->cannot('deleteArtworkPhoto', $artworkPhoto)) {
            return $this->unauthorized('You are not authorized to delete this artwork photo.');
        }

        $artworkPhoto->delete();

        return $this->noContent('Artwork photo deleted successfully');
    }

    /**
     * Replace Artwork Photo Path
     *
     * Replace the path of an artwork photo
     *
     * @authenticated
     *
     * @urlParam artworkPhotoId integer required The id of the artwork photo
     *
     * @response 200 scenario=Success {
     *    "message": "Artwork photo replaced successfully",
     *    "status": 204
     * }
     * @response 401 scenario=Unauthenticated {
     *    "message": "Unauthenticated"
     * }
     * @response 403 scenario=Unauthorized {
     *    "message": "You are not authorized to replace this artwork photo.",
     *    "status": 403
     * }
     * @response 404 scenario="Artwork photo not found" {
     *    "message": "The artwork photo you are trying to replace does not exist.",
     *    "status": 404
     * }
     */
    public function replaceArtworkPhotoPath(ReplaceArtworkPhotoPathRequest $request, int $artworkPhotoId)
    {
        $authenticatedUser = $request->user();

        $artworkPhoto = ArtworkPhoto::find($artworkPhotoId);

        if (! $artworkPhoto) {
            return $this->notFound('The artwork photo you are trying to replace does not exist.');
        }

        if ($authenticatedUser->cannot('replaceArtworkPhotoPath', $artworkPhoto)) {
            return $this->unauthorized('You are not authorized to replace this artwork photo.');
        }

        $photo = $request->file('photo');

        $artworkPhoto->update([
            'path' => $photo->store('artwork-photos'),
        ]);

        return $this->noContent('Artwork photo replaced successfully');
    }
}

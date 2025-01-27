<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\UploadArtworkPhotosRequest;
use App\Http\Resources\V1\ArtworkPhotoResource;
use App\Models\Artwork;
use App\Models\ArtworkPhoto;
use Illuminate\Http\Request;

/**
 * @group Artwork Photos
 */
class ArtworkPhotoController extends Controller
{
    /**
     * Upload Artwork Photos
     * 
     * Upload photos to an artwork draft
     * 
     * @authenticated
     * 
     * @urlParam id integer required The id of the artwork
     * 
     * @apiResourceCollection App\Http\Resources\V1\ArtworkPhotoResource
     * 
     * @apiResourceModel App\Models\ArtworkPhoto
     */
    public function uploadArtworkPhotos(UploadArtworkPhotosRequest $request, int $id)
    {
        $authenticatedUser = $request->user();

        $artwork = Artwork::draft()->where('id', $id)->firstOrFail();

        if ($authenticatedUser->cannot('uploadArtworkPhotos', $artwork)) {
            abort(403);
        }

        $photos = $request->input('photos');

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
     * @urlParam id integer required The id of the artwork photo
     * 
     * @apiResource App\Http\Resources\V1\ArtworkPhotoResource
     * 
     * @apiResourceModel App\Models\ArtworkPhoto
     */
    public function setArtworkPhotoAsMain(Request $request, int $id)
    {
        $authenticatedUser = $request->user();

        $artworkPhoto = ArtworkPhoto::where('id', $id)->firstOrFail();

        $artwork = $artworkPhoto->artwork;

        if ($authenticatedUser->cannot('setArtworkPhotoAsMain', $artwork)) {
            abort(403);
        }

        $artworkPhotoAlreadyMain = $artwork->artworkPhotos()->where('is_main', true)->first();

        if ($artworkPhotoAlreadyMain) {
            $artworkPhotoAlreadyMain->is_main = false;
            $artworkPhotoAlreadyMain->save();
        }

        $artworkPhoto->is_main = true;
        $artworkPhoto->save();

        return new ArtworkPhotoResource($artworkPhoto);
    }

    /**
     * Delete Artwork Photo
     * 
     * Delete an artwork photo
     * 
     * @authenticated
     * 
     * @urlParam id integer required The id of the artwork photo
     * 
     * @response {
     *    "message": "Artwork photo deleted successfully"
     * }
     */
    public function deleteArtworkPhoto(Request $request, int $id)
    {
        $authenticatedUser = $request->user();

        $artworkPhoto = ArtworkPhoto::findOrFail($id);

        $artwork = $artworkPhoto->artwork;

        $isArtworkDraft = $artwork->status === 'draft';

        if (!$isArtworkDraft) {
            abort(400, 'Cannot delete photos of published artworks');
        }

        $artworkPhotosCount = $artwork->artworkPhotos()->count();

        if ($artworkPhotosCount === 1) {
            abort(400, 'Cannot delete the only photo of the artwork');
        }

        if ($authenticatedUser->cannot('deleteArtworkPhoto', $artwork)) {
            abort(403);
        }

        $artworkPhoto->delete();

        return response()->json([
            'message' => 'Artwork photo deleted successfully',
        ]);
    }
}

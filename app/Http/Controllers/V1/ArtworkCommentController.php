<?php

namespace App\Http\Controllers\V1;

use App\Http\Requests\V1\CreateArtworkCommentRequest;
use App\Http\Requests\V1\UpdateArtworkCommentRequest;
use App\Http\Resources\V1\ArtworkCommentResource;
use App\Models\Artwork;
use App\Models\ArtworkComment;
use App\Notifications\ArtworkCommentNotification;
use Illuminate\Http\Request;

/**
 * @group Artwork Comments
 */
class ArtworkCommentController extends ApiController
{
    /**
     * Post Artwork Comment
     * 
     * Post a comment on an artwork
     * 
     * @authenticated
     * 
     * @urlParam artworkId integer required The ID of the artwork to comment on
     * 
     * @bodyParam comment_text string required The text of the comment
     * 
     * @apiResource scenario=Success App\Http\Resources\V1\ArtworkCommentResource
     * 
     * @apiResourceModel App\Models\ArtworkComment
     * 
     * @response 401 scenario=Unauthenticated {
     *     "message": "Unauthenticated"
     * }
     * 
     * @response 404 scenario="Artwork not found" {
     *     "message": "The artwork you are trying to comment on does not exist.",
     *     "status": 404
     * }
     * 
     * @response 403 scenario=Unauthorized {
     *     "message": "You are not authorized to post a comment on this artwork.",
     *     "status": 403
     * }
     */
    public function postArtworkComment(CreateArtworkCommentRequest $request, int $artworkId)
    {
        $authenticatedUser = $request->user();

        $artwork = Artwork::find($artworkId);

        if (!$artwork) {
            return $this->error("The artwork you are trying to comment on does not exist.", 404);
        }

        if ($authenticatedUser->cannot('postArtworkComment', $artwork)) {
            return $this->error("You are not authorized to post a comment on this artwork.", 403);
        }

        $artworkComment = ArtworkComment::create([
            'user_id' => $authenticatedUser->id,
            'artwork_id' => $artwork->id,
            'comment_text' => $request->comment_text,
        ]);

        $artwork->user->notify(new ArtworkCommentNotification($authenticatedUser, $artwork, $artworkComment));

        return new ArtworkCommentResource($artworkComment);
    }

    /**
     * Update Artwork Comment
     * 
     * Update a comment on an artwork
     * 
     * @authenticated
     * 
     * @urlParam artworkCommentId integer required The ID of the comment to update
     * 
     * @bodyParam comment_text string required The text of the comment
     * 
     * @apiResource scenario=Success App\Http\Resources\V1\ArtworkCommentResource
     * 
     * @apiResourceModel App\Models\ArtworkComment
     * 
     * @response 403 scenario=Unauthorized {
     *      "message": "You are not authorized to update this comment.",
     *      "status": 403
     * }
     * 
     * @response 401 scenario=Unauthenticated {
     *      "message": "Unauthenticated"
     * }
     * 
     * @response 404 scenario="Comment not found" {
     *    "message": "The comment you are trying to update on does not exist.",
     *    "status": 404
     * }
     */
    public function updateArtworkComment(UpdateArtworkCommentRequest $request, int $artworkCommentId)
    {
        $authenticatedUser = $request->user();

        $artworkComment = ArtworkComment::find($artworkCommentId);

        if (!$artworkComment) {
            return $this->error("The comment you are trying to update on does not exist.", 404);
        }

        if ($authenticatedUser->cannot('updateArtworkComment', $artworkComment)) {
            return $this->error("You are not authorized to update this comment.", 403);
        }

        $artworkComment->update([
            'comment_text' => $request->comment_text,
        ]);

        return new ArtworkCommentResource($artworkComment);
    }

    /**
     * Delete Artwork Comment
     * 
     * Delete a comment on an artwork
     * 
     * @authenticated
     * 
     * @urlParam artworkCommentId integer required The ID of the comment to delete
     * 
     * @response 200 scenario=Success {
     *     'message': 'You have successfully deleted the comment.',
     *     'data': null,
     *     'status': 200,
     * }
     * 
     * @response 401 scenario=Unauthenticated {
     *    "message": "Unauthenticated"
     * }
     * 
     * @response 403 scenario=Unauthorized {
     *     "message": "You are not authorized to delete this comment.",
     *     "status": 403
     * }
     * 
     * @response 404 scenario="Comment not found" {
     *    "message": "The comment you are trying to delete does not exist.",
     *    "status": 404
     * }
     */
    public function deleteArtworkComment(Request $request, int $artworkCommentId)
    {
        $authenticatedUser = $request->user();

        $artworkComment = ArtworkComment::find($artworkCommentId);

        if (!$artworkComment) {
            return $this->error("The comment you are trying to delete does not exist.", 404);
        }

        if ($authenticatedUser->cannot('deleteArtworkComment', $artworkComment)) {
            return $this->error("You are not authorized to delete this comment.", 403);
        }

        $artworkComment->delete();

        return $this->success('You have successfully deleted this comment.');
    }
}

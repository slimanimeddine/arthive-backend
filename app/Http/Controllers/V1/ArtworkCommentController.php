<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
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
class ArtworkCommentController extends Controller
{
    /**
     * Post Artwork Comment
     * 
     * Post a comment on an artwork
     * 
     * @authenticated
     * 
     * @urlParam id integer required The ID of the artwork to comment on
     * 
     * @bodyParam comment_text string required The text of the comment
     * 
     * @apiResource App\Http\Resources\V1\ArtworkCommentResource
     * 
     * @apiResourceModel App\Models\ArtworkComment
     */
    public function postArtworkComment(CreateArtworkCommentRequest $request, int $id)
    {
        $user = $request->user();

        $artwork = Artwork::findOrFail($id);

        $artworkComment = ArtworkComment::create([
            'user_id' => $user->id,
            'artwork_id' => $artwork->id,
            'comment_text' => $request->comment_text,
        ]);

        $artwork->user->notify(new ArtworkCommentNotification($user, $artwork));

        return new ArtworkCommentResource($artworkComment);
    }

    /**
     * Update Artwork Comment
     * 
     * Update a comment on an artwork
     * 
     * @authenticated
     * 
     * @urlParam id integer required The ID of the comment to update
     * 
     * @bodyParam comment_text string required The text of the comment
     * 
     * @apiResource App\Http\Resources\V1\ArtworkCommentResource
     * 
     * @apiResourceModel App\Models\ArtworkComment
     */
    public function updateArtworkComment(UpdateArtworkCommentRequest $request, int $id)
    {
        $authenticatedUser = $request->user();

        $artworkComment = ArtworkComment::findOrFail($id);

        if ($authenticatedUser->cannot('updateArtworkComment', $artworkComment)) {
            abort(403);
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
     * @urlParam id integer required The ID of the comment to delete
     * 
     * @response {
     *     'message' => 'You have successfully deleted the comment.'
     * }
     */
    public function deleteArtworkComment(Request $request, int $id)
    {
        $authenticatedUser = $request->user();

        $artworkComment = ArtworkComment::findOrFail($id);

        if ($authenticatedUser->cannot('deleteArtworkComment', $artworkComment)) {
            abort(403);
        }

        $artworkComment->delete();

        return response()->json(['message' => 'You have successfully deleted the comment.']);
    }
}

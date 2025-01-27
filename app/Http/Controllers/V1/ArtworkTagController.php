<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\TagResource;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * @group Artwork Tags
 */
class ArtworkTagController extends Controller
{
    /**
     * List User Artwork Tags
     * 
     * Retrieve a list of tags used by a user's published artworks
     * 
     * @urlParam username string required The username of the user
     * 
     * @response {
     *   "data": [
     *          {
     *              "id": 1,
     *              "name": "abstract"
     *          },
     *          {
     *              "id": 5,
     *              "name": "portrait"
     *          }
     *   ]
     * }
     */
    public function listUserArtworkTags(Request $request, string $username)
    {
        $user = User::artists()->where('username', $username)->firstOrFail();

        $tags = $user->artworks()
            ->published()
            ->join('artwork_tag', 'artworks.id', '=', 'artwork_tag.artwork_id')
            ->join('tags', 'artwork_tag.tag_id', '=', 'tags.id')
            ->select('tags.id', 'tags.name')
            ->distinct()
            ->get();

        return response()->json([
            'data' => $tags,
        ]);
    }

    /**
     * List Tags
     * 
     * Retrieve a list of all tags
     * 
     * @apiResourceCollection App\Http\Resources\V1\TagResource
     * 
     * @apiResourceModel App\Models\Tag
     */
    public function listTags()
    {
        $query = Tag::all();

        return TagResource::collection($query);
    }
}

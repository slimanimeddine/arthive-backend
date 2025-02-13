<?php

namespace App\Http\Controllers\V1;

use App\Http\Resources\V1\TagResource;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

/**
 * @group Artwork Tags
 */
class ArtworkTagController extends ApiController
{
    /**
     * List User Artwork Tags
     * 
     * Retrieve a list of tags used by a user's published artworks
     * 
     * @urlParam username string required The username of the user
     * 
     * @response 200 scenario=Success {
     *      "data": [
     *          {
     *              "id": 1,
     *              "name": "abstract"
     *          },
     *          {
     *              "id": 5,
     *              "name": "portrait"
     *          }
     *      ],
     *      "message": "",
     *      "status": 200
     * }
     * 
     * @response 404 scenario="User not found" {
     *      "message": "The user you are trying to retrieve his artwork tags does not exist.",
     *      "status": 404
     * }
     */
    public function listUserArtworkTags(Request $request, string $username)
    {
        $user = User::artist()->where('username', $username)->firstOr(function () {
            return $this->error("The user you are trying to retrieve his artwork tags does not exist.", 404);
        });

        $tags = $user->artworks()
            ->published()
            ->join('artwork_tag', 'artworks.id', '=', 'artwork_tag.artwork_id')
            ->join('tags', 'artwork_tag.tag_id', '=', 'tags.id')
            ->select('tags.id', 'tags.name')
            ->distinct()
            ->get();

        return $this->success('', $tags);
    }

    /**
     * List Tags
     * 
     * Retrieve a list of all tags
     * 
     * @apiResourceCollection scenario=Success App\Http\Resources\V1\TagResource
     * 
     * @apiResourceModel App\Models\Tag
     */
    public function listTags()
    {
        $query = Cache::rememberForever('tags', function () {
            return Tag::all();
        });

        return TagResource::collection($query);
    }
}

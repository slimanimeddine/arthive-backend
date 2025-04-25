<?php

namespace App\Http\Controllers\V1;

use App\Http\Resources\V1\TagResource;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

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
     *              "id": "01jsn7h28c20dfrbybdt530p1d",
     *              "name": "abstract"
     *          },
     *          {
     *              "id": "01jsn7h28c20dfrbybdt530p1d",
     *              "name": "portrait"
     *          }
     *      ],
     *      "message": "",
     *      "status": 200
     * }
     * @response 404 scenario="User not found" {
     *      "message": "The user you are trying to retrieve his artwork tags does not exist.",
     *      "status": 404
     * }
     */
    public function listUserArtworkTags(Request $request, string $username)
    {
        $user = User::artist()->where('username', $username)->first();

        if (! $user) {
            return $this->notFound('The user you are trying to retrieve his artwork tags does not exist.');
        }

        $artworksCount = $user->artworks()->count();

        if ($artworksCount === 0) {
            return $this->success('', []);
        }

        $tags = DB::table('tags')
            ->join('artwork_tags', 'tags.id', '=', 'artwork_tags.tag_id')
            ->join('artworks', 'artwork_tags.artwork_id', '=', 'artworks.id')
            ->where('artworks.user_id', $user->id)
            ->where('artworks.status', 'published')
            ->select('tags.name as tag_name')
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
        $tags = Cache::rememberForever('tags', function () {
            return Tag::all();
        });

        return TagResource::collection($tags);
    }
}

<?php

namespace App\Http\Controllers\V1;

use App\Http\Requests\V1\UpdateUserRequest;
use App\Http\Resources\V1\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedSort;
use Spatie\QueryBuilder\QueryBuilder;
use App\Sorts\Users\NewSort;
use App\Sorts\Users\PopularSort;
use Illuminate\Support\Facades\Storage;

/**
 * @group Users
 */
class UserController extends ApiController
{
    /**
     * List Users
     * 
     * Retrieve a list of all users
     * 
     * @queryParam filter[country] string Filter artworks by country. Example: finland
     * 
     * @queryParam filter[tag] string Filter artworks by tag. Enum: painting, graphic, sculpture, folk art, textile, ceramics, stained glass windows, beads, paper, glass, dolls, jewellery, fresco, metal, mosaic. Example: ceramics
     * 
     * @queryParam filter[verified] integer Filter artists by verification status. Enum: 1, 0. Example: 1
     * 
     * @queryParam searchQuery string Search for users by username, first name, or last name. Example: lorem
     * 
     * @queryParam sort string Sort artworks by new, or popular. Example: new
     * 
     * @queryParam include string Include related artworks. Enum: artworks. Example: artworks
     * 
     * @queryParam page string The page number to fetch. Example: 1
     * 
     * @queryParam perPage string The number of records to retrieve per page. Example: 10
     * 
     * @apiResourceCollection scenario=Success App\Http\Resources\V1\UserResource
     * 
     * @apiResourceModel App\Models\User with=artworks paginate=10
     */
    public function listUsers(Request $request)
    {
        $perPage = $request->query('perPage', 10);

        $searchQuery = $request->query('searchQuery');

        $searchIds = isset($searchQuery) ? User::search($searchQuery)->get()->pluck('id')->toArray() : [];

        $query = QueryBuilder::for(User::artist())
            ->allowedFilters([
                AllowedFilter::exact('country'),
                AllowedFilter::exact('tag', 'artworks.tags.name'),
                AllowedFilter::scope('verified'),
            ])
            ->allowedSorts([
                AllowedSort::custom('new', new NewSort()),
                AllowedSort::custom('popular', new PopularSort()),
            ])
            ->allowedIncludes(['artworks'])
            ->tap(function ($query) use ($searchIds) {
                return empty($searchIds) ? $query :  $query->whereIn('users.id', $searchIds);
            })
            ->paginate($perPage);

        return UserResource::collection($query);
    }

    /**
     * Show User
     * 
     * Retrieve a single user by username
     * 
     * @urlParam username string required The username of the user
     * 
     * @apiResource scenario=Success App\Http\Resources\V1\UserResource
     * 
     * @apiResourceModel App\Models\User
     * 
     * @response 404 scenario="User not found" {
     *     "message": "The user you are trying to retrieve does not exist.",
     *     "status": 404
     * }
     */
    public function showUser(Request $request, string $username)
    {
        $user = User::artist()->where('username', $username)->first();

        if (!$user) {
            return $this->error("The user you are trying to retrieve does not exist.", 404);
        }

        return new UserResource($user);
    }

    /**
     * Show Authenticated User
     * 
     * Retrieve the currently authenticated user
     * 
     * @authenticated
     * 
     * @apiResource scenario=Success App\Http\Resources\V1\UserResource
     * 
     * @apiResourceModel App\Models\User
     * 
     * @response 401 scenario=Unauthenticated {
     *      "message": "Unauthenticated"
     * }
     */
    public function showAuthenticatedUser(Request $request)
    {
        return new UserResource($request->user());
    }

    /**
     * Update Authenticated User
     * 
     * Update the currently authenticated user
     * 
     * @authenticated
     * 
     * @header Content-Type multipart/form-data
     * 
     * @apiResource scenario=Success App\Http\Resources\V1\UserResource
     * 
     * @apiResourceModel App\Models\User
     * 
     * @response 401 scenario=Unauthenticated {
     *      "message": "Unauthenticated"
     * }
     * 
     * @response 403 scenario=Unauthorized {
     *     "message": "You are not authorized to update this user.",
     *     "status": 403
     * }
     * 
     */
    public function updateAuthenticatedUser(UpdateUserRequest $request)
    {
        $authenticatedUser = $request->user();

        if ($authenticatedUser->cannot('updateUser', $authenticatedUser)) {
            return $this->error("You are not authorized to update this user.", 403);
        }

        $authenticatedUser->update($request->safe()->except('photo'));

        if ($request->has('email')) {
            $authenticatedUser->update(['email_verified_at' => null]);
        }

        if ($request->hasFile('photo')) {
            if ($authenticatedUser->photo && Storage::disk('public')->exists($authenticatedUser->photo)) {
                Storage::delete($authenticatedUser->photo);
            }
            $authenticatedUser->update(['photo' => $request->file('photo')->store('users')]);
        }

        return new UserResource($authenticatedUser);
    }
}

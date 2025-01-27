<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\UpdateUserPhotoRequest;
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
class UserController extends Controller
{
    /**
     * List Users
     * 
     * Retrieve a list of all users
     * 
     * @queryParam filter[country] string Filter artworks by country. Example: filter[country]=finland
     * 
     * @queryParam filter[category] string Filter artworks by category. Example: filter[category]=ceramics
     * 
     * @queryParam sort string Sort artworks by new, or popular. Example: sort=new
     * 
     * @queryParam page string The page number to fetch. Example: 1
     * 
     * @apiResourceCollection App\Http\Resources\V1\UserResource
     * 
     * @apiResourceModel App\Models\User with=artworks paginate=10
     */
    public function listUsers(Request $request)
    {
        $query = QueryBuilder::for(User::artists()->with(['artworks']))
            ->allowedFilters([
                AllowedFilter::exact('country'),
                AllowedFilter::exact('category', 'artworks.tags.name'),
            ])
            ->allowedSorts([
                AllowedSort::custom('new', new NewSort()),
                AllowedSort::custom('popular', new PopularSort()),
            ])
            ->paginate(10);

        return UserResource::collection($query);
    }

    /**
     * List Verified Users
     * 
     * Retrieve a list of verified users
     * 
     * @urlParam count integer required The number of records to retrieve
     * 
     * @apiResourceCollection App\Http\Resources\V1\UserResource
     * 
     * @apiResourceModel App\Models\User
     */
    public function listVerifiedUsers(Request $request, int $count)
    {
        $query = User::artists()->verified()
            ->limit($count)
            ->get();

        return UserResource::collection($query);
    }

    /**
     * List Searched Users
     * 
     * Retrieve a list of users that match a search query
     * 
     * @urlParam search string required The search query
     * 
     * @queryParam page string The page number to fetch. Example: 1
     * 
     * @apiResourceCollection App\Http\Resources\V1\UserResource
     * 
     * @apiResourceModel App\Models\User with=artworks paginate=10
     */
    public function listSearchedUsers(Request $request, string $search)
    {
        $query = User::search($search)
            ->artists()
            ->paginate(10);

        return UserResource::collection($query);
    }

    /**
     * Show User
     * 
     * Retrieve a single user by username
     * 
     * @urlParam username string required The username of the user
     * 
     * @apiResource App\Http\Resources\V1\UserResource
     * 
     * @apiResourceModel App\Models\User
     */
    public function showUser(Request $request, string $username)
    {
        $query = User::artists()->where('username', $username)->firstOrFail();

        return new UserResource($query);
    }

    /**
     * Show Authenticated User
     * 
     * Retrieve the currently authenticated user
     * 
     * @authenticated
     * 
     * @apiResource App\Http\Resources\V1\UserResource
     * 
     * @apiResourceModel App\Models\User
     */
    public function showAuthenticatedUser(Request $request)
    {
        return new UserResource($request->user());
    }

    // /**
    //  * List Authenticated User Notifications
    //  * 
    //  * Retrieve a list of all the notifications sent to the currently authenticated user
    //  * 
    //  * @authenticated
    //  * 
    //  * @response {
    //  *      "data" => [
    //  *          "notifications" => [
    //  *              {
    //  * 
    //  *              }
    //  *          ]
    //  *      ]
    //  * }
    //  */
    // public function listAuthenticatedUserNotifications(Request $request)
    // {
    //     $authenticatedUser = $request->user();

    //     $notifications = $authenticatedUser->notifications;

    //     return response()->json([
    //         'data' => [
    //             'notifications' => $notifications
    //         ]
    //     ]);
    // }

    /**
     * Update User
     * 
     * Update the currently authenticated user
     * 
     * @authenticated
     * 
     * @apiResource App\Http\Resources\V1\UserResource
     * 
     * @apiResourceModel App\Models\User
     */
    public function updateUser(UpdateUserRequest $request)
    {
        $authenticatedUser = $request->user();

        if ($authenticatedUser->cannot('updateUser', $authenticatedUser)) {
            abort(403);
        }

        $authenticatedUser->update($request->validated());

        return new UserResource($authenticatedUser);
    }

    /**
     * Update User Photo
     * 
     * Update the profile picture of the currently authenticated user
     * 
     * @authenticated
     * 
     * @apiResource App\Http\Resources\V1\UserResource
     * 
     * @apiResourceModel App\Models\User
     */
    public function updateUserPhoto(UpdateUserPhotoRequest $request)
    {
        $authenticatedUser = $request->user();

        if ($authenticatedUser->cannot('updateUser', $authenticatedUser)) {
            abort(403);
        }

        if ($authenticatedUser->photo && Storage::disk('public')->exists($authenticatedUser->photo)) {
            Storage::delete($authenticatedUser->photo);
        }

        $authenticatedUser->photo = $request->file('photo')->store('users');
        $authenticatedUser->save();

        $authenticatedUser->update($request->validated());

        return new UserResource($authenticatedUser);
    }
}

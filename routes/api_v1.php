<?php

use App\Http\Controllers\V1\ArtworkCommentController;
use App\Http\Controllers\V1\ArtworkController;
use App\Http\Controllers\V1\ArtworkLikeController;
use App\Http\Controllers\V1\AuthController;
use App\Http\Controllers\V1\FollowController;
use App\Http\Controllers\V1\UserController;
use Illuminate\Support\Facades\Route;

// authentication routes
Route::post('sign-in', [AuthController::class, 'signIn']);
Route::post('sign-up', [AuthController::class, 'signUp']);
Route::post('sign-out', [AuthController::class, 'signOut'])->middleware('auth:sanctum');

// artwork routes
Route::get('artworks', [ArtworkController::class, 'listArtworks']);
Route::get('artworks/trending/{artworksCount}', [ArtworkController::class, 'listTrendingArtworks'])->whereNumber('artworksCount');
Route::get('artworks/new/{artworksCount}', [ArtworkController::class, 'listNewArtworks'])->whereNumber('artworksCount');
Route::get('artworks/{artworkId}', [ArtworkController::class, 'showArtwork'])->whereNumber('artworkId');

// user routes
Route::get('users', [UserController::class, 'listUsers']);
Route::get('users/verified/{usersCount}', [UserController::class, 'listVerifiedUsers'])->whereNumber('usersCount');
Route::get('users/{username}', [UserController::class, 'showUser']);
Route::get('users/{username}/received-likes-count-by-tag', [UserController::class, 'listUserReceivedLikesCountByTag']);
Route::get('users/{username}/received-likes-count', [UserController::class, 'showUserReceivedLikesCount']);
Route::get('users/{username}/artwork-tags', [UserController::class, 'listUserArtworkTags']);
Route::get('users/{username}/artworks', [UserController::class, 'listUserArtworks']);
Route::get('users/authenticated', [UserController::class, 'showAuthenticatedUser'])->middleware('auth:sanctum');
Route::get('users/authenticated/artworks', [UserController::class, 'listAuthenticatedUserArtworks'])->middleware('auth:sanctum');
Route::get('users/authenticated/favorite-artworks', [UserController::class, 'listAuthenticatedUserFavoriteArtworks'])->middleware('auth:sanctum');
Route::get('users/authenticated/followers', [UserController::class, 'listAuthenticatedUserFollowers'])->middleware('auth:sanctum');
Route::get('users/authenticated/followers', [UserController::class, 'listAuthenticatedUserFollowing'])->middleware('auth:sanctum');
// Route::get('users/authenticated/notifications', [UserController::class, 'getAuthenticatedUserNotifications'])->middleware('auth:sanctum');

// follow routes
Route::middleware(['throttle:follow'])->group(function () {
    Route::post('follows/{id}', [FollowController::class, 'followUser'])->middleware('auth:sanctum')->whereNumber('id');
    Route::delete('follows/{id}', [FollowController::class, 'unfollowUser'])->middleware('auth:sanctum')->whereNumber('id');
});

// like routes
Route::middleware(['throttle:like'])->group(function () {
    Route::post('artwork-likes/{id}', [ArtworkLikeController::class, 'likeArtwork'])->middleware('auth:sanctum')->whereNumber('id');
    Route::delete('artwork-likes/{id}', [ArtworkLikeController::class, 'unlikeArtwork'])->middleware('auth:sanctum')->whereNumber('id');
});

// comment routes
Route::middleware(['throttle:comment'])->group(function () {
    Route::post('artwork-comments/{id}', [ArtworkCommentController::class, 'postArtworkComment'])->middleware('auth:sanctum')->whereNumber('id');
    Route::delete('artwork-comments/{id}', [ArtworkCommentController::class, 'deleteArtworkComment'])->middleware('auth:sanctum')->whereNumber('id');
});

Route::middleware(['throttle:update-comment'])->group(function () {
    Route::put('artwork-comments/{id}', [ArtworkCommentController::class, 'updateArtworkComment'])->middleware('auth:sanctum')->whereNumber('id');
});

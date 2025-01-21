<?php

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
Route::get('artworks', [ArtworkController::class, 'getAllArtworks']);
Route::get('artworks/trending/{count}', [ArtworkController::class, 'getTrendingArtworks'])->whereNumber('count');
Route::get('artworks/new/{count}', [ArtworkController::class, 'getNewArtworks'])->whereNumber('count');
Route::get('artworks/{id}', [ArtworkController::class, 'getArtwork'])->whereNumber('id');

// user routes
Route::get('users', [UserController::class, 'getAllUsers']);
Route::get('users/verified/{count}', [UserController::class, 'getVerifiedUsers'])->whereNumber('count');
Route::get('users/{username}', [UserController::class, 'getUser']);
Route::get('users/{username}/likes-by-tag', [UserController::class, 'getUserLikesByTag']);
Route::get('users/{username}/artwork-tags', [UserController::class, 'getUserArtworkTags']);
Route::get('users/{username}/artworks', [UserController::class, 'getUserArtworks']);
Route::get('users/authenticated-user', [UserController::class, 'getAuthenticatedUser'])->middleware('auth:sanctum');
Route::get('users/authenticated-user/artworks', [UserController::class, 'getAuthenticatedUserArtworks'])->middleware('auth:sanctum');
Route::get('users/authenticated-user/favorite-artworks', [UserController::class, 'getAuthenticatedUserFavoriteArtworks'])->middleware('auth:sanctum');
Route::get('users/authenticated-user/followers', [UserController::class, 'getAuthenticatedUserFollowers'])->middleware('auth:sanctum');
Route::get('users/authenticated-user/followers', [UserController::class, 'getAuthenticatedUserFollowing'])->middleware('auth:sanctum');
// Route::get('users/authenticated-user/notifications', [UserController::class, 'getAuthenticatedUserNotifications'])->middleware('auth:sanctum');

// follow routes
Route::middleware(['throttle:follow'])->group(function () {
    Route::post('follow-user/{id}', [FollowController::class, 'followUser'])->middleware('auth:sanctum')->whereNumber('id');
    Route::post('unfollow-user/{id}', [FollowController::class, 'unfollowUser'])->middleware('auth:sanctum')->whereNumber('id');
});

// like routes
Route::middleware(['throttle:like'])->group(function () {
    Route::post('like-artwork/{id}', [ArtworkLikeController::class, 'likeArtwork'])->middleware('auth:sanctum')->whereNumber('id');
    Route::post('unlike-artwork/{id}', [ArtworkLikeController::class, 'unlikeArtwork'])->middleware('auth:sanctum')->whereNumber('id');
});

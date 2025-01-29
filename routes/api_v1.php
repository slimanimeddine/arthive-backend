<?php

use App\Http\Controllers\V1\AdminController;
use App\Http\Controllers\V1\ArtworkCommentController;
use App\Http\Controllers\V1\ArtworkController;
use App\Http\Controllers\V1\ArtworkLikeController;
use App\Http\Controllers\V1\ArtworkPhotoController;
use App\Http\Controllers\V1\ArtworkTagController;
use App\Http\Controllers\V1\AuthController;
use App\Http\Controllers\V1\FollowController;
use App\Http\Controllers\V1\NotificationController;
use App\Http\Controllers\V1\UserController;
use Illuminate\Support\Facades\Route;

// authentication routes
Route::post('sign-in', [AuthController::class, 'signIn']);
Route::post('sign-up', [AuthController::class, 'signUp']);
Route::post('sign-out', [AuthController::class, 'signOut'])->middleware('auth:sanctum');

// artwork routes
Route::get('artworks/published', [ArtworkController::class, 'listPublishedArtworks']);
Route::get('artworks/published/search/{search}', [ArtworkController::class, 'listSearchedPublishedArtworks'])->whereAlpha('search');
Route::get('artworks/published/trending/{count}', [ArtworkController::class, 'listTrendingPublishedArtworks'])->whereNumber('count');
Route::get('artworks/published/new/{count}', [ArtworkController::class, 'listNewPublishedArtworks'])->whereNumber('count');
Route::get('artworks/published/{id}', [ArtworkController::class, 'showPublishedArtwork'])->whereNumber('id');
Route::get('users/{username}/artworks/published', [ArtworkController::class, 'listUserPublishedArtworks']);
Route::get('authenticated/artworks/published/', [ArtworkController::class, 'listAuthenticatedUserArtworks'])->middleware('auth:sanctum');
Route::get('authenticated/artworks/published', [ArtworkController::class, 'listAuthenticatedUserFavoriteArtworks'])->middleware('auth:sanctum');

Route::middleware(['throttle:create-draft'])->group(function () {
    Route::post('artworks/drafts', [ArtworkController::class, 'createArtworkDraft'])->middleware('auth:sanctum');
});

Route::put('artworks/published/{id}', [ArtworkController::class, 'publishArtworkDraft'])->middleware('auth:sanctum')->whereNumber('id');
Route::put('artworks/drafts/{id}', [ArtworkController::class, 'updateArtworkDraft'])->middleware('auth:sanctum')->whereNumber('id');
Route::delete('artworks/drafts/{id}', [ArtworkController::class, 'deleteArtworkDraft'])->middleware('auth:sanctum')->whereNumber('id');

// user routes
Route::get('users', [UserController::class, 'listUsers']);
Route::get('users/verified/{count}', [UserController::class, 'listVerifiedUsers'])->whereNumber('count');
Route::get('users/search/{search}', [UserController::class, 'listSearchedUsers'])->whereAlpha('search');
Route::get('users/{username}', [UserController::class, 'showUser']);
Route::get('authenticated', [UserController::class, 'showAuthenticatedUser'])->middleware('auth:sanctum');
Route::put('authenticated', [UserController::class, 'updateUser'])->middleware('auth:sanctum');
Route::put('authenticated/photo', [UserController::class, 'updateUserPhoto'])->middleware('auth:sanctum');

// follow routes
Route::get('authenticated/follows/followers', [FollowController::class, 'listAuthenticatedUserFollowers'])->middleware('auth:sanctum');
Route::get('authenticated/follows/followers', [FollowController::class, 'listAuthenticatedUserFollowing'])->middleware('auth:sanctum');
Route::middleware(['throttle:follow'])->group(function () {
    Route::post('follows/{id}', [FollowController::class, 'followUser'])->middleware('auth:sanctum')->whereNumber('id');
    Route::delete('follows/{id}', [FollowController::class, 'unfollowUser'])->middleware('auth:sanctum')->whereNumber('id');
});

// like routes
Route::get('users/{username}/artwork-likes/received/count/by-tag', [ArtworkLikeController::class, 'listUserReceivedLikesCountByTag']);
Route::get('users/{username}/artwork-likes/received/count', [ArtworkLikeController::class, 'showUserReceivedLikesCount']);
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

// tags routes
Route::get('users/{username}/artwork-tags', [ArtworkTagController::class, 'listUserArtworkTags']);
Route::get('tags', [ArtworkTagController::class, 'listTags']);

// photos routes
Route::middleware(['throttle:update-comment'])->group(function () {
    Route::post('artworks/drafts/{id}/artwork-photos', [ArtworkPhotoController::class, 'uploadArtworkPhotos'])->middleware('auth:sanctum')->whereNumber('id');
});
Route::put('artwork-photos/{id}', [ArtworkPhotoController::class, 'setArtworkPhotoAsMain'])->middleware('auth:sanctum')->whereNumber('id');
Route::delete('artwork-photos/{id}', [ArtworkPhotoController::class, 'deleteArtworkPhoto'])->middleware('auth:sanctum')->whereNumber('id');

// notifications routes
Route::get('authenticated/notifications', [NotificationController::class, 'listAuthenticatedUserNotifications'])->middleware('auth:sanctum');
Route::put('authenticated/notifications/unread/{id}', [NotificationController::class, 'markNotificationAsRead'])->middleware('auth:sanctum')->whereNumber('id');
Route::put('authenticated/notifications/unread', [NotificationController::class, 'markAllNotificationsAsRead'])->middleware('auth:sanctum')->whereNumber('id');

// admin routes
Route::post('admin/sign-in', [AdminController::class, 'adminSignIn']);
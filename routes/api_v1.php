<?php

use App\Http\Controllers\V1\AdminController;
use App\Http\Controllers\V1\ArtistVerificationRequestController;
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
Route::get('artworks/published/search/{searchQuery}', [ArtworkController::class, 'listSearchedPublishedArtworks'])->whereAlpha('searchQuery');
Route::get('artworks/published/trending/{count}', [ArtworkController::class, 'listTrendingPublishedArtworks'])->whereNumber('count');
Route::get('artworks/published/new/{count}', [ArtworkController::class, 'listNewPublishedArtworks'])->whereNumber('count');
Route::get('artworks/published/{artworkId}', [ArtworkController::class, 'showPublishedArtwork'])->whereNumber('artworkId');
Route::get('users/{username}/artworks/published', [ArtworkController::class, 'listUserPublishedArtworks']);
Route::get('authenticated/artworks/published/', [ArtworkController::class, 'listAuthenticatedUserArtworks'])->middleware('auth:sanctum');
Route::get('authenticated/artworks/published', [ArtworkController::class, 'listAuthenticatedUserFavoriteArtworks'])->middleware('auth:sanctum');

Route::middleware(['throttle:create-draft'])->group(function () {
    Route::post('artworks/drafts', [ArtworkController::class, 'createArtworkDraft'])->middleware('auth:sanctum');
});

Route::put('artworks/published/{artworkId}', [ArtworkController::class, 'publishArtworkDraft'])->middleware('auth:sanctum')->whereNumber('artworkId');
Route::put('artworks/drafts/{artworkId}', [ArtworkController::class, 'updateArtworkDraft'])->middleware('auth:sanctum')->whereNumber('artworkId');
Route::delete('artworks/drafts/{artworkId}', [ArtworkController::class, 'deleteArtworkDraft'])->middleware('auth:sanctum')->whereNumber('artworkId');

// user routes
Route::get('users', [UserController::class, 'listUsers']);
Route::get('users/verified/{count}', [UserController::class, 'listVerifiedUsers'])->whereNumber('count');
Route::get('users/search/{searchQuery}', [UserController::class, 'listSearchedUsers'])->whereAlpha('searchQuery');
Route::get('users/{username}', [UserController::class, 'showUser']);
Route::get('authenticated', [UserController::class, 'showAuthenticatedUser'])->middleware('auth:sanctum');
Route::put('authenticated', [UserController::class, 'updateUser'])->middleware('auth:sanctum');
Route::put('authenticated/photo', [UserController::class, 'updateUserPhoto'])->middleware('auth:sanctum');

// follow routes
Route::get('authenticated/follows/followers', [FollowController::class, 'listAuthenticatedUserFollowers'])->middleware('auth:sanctum');
Route::get('authenticated/follows/following', [FollowController::class, 'listAuthenticatedUserFollowing'])->middleware('auth:sanctum');
Route::middleware(['throttle:follow'])->group(function () {
    Route::post('follows/{userId}', [FollowController::class, 'followUser'])->middleware('auth:sanctum')->whereNumber('userId');
    Route::delete('follows/{userId}', [FollowController::class, 'unfollowUser'])->middleware('auth:sanctum')->whereNumber('userId');
});

// like routes
Route::get('users/{username}/artwork-likes/received/count/by-tag', [ArtworkLikeController::class, 'listUserReceivedLikesCountByTag']);
Route::get('users/{username}/artwork-likes/received/count', [ArtworkLikeController::class, 'showUserReceivedLikesCount']);
Route::middleware(['throttle:like'])->group(function () {
    Route::post('artwork-likes/{artworkId}', [ArtworkLikeController::class, 'likeArtwork'])->middleware('auth:sanctum')->whereNumber('artworkId');
    Route::delete('artwork-likes/{artworkId}', [ArtworkLikeController::class, 'unlikeArtwork'])->middleware('auth:sanctum')->whereNumber('artworkId');
});

// comment routes
Route::middleware(['throttle:comment'])->group(function () {
    Route::post('artwork-comments/{artworkId}', [ArtworkCommentController::class, 'postArtworkComment'])->middleware('auth:sanctum')->whereNumber('artworkId');
    Route::delete('artwork-comments/{commentId}', [ArtworkCommentController::class, 'deleteArtworkComment'])->middleware('auth:sanctum')->whereNumber('commentId');
});
Route::middleware(['throttle:update-comment'])->group(function () {
    Route::put('artwork-comments/{commentId}', [ArtworkCommentController::class, 'updateArtworkComment'])->middleware('auth:sanctum')->whereNumber('commentId');
});

// tags routes
Route::get('users/{username}/artwork-tags', [ArtworkTagController::class, 'listUserArtworkTags']);
Route::get('tags', [ArtworkTagController::class, 'listTags']);

// photos routes
Route::middleware(['throttle:update-comment'])->group(function () {
    Route::post('artworks/drafts/{artworkId}/artwork-photos', [ArtworkPhotoController::class, 'uploadArtworkPhotos'])->middleware('auth:sanctum')->whereNumber('artworkId');
});
Route::put('artwork-photos/{photoId}', [ArtworkPhotoController::class, 'setArtworkPhotoAsMain'])->middleware('auth:sanctum')->whereNumber('photoId');
Route::delete('artwork-photos/{photoId}', [ArtworkPhotoController::class, 'deleteArtworkPhoto'])->middleware('auth:sanctum')->whereNumber('photoId');

// notifications routes
Route::get('authenticated/notifications', [NotificationController::class, 'listAuthenticatedUserNotifications'])->middleware('auth:sanctum');
Route::put('authenticated/notifications/unread/{notificationId}', [NotificationController::class, 'markNotificationAsRead'])->middleware('auth:sanctum')->whereNumber('notificationId');
Route::put('authenticated/notifications/unread', [NotificationController::class, 'markAllNotificationsAsRead'])->middleware('auth:sanctum');

// admin routes
Route::post('admin/sign-in', [AdminController::class, 'adminSignIn']);

// artist verification request routes
Route::post('authenticated/artist-verification-requests', [ArtistVerificationRequestController::class, 'submitArtistVerificationRequest'])->middleware('auth:sanctum');

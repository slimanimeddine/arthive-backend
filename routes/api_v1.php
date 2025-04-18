<?php

use App\Http\Controllers\V1\ArtistVerificationRequestController;
use App\Http\Controllers\V1\ArtworkCommentController;
use App\Http\Controllers\V1\ArtworkController;
use App\Http\Controllers\V1\ArtworkLikeController;
use App\Http\Controllers\V1\ArtworkPhotoController;
use App\Http\Controllers\V1\ArtworkTagController;
use App\Http\Controllers\V1\AuthController;
use App\Http\Controllers\V1\CountryController;
use App\Http\Controllers\V1\FavoriteController;
use App\Http\Controllers\V1\FollowController;
use App\Http\Controllers\V1\NotificationController;
use App\Http\Controllers\V1\UserController;
use Illuminate\Support\Facades\Route;

// authentication routes
Route::post('sign-up', [AuthController::class, 'signUp']);
Route::post('sign-in', [AuthController::class, 'signIn']);
Route::post('sign-out', [AuthController::class, 'signOut'])->middleware('auth:sanctum');
Route::post('change-password', [AuthController::class, 'changePassword'])->middleware('auth:sanctum');

Route::middleware(['throttle:email-verification-code'])->group(function () {
    Route::post('email-verification/send', [AuthController::class, 'sendEmailVerificationCode'])->middleware('auth:sanctum');
});

Route::post('email-verification/verify', [AuthController::class, 'verifyEmailCode'])->middleware('auth:sanctum');

// artwork routes
Route::get('artworks', [ArtworkController::class, 'listPublishedArtworks']);
Route::get('artworks/{artworkId}', [ArtworkController::class, 'showPublishedArtwork'])->whereNumber('artworkId');
Route::get('users/me/artworks', [ArtworkController::class, 'listAuthenticatedUserArtworks'])->middleware('auth:sanctum');
Route::get('users/me/artworks/{artworkId}', [ArtworkController::class, 'showAuthenticatedUserArtwork'])->middleware('auth:sanctum')->whereNumber('artworkId');
Route::get('users/{username}/artworks', [ArtworkController::class, 'listUserPublishedArtworks']);

Route::middleware(['throttle:create-artwork'])->group(function () {
    Route::post('artworks', [ArtworkController::class, 'createArtwork'])->middleware('auth:sanctum');
});

Route::put('artworks/{artworkId}', [ArtworkController::class, 'updateArtwork'])->middleware('auth:sanctum')->whereNumber('artworkId');
Route::put('artworks/{artworkId}/publish', [ArtworkController::class, 'publishArtwork'])->middleware('auth:sanctum')->whereNumber('artworkId');
Route::delete('artworks/{artworkId}', [ArtworkController::class, 'deleteArtwork'])->middleware('auth:sanctum')->whereNumber('artworkId');

// user routes
Route::get('users', [UserController::class, 'listUsers']);
Route::get('users/{userId}', [UserController::class, 'showUserById'])->whereNumber('userId');
Route::get('users/me', [UserController::class, 'showAuthenticatedUser'])->middleware('auth:sanctum');
Route::get('users/{username}', [UserController::class, 'showUser']);
Route::post('users/me', [UserController::class, 'updateAuthenticatedUser'])->middleware('auth:sanctum');

// follow routes
Route::get('users/me/follows/followers', [FollowController::class, 'listAuthenticatedUserFollowers'])->middleware('auth:sanctum');
Route::get('users/me/follows/following', [FollowController::class, 'listAuthenticatedUserFollowing'])->middleware('auth:sanctum');
Route::middleware(['throttle:follow'])->group(function () {
    Route::post('follows/users/{userId}', [FollowController::class, 'followUser'])->middleware('auth:sanctum')->whereNumber('userId');
    Route::delete('follows/users/{userId}', [FollowController::class, 'unfollowUser'])->middleware('auth:sanctum')->whereNumber('userId');
});
Route::get('users/{userId}/is-following', [FollowController::class, 'isAuthenticatedUserFollowing'])->middleware('auth:sanctum')->whereNumber('userId');

// like routes
Route::get('users/{username}/artwork-likes/received/count/by-tag', [ArtworkLikeController::class, 'listUserReceivedLikesCountByTag']);
Route::get('users/{username}/artwork-likes/received/count', [ArtworkLikeController::class, 'showUserReceivedLikesCount']);
Route::middleware(['throttle:like'])->group(function () {
    Route::post('artworks/{artworkId}/artwork-likes', [ArtworkLikeController::class, 'likeArtwork'])->middleware('auth:sanctum')->whereNumber('artworkId');
    Route::delete('artworks/{artworkId}/artwork-likes', [ArtworkLikeController::class, 'unlikeArtwork'])->middleware('auth:sanctum')->whereNumber('artworkId');
});
Route::get('artworks/{artworkId}/is-liking', [ArtworkLikeController::class, 'isAuthenticatedUserLiking'])->middleware('auth:sanctum')->whereNumber('artworkId');

// comment routes
Route::middleware(['throttle:comment'])->group(function () {
    Route::post('artworks/{artworkId}/artwork-comments', [ArtworkCommentController::class, 'postArtworkComment'])->middleware('auth:sanctum')->whereNumber('artworkId');
    Route::delete('artwork-comments/{artworkCommentId}', [ArtworkCommentController::class, 'deleteArtworkComment'])->middleware('auth:sanctum')->whereNumber('artworkCommentId');
});
Route::middleware(['throttle:update-comment'])->group(function () {
    Route::put('artwork-comments/{artworkCommentId}', [ArtworkCommentController::class, 'updateArtworkComment'])->middleware('auth:sanctum')->whereNumber('artworkCommentId');
});

// tags routes
Route::get('users/{username}/artwork-tags', [ArtworkTagController::class, 'listUserArtworkTags']);
Route::get('tags', [ArtworkTagController::class, 'listTags']);

// photos routes
Route::middleware(['throttle:upload-photos'])->group(function () {
    Route::post('artworks/{artworkId}/artwork-photos', [ArtworkPhotoController::class, 'uploadArtworkPhotos'])->middleware('auth:sanctum')->whereNumber('artworkId');
});
Route::put('artwork-photos/{artworkPhotoId}', [ArtworkPhotoController::class, 'setArtworkPhotoAsMain'])->middleware('auth:sanctum')->whereNumber('artworkPhotoId');
Route::delete('artwork-photos/{artworkPhotoId}', [ArtworkPhotoController::class, 'deleteArtworkPhoto'])->middleware('auth:sanctum')->whereNumber('artworkPhotoId');
Route::put('artwork-photos/{artworkPhotoId}/path', [ArtworkPhotoController::class, 'replaceArtworkPhotoPath'])->middleware('auth:sanctum')->whereNumber('artworkPhotoId');

// notifications routes
Route::get('users/me/notifications', [NotificationController::class, 'listAuthenticatedUserNotifications'])->middleware('auth:sanctum');
Route::put('users/me/notifications/unread/{notificationId}', [NotificationController::class, 'markNotificationAsRead'])->middleware('auth:sanctum')->whereUuid('notificationId');
Route::put('users/me/notifications/unread', [NotificationController::class, 'markAllNotificationsAsRead'])->middleware('auth:sanctum');
Route::get('users/me/notifications/unread/exists', [NotificationController::class, 'unreadNotificationsExists'])->middleware('auth:sanctum');

// admin routes
Route::post('admin/sign-in', [AuthController::class, 'adminSignIn']);

// artist verification request routes
Route::get('artist-verification-requests', [ArtistVerificationRequestController::class, 'listArtistVerificationRequests']);
Route::post('users/me/artist-verification-requests', [ArtistVerificationRequestController::class, 'submitArtistVerificationRequest'])->middleware('auth:sanctum');
Route::put('artist-verification-requests/{artistVerificationRequestId}', [ArtistVerificationRequestController::class, 'reviewArtistVerificationRequest'])->middleware('auth:sanctum')->whereNumber('artistVerificationRequestId');

// favorite routes
Route::get('users/me/favorites/artworks', [FavoriteController::class, 'listAuthenticatedUserFavoriteArtworks'])->middleware('auth:sanctum');
Route::middleware(['throttle:favorite'])->group(function () {
    Route::post('artworks/{artworkId}/favorites', [FavoriteController::class, 'markArtworkAsFavorite'])->middleware('auth:sanctum')->whereNumber('artworkId');
});
Route::delete('artworks/{artworkId}/favorites', [FavoriteController::class, 'removeArtworkFromFavorites'])->middleware('auth:sanctum')->whereNumber('artworkId');
Route::get('artworks/{artworkId}/favorites/is-favoriting', [FavoriteController::class, 'isAuthenticatedUserFavoriting'])->middleware('auth:sanctum')->whereNumber('artworkId');

// country routes
Route::get('countries', [CountryController::class, 'index']);

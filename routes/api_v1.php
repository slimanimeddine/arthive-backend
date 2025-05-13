<?php

use App\Http\Controllers\V1\AdminController;
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

Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'verifyEmail'])->middleware(['auth:sanctum']);
Route::post('/email/verification-notification', [AuthController::class, 'resendEmailVerification'])->middleware(['auth:sanctum']);

Route::post('/forgot-password', [AuthController::class, 'sendPasswordResetLink'])->middleware('guest')->name('password.email');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->middleware('guest')->name('password.update');

Route::delete('users/me', [AuthController::class, 'deleteUser'])->middleware('auth:sanctum');

// artwork routes
Route::get('artworks', [ArtworkController::class, 'listPublishedArtworks']);
Route::get('artworks/{artworkId}', [ArtworkController::class, 'showPublishedArtwork'])->whereUlid('artworkId');
Route::get('users/me/artworks', [ArtworkController::class, 'listAuthenticatedUserArtworks'])->middleware('auth:sanctum');
Route::get('users/me/artworks/{artworkId}', [ArtworkController::class, 'showAuthenticatedUserArtwork'])->middleware('auth:sanctum')->whereUlid('artworkId');
Route::get('users/{username}/artworks', [ArtworkController::class, 'listUserPublishedArtworks']);

Route::middleware(['throttle:create-artwork'])->group(function () {
    Route::post('artworks', [ArtworkController::class, 'createArtwork'])->middleware('auth:sanctum');
});

Route::put('artworks/{artworkId}', [ArtworkController::class, 'updateArtwork'])->middleware('auth:sanctum')->whereUlid('artworkId');
Route::put('artworks/{artworkId}/publish', [ArtworkController::class, 'publishArtwork'])->middleware('auth:sanctum')->whereUlid('artworkId');
Route::delete('artworks/{artworkId}', [ArtworkController::class, 'deleteArtwork'])->middleware('auth:sanctum')->whereUlid('artworkId');

// user routes
Route::get('users', [UserController::class, 'listUsers']);
Route::get('users/{userId}', [UserController::class, 'showUserById'])->whereUlid('userId');
Route::get('users/me', [UserController::class, 'showAuthenticatedUser'])->middleware('auth:sanctum');
Route::get('users/{username}', [UserController::class, 'showUser']);
Route::post('users/me', [UserController::class, 'updateAuthenticatedUser'])->middleware('auth:sanctum');

// follow routes
Route::get('users/me/follows/followers', [FollowController::class, 'listAuthenticatedUserFollowers'])->middleware('auth:sanctum');
Route::get('users/me/follows/following', [FollowController::class, 'listAuthenticatedUserFollowing'])->middleware('auth:sanctum');
Route::middleware(['throttle:follow'])->group(function () {
    Route::post('follows/users/{userId}', [FollowController::class, 'followUser'])->middleware('auth:sanctum')->whereUlid('userId');
    Route::delete('follows/users/{userId}', [FollowController::class, 'unfollowUser'])->middleware('auth:sanctum')->whereUlid('userId');
});
Route::get('users/{userId}/is-following', [FollowController::class, 'isAuthenticatedUserFollowing'])->middleware('auth:sanctum')->whereUlid('userId');

// like routes
Route::get('users/{username}/artwork-likes/received/count/by-tag', [ArtworkLikeController::class, 'listUserReceivedLikesCountByTag']);
Route::get('users/{username}/artwork-likes/received/count', [ArtworkLikeController::class, 'showUserReceivedLikesCount']);
Route::middleware(['throttle:like'])->group(function () {
    Route::post('artworks/{artworkId}/artwork-likes', [ArtworkLikeController::class, 'likeArtwork'])->middleware('auth:sanctum')->whereUlid('artworkId');
    Route::delete('artworks/{artworkId}/artwork-likes', [ArtworkLikeController::class, 'unlikeArtwork'])->middleware('auth:sanctum')->whereUlid('artworkId');
});
Route::get('artworks/{artworkId}/is-liking', [ArtworkLikeController::class, 'isAuthenticatedUserLiking'])->middleware('auth:sanctum')->whereUlid('artworkId');

// comment routes
Route::middleware(['throttle:comment'])->group(function () {
    Route::post('artworks/{artworkId}/artwork-comments', [ArtworkCommentController::class, 'postArtworkComment'])->middleware('auth:sanctum')->whereUlid('artworkId');
    Route::delete('artwork-comments/{artworkCommentId}', [ArtworkCommentController::class, 'deleteArtworkComment'])->middleware('auth:sanctum')->whereUlid('artworkCommentId');
});
Route::middleware(['throttle:update-comment'])->group(function () {
    Route::put('artwork-comments/{artworkCommentId}', [ArtworkCommentController::class, 'updateArtworkComment'])->middleware('auth:sanctum')->whereUlid('artworkCommentId');
});

// tags routes
Route::get('users/{username}/artwork-tags', [ArtworkTagController::class, 'listUserArtworkTags']);
Route::get('tags', [ArtworkTagController::class, 'listTags']);

// photos routes
Route::middleware(['throttle:upload-photos'])->group(function () {
    Route::post('artworks/{artworkId}/artwork-photos', [ArtworkPhotoController::class, 'uploadArtworkPhotos'])->middleware('auth:sanctum')->whereUlid('artworkId');
});
Route::put('artwork-photos/{artworkPhotoId}', [ArtworkPhotoController::class, 'setArtworkPhotoAsMain'])->middleware('auth:sanctum')->whereUlid('artworkPhotoId');
Route::delete('artwork-photos/{artworkPhotoId}', [ArtworkPhotoController::class, 'deleteArtworkPhoto'])->middleware('auth:sanctum')->whereUlid('artworkPhotoId');
Route::post('artwork-photos/{artworkPhotoId}/path', [ArtworkPhotoController::class, 'replaceArtworkPhotoPath'])->middleware('auth:sanctum')->whereUlid('artworkPhotoId');

// notifications routes
Route::get('users/me/notifications', [NotificationController::class, 'listAuthenticatedUserNotifications'])->middleware('auth:sanctum');
Route::put('users/me/notifications/unread/{notificationId}', [NotificationController::class, 'markNotificationAsRead'])->middleware('auth:sanctum')->whereUuid('notificationId');
Route::put('users/me/notifications/unread', [NotificationController::class, 'markAllNotificationsAsRead'])->middleware('auth:sanctum');
Route::get('users/me/notifications/unread/exists', [NotificationController::class, 'unreadNotificationsExists'])->middleware('auth:sanctum');

// admin routes
Route::prefix('admin')->group(function () {
    Route::post('sign-in', [AuthController::class, 'adminSignIn']);
    Route::middleware(['auth:sanctum', 'admin'])->group(function () {
        Route::get('artworks', [AdminController::class, 'listArtworks']);
        Route::get('artworks/{artworkId}', [AdminController::class, 'showArtwork'])->whereUlid('artworkId');
        Route::get('artists', [AdminController::class, 'listUsers']);
        Route::get('artists/{artistId}', [AdminController::class, 'showArtist'])->whereUlid('artistId');
        Route::get('artist-verification-requests', [AdminController::class, 'listArtistVerificationRequests']);
        Route::put('artist-verification-requests/{artistVerificationRequestId}', [AdminController::class, 'reviewArtistVerificationRequest'])->whereUlid('artistVerificationRequestId');
    });
});

// artist verification request routes
Route::post('users/me/artist-verification-requests', [ArtistVerificationRequestController::class, 'submitArtistVerificationRequest'])->middleware('auth:sanctum');
Route::get('users/me/artist-verification-requests', [ArtistVerificationRequestController::class, 'getAuthenticatedUserArtistVerificationRequests'])->middleware('auth:sanctum');

// favorite routes
Route::get('users/me/favorites/artworks', [FavoriteController::class, 'listAuthenticatedUserFavoriteArtworks'])->middleware('auth:sanctum');
Route::middleware(['throttle:favorite'])->group(function () {
    Route::post('artworks/{artworkId}/favorites', [FavoriteController::class, 'markArtworkAsFavorite'])->middleware('auth:sanctum')->whereUlid('artworkId');
});
Route::delete('artworks/{artworkId}/favorites', [FavoriteController::class, 'removeArtworkFromFavorites'])->middleware('auth:sanctum')->whereUlid('artworkId');
Route::get('artworks/{artworkId}/favorites/is-favoriting', [FavoriteController::class, 'isAuthenticatedUserFavoriting'])->middleware('auth:sanctum')->whereUlid('artworkId');

// country routes
Route::get('countries', [CountryController::class, 'index']);

<?php

use App\Http\Controllers\V1\ArtworkController;
use App\Http\Controllers\V1\AuthController;
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
Route::get('/users/{username}/likes-by-tag', [UserController::class, 'getUserLikesByTag']);
Route::get('/users/{username}/artwork-tags', [UserController::class, 'getUserArtworkTags']);
Route::get('/users/{username}/artworks', [ArtworkController::class, 'getUserArtworks']);

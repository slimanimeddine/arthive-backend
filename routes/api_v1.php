<?php

use App\Http\Controllers\V1\AuthController;
use Illuminate\Support\Facades\Route;

// authentication routes
Route::post('sign-in', [AuthController::class, 'sign_in']);
Route::post('sign-up', [AuthController::class, 'sign_up']);
Route::post('sign-out', [AuthController::class, 'sign_out'])->middleware('auth:sanctum');
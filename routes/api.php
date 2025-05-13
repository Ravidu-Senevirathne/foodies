<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ReservationController;
use App\Http\Controllers\Api\TestimonialController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Public routes
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    // User routes
    Route::get('/user', [UserController::class, 'getProfile']);
    Route::put('/user', [UserController::class, 'updateProfile']);
    Route::post('/logout', [AuthController::class, 'logout']);

    // Testimonials routes
    Route::apiResource('testimonials', TestimonialController::class);

    // Reservations routes
    Route::apiResource('reservations', ReservationController::class);

    // Admin routes
    Route::middleware('admin')->prefix('admin')->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\Api\AdminController::class, 'dashboard']);
        Route::get('/users', [App\Http\Controllers\Api\AdminController::class, 'users']);
        Route::get('/pending-testimonials', [App\Http\Controllers\Api\AdminController::class, 'pendingTestimonials']);
        Route::get('/pending-reservations', [App\Http\Controllers\Api\AdminController::class, 'pendingReservations']);
    });
});

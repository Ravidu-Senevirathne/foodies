<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    // Main Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Reservations
    Route::get('/dashboard/reservations', [DashboardController::class, 'reservations'])->name('dashboard.reservations');
    Route::get('/dashboard/reservations/create', [DashboardController::class, 'createReservation'])->name('dashboard.reservations.create');
    Route::post('/dashboard/reservations', [DashboardController::class, 'storeReservation'])->name('dashboard.reservations.store');
    Route::get('/dashboard/reservations/{reservation}', [DashboardController::class, 'showReservation'])->name('dashboard.reservations.show');
    Route::get('/dashboard/reservations/{reservation}/edit', [DashboardController::class, 'editReservation'])->name('dashboard.reservations.edit');
    Route::put('/dashboard/reservations/{reservation}', [DashboardController::class, 'updateReservation'])->name('dashboard.reservations.update');
    Route::delete('/dashboard/reservations/{reservation}', [DashboardController::class, 'deleteReservation'])->name('dashboard.reservations.delete');
    Route::patch('/dashboard/reservations/{reservation}/cancel', [DashboardController::class, 'cancelReservation'])->name('dashboard.reservations.cancel');

    // Orders
    Route::get('/dashboard/orders', [DashboardController::class, 'orders'])->name('dashboard.orders');
    Route::get('/dashboard/orders/{order}', [DashboardController::class, 'showOrder'])->name('dashboard.orders.show');
    Route::post('/dashboard/orders/{order}/cancel', [DashboardController::class, 'cancelOrder'])->name('dashboard.orders.cancel');
    Route::post('/dashboard/orders/{order}/reorder', [DashboardController::class, 'reorderOrder'])->name('dashboard.orders.reorder');

    // Menu
    Route::get('/dashboard/menu', [DashboardController::class, 'menu'])->name('dashboard.menu');
    Route::post('/dashboard/cart/add', [DashboardController::class, 'addToCart'])->name('dashboard.cart.add');
    Route::get('/dashboard/cart', [DashboardController::class, 'viewCart'])->name('dashboard.cart');
    Route::post('/dashboard/cart/checkout', [DashboardController::class, 'checkout'])->name('dashboard.cart.checkout');

    // Profile
    Route::get('/dashboard/profile', [DashboardController::class, 'profile'])->name('dashboard.profile');
    Route::put('/dashboard/profile/update', [DashboardController::class, 'updateProfile'])->name('dashboard.profile.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/menu', function () {
    return view('menu');
})->name('menu');

require __DIR__ . '/auth.php';

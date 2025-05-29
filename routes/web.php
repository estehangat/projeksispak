<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminDashboardController;

// Admin auth routes
Route::get('/login', [AuthController::class, 'showLoginForm'])
    ->name('admin.login');
Route::post('/login', [AuthController::class, 'authenticate'])
    ->name('admin.login.authenticate');
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('admin.logout');

// Admin protected routes
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');
    Route::get('/admin/admin', [AdminDashboardController::class, 'admin'])
        ->name('admin.admin');
});
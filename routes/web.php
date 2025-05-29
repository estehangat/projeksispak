<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\PenyakitController;
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
    
    // Admin management routes
    Route::get('/admin/admin', [AdminDashboardController::class, 'admin'])
        ->name('admin.admin');
    Route::post('/admin/admin', [AdminDashboardController::class, 'store'])
        ->name('admin.admin.store');
    Route::put('/admin/admin/{id}', [AdminDashboardController::class, 'update'])
        ->name('admin.admin.update');
    Route::delete('/admin/admin/{id}', [AdminDashboardController::class, 'destroy'])
        ->name('admin.admin.destroy');
    
    // Penyakit routes
    Route::get('/admin/penyakit', [PenyakitController::class, 'index'])
        ->name('admin.penyakit');
    Route::post('/admin/penyakit', [PenyakitController::class, 'store'])
        ->name('admin.penyakit.store');
    Route::put('/admin/penyakit/{id}', [PenyakitController::class, 'update'])
        ->name('admin.penyakit.update');
    Route::delete('/admin/penyakit/{id}', [PenyakitController::class, 'destroy'])
        ->name('admin.penyakit.destroy');

    // Gejala routes
    Route::get('/admin/gejala', [GejalaController::class, 'index'])
        ->name('admin.gejala');
    Route::post('/admin/gejala', [GejalaController::class, 'store'])
        ->name('admin.gejala.store');
    Route::put('/admin/gejala/{id}', [GejalaController::class, 'update'])
        ->name('admin.gejala.update');
    Route::delete('/admin/gejala/{id}', [GejalaController::class, 'destroy'])
        ->name('admin.gejala.destroy');
});
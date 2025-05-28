<?php

use App\Http\Controllers\AdminDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/admin', [AdminDashboardController::class, 'index'])
    ->name('dashboard');
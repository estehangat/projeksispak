<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RumahSakitController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/get-kabupatens/{provinsi_id}', [RumahSakitController::class, 'getKabupatensByProvinsi']);

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\PenyakitController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\DiagnosaIspaController;
use App\Http\Controllers\RumahSakitController;
use App\Http\Controllers\ArtikelController;

Route::get('/', function () {
    return redirect()->route('diagnosa.start');
})->name('home');

Route::get('/diagnosa-ispa', [DiagnosaIspaController::class, 'showStartPage'])->name('diagnosa.start');
Route::get('/diagnosa-ispa/informasi', [DiagnosaIspaController::class, 'showInformasiPage'])->name('diagnosa.informasi');
Route::get('/diagnosa-ispa/biodata', [DiagnosaIspaController::class, 'showBiodataForm'])->name('diagnosa.biodata.form');
Route::post('/diagnosa-ispa/biodata', [DiagnosaIspaController::class, 'submitBiodataAndStart'])->name('diagnosa.biodata.submit');
Route::get('/diagnosa-ispa/pertanyaan', [DiagnosaIspaController::class, 'showQuestionPage'])->name('diagnosa.pertanyaan');
Route::post('/diagnosa-ispa/proses-jawaban', [DiagnosaIspaController::class, 'processAnswer'])->name('diagnosa.proses');
Route::get('/diagnosa-ispa/hasil', [DiagnosaIspaController::class, 'showResultPage'])->name('diagnosa.hasil');

Route::get('/feedback', [DiagnosaIspaController::class, 'showFeedbackForm'])->name('diagnosa.feedback.form');
Route::post('/feedback', [DiagnosaIspaController::class, 'storeFeedback'])->name('diagnosa.feedback.store');

Route::get('/fasilitas-kesehatan', [RumahSakitController::class, 'index'])->name('rumahsakit.index');
Route::get('/fasilitas-kesehatan/{rumahSakit}', [RumahSakitController::class, 'show'])->name('rumahsakit.show');

Route::get('/artikel-kesehatan', [ArtikelController::class, 'index'])->name('artikel.index');

Route::get('/login', [AuthController::class, 'showLoginForm'])
    ->name('admin.login');
Route::post('/login', [AuthController::class, 'authenticate'])
    ->name('admin.login.authenticate');
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('admin.logout')
    ->middleware('auth');

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('/admin', [AdminDashboardController::class, 'admin'])
        ->name('admin');
    Route::post('/admin', [AdminDashboardController::class, 'store'])
        ->name('admin.store');
    Route::put('/admin/{id}', [AdminDashboardController::class, 'update'])
        ->name('admin.update');
    Route::delete('/admin/{id}', [AdminDashboardController::class, 'destroy'])
        ->name('admin.destroy');

    Route::get('/penyakit', [PenyakitController::class, 'index'])
        ->name('penyakit');
    Route::post('/penyakit', [PenyakitController::class, 'store'])
        ->name('penyakit.store');
    Route::put('/penyakit/{id}', [PenyakitController::class, 'update'])
        ->name('penyakit.update');
    Route::delete('/penyakit/{id}', [PenyakitController::class, 'destroy'])
        ->name('penyakit.destroy');

    Route::get('/gejala', [GejalaController::class, 'index'])
        ->name('gejala');
    Route::post('/gejala', [GejalaController::class, 'store'])
        ->name('gejala.store');
    Route::put('/gejala/{id}', [GejalaController::class, 'update'])
        ->name('gejala.update');
    Route::delete('/gejala/{id}', [GejalaController::class, 'destroy'])
        ->name('gejala.destroy');

});
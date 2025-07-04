<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\PenyakitController;
use App\Http\Controllers\AturanIspaController;
use App\Http\Controllers\RumahSakitController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\DiagnosaIspaController;
use App\Http\Controllers\HasilDiagnosaController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\PakarDashboardController;
use App\Http\Controllers\RiwayatDiagnosaController;

Route::get('/test-kabupatens/{provinsi_id}', function ($provinsi_id) {
    $kabupatens = App\Models\Kabupaten::where('provinsi_id', $provinsi_id)
        ->orderBy('nama_kabupaten')
        ->get(['id', 'nama_kabupaten']);

    return response()->json($kabupatens);
});
Route::get('/api/get-kabupatens/{provinsi_id}', [RumahSakitController::class, 'getKabupatensByProvinsi']);

Route::get('/', [AuthController::class, 'showLoginForm'])
    ->name('admin.login');
Route::post('/', [AuthController::class, 'authenticate'])
    ->name('admin.login.authenticate');
Route::get('/register', [AuthController::class, 'showRegisterForm'])
    ->name('admin.register');
Route::post('/register', [AuthController::class, 'register'])
    ->name('admin.register.store');
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('admin.logout')
    ->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
    Route::prefix('user')->group(function () {
        Route::get('/beranda', function () {
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

        Route::get('/profil-akun', [UserProfileController::class, 'show'])->name('user.profile');

        Route::get('/profil-akun/riwayat/{hasilDiagnosa}', [RiwayatDiagnosaController::class, 'show'])->name('user.riwayat.detail');
    });

    Route::prefix('admin')->name('admin.')->group(function () {
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

        Route::get('/artikel', [ArtikelController::class, 'adminIndex'])
            ->name('artikel');
        Route::post('/artikel', [ArtikelController::class, 'store'])
            ->name('artikel.store');
        Route::put('/artikel/{id}', [ArtikelController::class, 'update'])
            ->name('artikel.update');
        Route::delete('/artikel/{id}', [ArtikelController::class, 'destroy'])
            ->name('artikel.destroy');

        Route::get('/faskes', [RumahSakitController::class, 'adminIndex'])
            ->name('faskes');
        Route::post('/faskes', [RumahSakitController::class, 'store'])
            ->name('faskes.store');
        Route::put('/faskes/{id}', [RumahSakitController::class, 'update'])
            ->name('faskes.update');
        Route::delete('/faskes/{id}', [RumahSakitController::class, 'destroy'])
            ->name('faskes.destroy');

        Route::get('/feedback', [FeedbackController::class, 'index'])
            ->name('feedback');
        Route::delete('/feedback/{id}', [FeedbackController::class, 'destroy'])
            ->name('feedback.destroy');

        Route::get('/hasil', [HasilDiagnosaController::class, 'index'])
            ->name('hasil');
        Route::delete('/hasil/{id}', [HasilDiagnosaController::class, 'destroy'])
            ->name('hasil.destroy');

        Route::get('/aturan', [AturanIspaController::class, 'index'])
            ->name('aturan');
        Route::post('/aturan', [AturanIspaController::class, 'store'])
            ->name('aturan.store');
        Route::put('/aturan/{id}', [AturanIspaController::class, 'update'])
            ->name('aturan.update');
        Route::delete('/aturan/{id}', [AturanIspaController::class, 'destroy'])
            ->name('aturan.destroy');
    });

    Route::prefix('pakar')->name('pakar.')->group(function () {
        Route::get('/dashboard', [PakarDashboardController::class, 'index'])
            ->name('dashboard');

        Route::get('/penyakit', [PakarDashboardController::class, 'penyakitIndex'])
            ->name('penyakit');
        Route::post('/penyakit', [PakarDashboardController::class, 'penyakitStore'])
            ->name('penyakit.store');
        Route::put('/penyakit/{id}', [PakarDashboardController::class, 'penyakitUpdate'])
            ->name('penyakit.update');
        Route::delete('/penyakit/{id}', [PakarDashboardController::class, 'penyakitDestroy'])
            ->name('penyakit.destroy');

        Route::get('/gejala', [PakarDashboardController::class, 'gejalaIndex'])
            ->name('gejala');
        Route::post('/gejala', [PakarDashboardController::class, 'gejalaStore'])
            ->name('gejala.store');
        Route::put('/gejala/{id}', [PakarDashboardController::class, 'gejalaUpdate'])
            ->name('gejala.update');
        Route::delete('/gejala/{id}', [PakarDashboardController::class, 'gejalaDestroy'])
            ->name('gejala.destroy');

        Route::get('/aturan', [PakarDashboardController::class, 'aturanIndex'])
            ->name('aturan');
        Route::post('/aturan', [PakarDashboardController::class, 'aturanStore'])
            ->name('aturan.store');
        Route::put('/aturan/{id}', [PakarDashboardController::class, 'aturanUpdate'])
            ->name('aturan.update');
        Route::delete('/aturan/{id}', [PakarDashboardController::class, 'aturanDestroy'])
            ->name('aturan.destroy');
    });
});

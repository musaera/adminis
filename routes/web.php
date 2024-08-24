<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\administrasi\OsisController;
use App\Http\Controllers\administrasi\MapelController;
use App\Http\Controllers\administrasi\KepsekController;
use App\Http\Controllers\administrasi\SupervisiController;
use App\Http\Controllers\administrasi\WaliKelasController;
use App\Http\Controllers\administrasi\KepalaLabkomController;
use App\Http\Controllers\administrasi\PerpustakaanController;
use App\Http\Controllers\administrasi\WakaKesiswaanController;
use App\Http\Controllers\administrasi\WakaKurikulumController;

// Public Routes
Route::view('/', 'welcome');

// Authenticated Routes
Route::middleware(['auth'])->group(function () {

    // Dashboard and Profile
    Route::view('dashboard', 'dashboard')
        ->middleware(['verified'])
        ->name('dashboard');

    Route::view('profile', 'profile')
        ->name('profile');

    // Administrasi Keguruan Dashboard
    Route::view('administrasi-keguruan', 'administrasiKeguruan')->name('administrasiKeguruan');

    // Routes for Mapel
    Route::prefix('administrasi-keguruan/mapel')->group(function () {
        Route::get('/', [MapelController::class, 'index'])->name('mapel.index');
        Route::get('/create', [MapelController::class, 'create'])->name('mapel.create');
        Route::post('/', [MapelController::class, 'store'])->name('mapel.store');
        Route::get('/{id}/edit', [MapelController::class, 'edit'])->name('mapel.edit');
        Route::put('/{id}', [MapelController::class, 'update'])->name('mapel.update');
        Route::delete('/{id}', [MapelController::class, 'destroy'])->name('mapel.destroy');
        Route::get('/{id}/download', [MapelController::class, 'downloadFiles'])->name('mapel.download');
    });

    // Routes for Kepala Lab Kom
    Route::prefix('administrasi-keguruan/kepalaLabKom')->group(function () {
        Route::get('/', [KepalaLabkomController::class, 'index'])->name('kepalaLabKom.index');
        Route::get('/create', [KepalaLabkomController::class, 'create'])->name('kepalaLabKom.create');
        Route::post('/', [KepalaLabkomController::class, 'store'])->name('kepalaLabKom.store');
        Route::get('/{id}/edit', [KepalaLabkomController::class, 'edit'])->name('kepalaLabKom.edit');
        Route::put('/{id}', [KepalaLabkomController::class, 'update'])->name('kepalaLabKom.update');
        Route::delete('/{id}', [KepalaLabkomController::class, 'destroy'])->name('kepalaLabKom.destroy');
        Route::get('/{id}/download', [KepalaLabkomController::class, 'downloadFiles'])->name('kepalaLabKom.download');
    });

    // Routes for OSIS
    Route::prefix('administrasi-keguruan/osis')->group(function () {
        Route::get('/', [OsisController::class, 'index'])->name('osis.index');
        Route::get('/create', [OsisController::class, 'create'])->name('osis.create');
        Route::post('/', [OsisController::class, 'store'])->name('osis.store');
        Route::get('/{id}/edit', [OsisController::class, 'edit'])->name('osis.edit');
        Route::put('/{id}', [OsisController::class, 'update'])->name('osis.update');
        Route::delete('/{id}', [OsisController::class, 'destroy'])->name('osis.destroy');
        Route::get('/{id}/download', [OsisController::class, 'downloadFiles'])->name('osis.download');
    });

    // Routes for Perpustakaan
    Route::prefix('administrasi-keguruan/perpustakaan')->group(function () {
        Route::get('/', [PerpustakaanController::class, 'index'])->name('perpustakaan.index');
        Route::get('/create', [PerpustakaanController::class, 'create'])->name('perpustakaan.create');
        Route::post('/', [PerpustakaanController::class, 'store'])->name('perpustakaan.store');
        Route::get('/{id}/edit', [PerpustakaanController::class, 'edit'])->name('perpustakaan.edit');
        Route::put('/{id}', [PerpustakaanController::class, 'update'])->name('perpustakaan.update');
        Route::delete('/{id}', [PerpustakaanController::class, 'destroy'])->name('perpustakaan.destroy');
        Route::get('/{id}/download', [PerpustakaanController::class, 'downloadFiles'])->name('perpustakaan.download');
    });

    // Routes for Walas
    Route::prefix('administrasi-keguruan/walas')->group(function () {
        Route::get('/', [WaliKelasController::class, 'index'])->name('walas.index');
        Route::get('/create', [WaliKelasController::class, 'create'])->name('walas.create');
        Route::post('/', [WaliKelasController::class, 'store'])->name('walas.store');
        Route::get('/{id}/edit', [WaliKelasController::class, 'edit'])->name('walas.edit');
        Route::put('/{id}', [WaliKelasController::class, 'update'])->name('walas.update');
        Route::delete('/{id}', [WaliKelasController::class, 'destroy'])->name('walas.destroy');
        Route::get('/download/{id}', [WaliKelasController::class, 'downloadFile'])->name('walas.downloadFile');
    });

    // Routes for Waka Kurikulum
    Route::prefix('administrasi-keguruan/waka-kurikulum')->group(function () {
        Route::get('/', [WakaKurikulumController::class, 'index'])->name('waka_kurikulum.index');
        Route::get('/create', [WakaKurikulumController::class, 'create'])->name('waka_kurikulum.create');
        Route::post('/', [WakaKurikulumController::class, 'store'])->name('waka_kurikulum.store');
        Route::get('/{wakaKurikulum}/edit', [WakaKurikulumController::class, 'edit'])->name('waka_kurikulum.edit');
        Route::put('/{wakaKurikulum}', [WakaKurikulumController::class, 'update'])->name('waka_kurikulum.update');
        Route::delete('/{wakaKurikulum}', [WakaKurikulumController::class, 'destroy'])->name('waka_kurikulum.destroy');
        Route::get('/exportPDF/{id}', [WakaKurikulumController::class, 'exportPDF'])->name('waka_kurikulum.exportPDF');
        Route::get('/download/{id}', [WakaKurikulumController::class, 'downloadFile'])->name('waka_kurikulum.downloadFile');
    });

    // Routes for Waka Kesiswaan
    Route::prefix('administrasi-keguruan/waka-kesiswaan')->group(function () {
        Route::get('/', [WakaKesiswaanController::class, 'index'])->name('waka_kesiswaan.index');
        Route::get('/create', [WakaKesiswaanController::class, 'create'])->name('waka_kesiswaan.create');
        Route::post('/', [WakaKesiswaanController::class, 'store'])->name('waka_kesiswaan.store');
        Route::get('/{id}/edit', [WakaKesiswaanController::class, 'edit'])->name('waka_kesiswaan.edit');
        Route::put('/{id}', [WakaKesiswaanController::class, 'update'])->name('waka_kesiswaan.update');
        Route::delete('/{id}', [WakaKesiswaanController::class, 'destroy'])->name('waka_kesiswaan.destroy');
        Route::get('/exportPDF/{id}', [WakaKesiswaanController::class, 'exportPDF'])->name('waka_kesiswaan.exportPDF');
        Route::get('/{id}/download', [WakaKesiswaanController::class, 'downloadFiles'])->name('waka_kesiswaan.download');
    });

    // Routes for Kepsek
    Route::prefix('administrasi-keguruan/kepsek')->group(function () {
        Route::get('/', [KepsekController::class, 'index'])->name('kepsek.index');
        Route::get('/create', [KepsekController::class, 'create'])->name('kepsek.create');
        Route::post('/', [KepsekController::class, 'store'])->name('kepsek.store');
        Route::get('/{id}/edit', [KepsekController::class, 'edit'])->name('kepsek.edit');
        Route::put('/{id}', [KepsekController::class, 'update'])->name('kepsek.update');
        Route::delete('/{id}', [KepsekController::class, 'destroy'])->name('kepsek.destroy');
        Route::get('/exportPDF/{id}', [KepsekController::class, 'exportPDF'])->name('kepsek.exportPDF');
        Route::get('/download/{id}', [KepsekController::class, 'downloadFiles'])->name('kepsek.download');
    });

    // Routes for Supervisi
    Route::prefix('administrasi-keguruan/supervisi')->group(function () {
        Route::get('/', [SupervisiController::class, 'index'])->name('supervisi.index');
        Route::get('/create', [SupervisiController::class, 'create'])->name('supervisi.create');
        Route::post('/', [SupervisiController::class, 'store'])->name('supervisi.store');
        Route::get('/{id}/edit', [SupervisiController::class, 'edit'])->name('supervisi.edit');
        Route::put('/{id}', [SupervisiController::class, 'update'])->name('supervisi.update');
        Route::delete('/{id}', [SupervisiController::class, 'destroy'])->name('supervisi.destroy');
    });
});

// Publicly accessible routes (not protected by authentication)
Route::view('welcome', 'welcome');

require __DIR__ . '/auth.php';

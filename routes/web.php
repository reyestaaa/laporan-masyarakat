<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PetugasController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\PengaduanController;
use App\Http\Controllers\Admin\MasyarakatController;
use App\Http\Controllers\Admin\TanggapanController;

// User routes

Route::get('/', [UserController::class, 'index'])->name('pekat.index');

Route::middleware(['guest'])->group(function () {
    //Login
    Route::post('/login/auth', [UserController::class, 'login'])->name('pekat.login');

    //Register
    Route::get('/register', [UserController::class, 'formRegister'])->name('pekat.formRegister');
    Route::post('/register/auth', [UserController::class, 'register'])->name('pekat.register');
});

// Authenticated user routes
Route::middleware(['isMasyarakat'])->group(function () {
    Route::post('/store', [UserController::class, 'storePengaduan'])->name('pekat.store');
    Route::get('/laporan/{siapa?}', [UserController::class, 'laporan'])->name('pekat.laporan');
    Route::get('/logout', [UserController::class, 'logout'])->name('pekat.logout');

});

// Admin routes
Route::prefix('admin')->group(function () {

    Route::middleware(['isAdmin'])->group(function () {
        //Petugas
        Route::resource('petugas', PetugasController::class);

        //Masyarakat
        Route::resource('masyarakat', MasyarakatController::class);

        Route::resource('kategori', KategoriController::class);

        //Laporan
        Route::get('laporan', [LaporanController::class, 'index'])->name('laporan.index');
        Route::post('getLaporan', [LaporanController::class, 'getLaporan'])->name('laporan.getLaporan');
        Route::get('laporan/cetak/{from}/{to}', [LaporanController::class, 'cetakLaporan'])->name('laporan.cetakLaporan');
    });

    Route::middleware(['isPetugas'])->group(function () {
        //Dashboard
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

        //Pengaduan
        Route::resource('pengaduan', PengaduanController::class);
        // Route::get('/', [jumlahPengaduanController::class, 'index'])->name('pekat.index');

        //Tanggapan
        Route::post('tanggapan/creupd', [TanggapanController::class, 'creupd'])->name('tanggapan.creupd');

        //Logout
        Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    });

    
    Route::middleware(['isGuest'])->group(function () {
        Route::get('/login', [AdminController::class, 'formLogin'])->name('admin.formLogin');
        Route::post('/login', [AdminController::class, 'login'])->name('admin.login');
    });
    
     //Laporan
     Route::get('laporan', [LaporanController::class, 'index'])->name('laporan.index');
     Route::post('getLaporan', [LaporanController::class, 'getLaporan'])->name('laporan.getLaporan');
     Route::get('laporan/cetak/{from}/{to}', [LaporanController::class, 'cetakLaporan'])->name('laporan.cetakLaporan');
});

Route::get('error', function () {
    return view('error');
})->name('error');


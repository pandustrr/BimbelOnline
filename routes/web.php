<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Guru\DashboardController as GuruDashboardController;
use App\Http\Controllers\Siswa\DashboardController as SiswaDashboardController;
use App\Http\Controllers\Admin\GuruController;

Route::get('/', function () {
    return view('home');
});

// Authentication Routes
Route::middleware('guest')->group(function () {
    // Login
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);

    // Register Siswa
    Route::get('/register/siswa', [RegisterController::class, 'showSiswaRegisterForm'])->name('register.siswa');
    Route::post('/register/siswa', [RegisterController::class, 'registerSiswa']);

    // Register Guru
    Route::get('/register/guru', [RegisterController::class, 'showGuruRegisterForm'])->name('register.guru');
    Route::post('/register/guru', [RegisterController::class, 'registerGuru']);
});

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
   // Kelola Guru
    Route::get('/guru', [GuruController::class, 'index'])->name('admin.guru.index');
    Route::get('/guru/{guru}', [GuruController::class, 'show'])->name('admin.guru.detail');
    Route::post('/guru/{guru}/diterima', [GuruController::class, 'diterima'])->name('admin.guru.diterima');
    Route::post('/guru/{guru}/ditolak', [GuruController::class, 'ditolak'])->name('admin.guru.ditolak');
    Route::delete('/guru/{guru}', [GuruController::class, 'destroy'])->name('admin.guru.destroy');
    Route::patch('/guru/{guru}/batal-tolak', [GuruController::class, 'batalTolak'])->name('admin.guru.batal-tolak');
    Route::patch('/guru/{guru}/batal-terima', [GuruController::class, 'batalTerima'])->name('admin.guru.batal-terima');
});

// Siswa Routes
Route::prefix('siswa')->middleware('auth:siswa')->group(function () {
    Route::get('/dashboard', [SiswaDashboardController::class, 'index'])->name('siswa.dashboard');
});

// Guru Routes
Route::prefix('guru')->middleware('auth:guru')->group(function () {
    Route::get('/dashboard', [GuruDashboardController::class, 'index'])->name('guru.dashboard');
});

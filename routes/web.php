<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Guru\GuruProfileController;
use App\Http\Controllers\Guru\GuruJadwalController;
use App\Http\Controllers\Siswa\SiswaProfileController;
use App\Http\Controllers\Siswa\SiswaPendaftaranController;
use App\Http\Controllers\Siswa\KelasSayaController;

// Halaman utama
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);

    Route::get('/register/siswa', [RegisterController::class, 'showSiswaRegisterForm'])->name('register.siswa');
    Route::post('/register/siswa', [RegisterController::class, 'registerSiswa']);

    Route::get('/register/guru', [RegisterController::class, 'showGuruRegisterForm'])->name('register.guru');
    Route::post('/register/guru', [RegisterController::class, 'registerGuru']);
});

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Admin Routes
Route::prefix('admin')->name('admin.')->middleware('auth:admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Kelola Guru
    Route::get('/guru', [GuruController::class, 'index'])->name('guru.index');
    Route::get('/guru/{guru}', [GuruController::class, 'show'])->name('guru.detail');
    Route::post('/guru/{guru}/diterima', [GuruController::class, 'diterima'])->name('guru.diterima');
    Route::post('/guru/{guru}/ditolak', [GuruController::class, 'ditolak'])->name('guru.ditolak');
    Route::delete('/guru/{guru}', [GuruController::class, 'destroy'])->name('guru.destroy');
    Route::patch('/guru/{guru}/batal-tolak', [GuruController::class, 'batalTolak'])->name('guru.batal-tolak');
    Route::patch('/guru/{guru}/batal-terima', [GuruController::class, 'batalTerima'])->name('guru.batal-terima');
});

// Siswa Routes
Route::prefix('siswa')->name('siswa.')->middleware('auth:siswa')->group(function () {

    // Profil
    Route::get('/profile', [SiswaProfileController::class, 'show'])->name('profile');
    Route::get('/profile/edit', [SiswaProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [SiswaProfileController::class, 'update'])->name('profile.update');

    // Pendaftaran Kelas
    Route::get('/pendaftaran', [SiswaPendaftaranController::class, 'index'])->name('pendaftaran');
    Route::get('/pendaftaran/{guru}', [SiswaPendaftaranController::class, 'show'])->name('pendaftaran.show');
    Route::post('/pendaftaran/{jadwal}/daftar', [SiswaPendaftaranController::class, 'daftar'])->name('pendaftaran.daftar');

    // Kelas Saya
    Route::get('/kelas-saya', [KelasSayaController::class, 'index'])->name('kelas-saya');
    Route::put('/kelas-saya/{jadwal}/batal', [KelasSayaController::class, 'batal'])->name('kelas-saya.batal');
    Route::get('/kelas-saya/{jadwal}/detail', [KelasSayaController::class, 'detail'])->name('kelas-saya.detail');
    Route::put('/kelas-saya/{jadwal}/aktifkan-kembali', [KelasSayaController::class, 'aktifkanKembali'])->name('siswa.kelas-saya.kembali-aktif');
    Route::delete('/kelas-saya/{jadwal}/hapus', [KelasSayaController::class, 'destroy'])->name('kelas-saya.hapus');
});

// Guru Routes
Route::prefix('guru')->name('guru.')->middleware('auth:guru')->group(function () {

    // Profile Routes
    Route::get('/profile', [GuruProfileController::class, 'show'])->name('profile');
    Route::get('/profile/edit', [GuruProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [GuruProfileController::class, 'update'])->name('profile.update');

    // Jadwal Routes
    Route::get('/jadwal', [GuruJadwalController::class, 'index'])->name('jadwal');
    Route::get('/jadwal/create', [GuruJadwalController::class, 'create'])->name('jadwal.create');
    Route::post('/jadwal', [GuruJadwalController::class, 'store'])->name('jadwal.store');
    Route::get('/jadwal/{jadwal}/edit', [GuruJadwalController::class, 'edit'])->name('jadwal.edit');
    Route::put('/jadwal/{jadwal}', [GuruJadwalController::class, 'update'])->name('jadwal.update');
    Route::delete('/jadwal/{jadwal}', [GuruJadwalController::class, 'destroy'])->name('jadwal.destroy');
    // Route::get('/jadwal/{jadwal}/detail-siswa', [GuruJadwalController::class, 'detailSiswa'])->name('jadwal-detail-siswa');
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PeminjamanController;

// Route Home[cite: 4]
Route::get('/', [HomeController::class, 'index'])->name('home');

// Route Login & Register
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/register', [RegisterController::class, 'index'])->name('register');

// Autentikasi (Register)
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.post'); // Untuk simpan data user baru

// Dashboard & Koleksi
Route::view('/dashboard', 'dashboard')->name('dashboard');
Route::view('/koleksi', 'koleksi')->name('koleksi');
Route::view('/koleksi-abc', 'koleksi-abc');
Route::view('/keranjang', 'keranjang')->name('keranjang');
Route::view('/peminjaman', 'peminjaman')->name('peminjaman');
Route::view('/tambah-buku', 'tambah-buku')->name('tambah-buku');

// Jangan lupa import ProfilController jika kamu membuatnya, atau gunakan view() saja dulu untuk testing:
Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::get('/pinjaman-saya', function () {
    return view('pinjaman-saya');
})->name('pinjaman-saya');

Route::get('/disukai-saya', function () {
    return view('disukai-saya');
})->name('disukai-saya');

// Halaman Keamanan Saya
Route::get('/keamanan-saya', function () {
    return view('keamanan-saya');
})->name('keamanan-saya');

// Halaman Riwayat Peminjaman
Route::get('/riwayat-peminjaman', function () {
    return view('riwayat-peminjaman');
})->name('riwayat-peminjaman');

Route::get('/riwayat-peminjaman', [PeminjamanController::class, 'index'])->name('riwayat.index');
Route::get('/riwayat-peminjaman/pdf', [PeminjamanController::class, 'exportPdf'])->name('riwayat.pdf');

Route::get('/disukai', [BukuController::class, 'disukai'])->name('disukai.index');

// Logout
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');
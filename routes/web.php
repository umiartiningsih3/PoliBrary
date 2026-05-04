<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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

// Logout
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Landing Page (pakai controller)
Route::get('/', [HomeController::class, 'index']);

// Halaman lain
Route::view('/peminjaman', 'peminjaman');
Route::view('/tambah-buku', 'tambah-buku');
Route::view('/koleksi', 'koleksi');
Route::view('/koleksi-abc', 'koleksi-abc');
Route::view('/keranjang', 'keranjang');

// Dashboard (cukup sekali + name)
Route::view('/dashboard', 'dashboard')->name('dashboard');

// Auth
Route::view('/register', 'register');
Route::view('/login', 'login');
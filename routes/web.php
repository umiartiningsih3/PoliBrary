<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::view('/dashboard', 'dashboard')->name('dashboard');

Route::view('/login', 'login')->name('login');
Route::view('/register', 'register')->name('register');

Route::view('/koleksi', 'koleksi');
Route::view('/koleksi-abc', 'koleksi-abc');
Route::view('/keranjang', 'keranjang');
Route::view('/peminjaman', 'peminjaman');
Route::view('/tambah-buku', 'tambah-buku');
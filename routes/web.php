<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/peminjaman', function () {
    return view('peminjaman');
});

Route::get('/tambah-buku', function () {
    return view('tambah-buku');
});

Route::get('/koleksi', function () {
    return view('koleksi');
});

Route::get('/keranjang', function () {
    return view('keranjang');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/koleksi-abc', function () {
    return view('koleksi-abc');
});

Route::get('/', function () {
    return view('landing');
});
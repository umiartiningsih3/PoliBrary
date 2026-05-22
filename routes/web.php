<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\BukuController;

// Route Home[cite: 4]
Route::get('/', [HomeController::class, 'index'])->name('home');

// Route Login & Register
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
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

Route::get('/admin', function () {
    return view('admin.index');
});

// Route untuk menampilkan halaman form registrasi
Route::get('/admin/register', function () {
    return view('admin.register'); // Pastikan file ada di resources/views/admin/register.blade.php
})->name('admin.register'); // <--- NAMA INI YANG WAJIB ADA

Route::get('/admin/pengembalian', function () {
    return view('admin.pengembalian');
})->name('admin.pengembalian');

// Route untuk menangani pengiriman data form (POST)
Route::post('/admin/register', function () {
    // Logika simpan data nanti di sini
})->name('admin.store-mahasiswa');

Route::get('/admin/pengembalian', function () {
    return view('admin.pengembalian');
})->name('admin.pengembalian');

Route::get('/admin/perpanjangan', function () {
    return view('admin.perpanjangan');
})->name('admin.perpanjangan');

Route::get('/admin/mahasiswa', function () {
    return view('admin.mahasiswa');
})->name('admin.mahasiswa');

Route::get('/riwayat-peminjaman', function () {
    return view('riwayat-peminjaman');
})->name('riwayat-peminjaman');

Route::get('/riwayat-peminjaman', function () {

    $riwayat = [
        [
            'judul' => 'Pemrograman Web Laravel',
            'tgl_pinjam' => '2026-05-01',
            'tgl_kembali' => '2026-05-07',
            'status' => 'Dikembalikan',
            'denda' => 0
        ]
    ];

    return view('peminjaman.riwayat', compact('riwayat'));

})->name('riwayat.index');

use App\Http\Controllers\AuthController;

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('forgot.password');

Route::post('/forgot-password', [AuthController::class, 'sendOtp'])
    ->name('otp.send');

Route::get('/verify-otp', function () {
    return view('auth.verify-otp');
})->name('otp.form');

Route::post('/verify-otp', [AuthController::class, 'verifyOtp'])
    ->name('otp.verify');

Route::post('/reset-password', [AuthController::class, 'resetPassword'])
    ->name('password.reset');
<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\{
    HomeController, LoginController, RegisterController, PeminjamanController,
    BukuController, PasswordController, PeminjamanAdminController,
    MahasiswaController, AuthController, DendaController, 
    PerpanjanganController, PengembalianController
};

// --- RUTE PUBLIC ---
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.post');
// Tambahkan ini di dalam group middleware auth
Route::get('/profile', function () {
    return view('profile'); // Pastikan file blade-nya ada di resources/views/profile.blade.php
})->name('profile');

// --- RUTE AUTH (User Login) ---
Route::middleware(['auth'])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/koleksi', [BukuController::class, 'index'])->name('koleksi.index');
    Route::post('/logout', function () { Auth::logout(); return redirect('/'); })->name('logout');
    Route::get('/riwayat-peminjaman', [PeminjamanController::class, 'index'])->name('riwayat.index');
    Route::get('/pinjaman-saya', [PeminjamanController::class, 'pinjamanSaya'])->name('pinjaman-saya');
    Route::get('/denda', [DendaController::class, 'index'])->name('denda');
    // Jika menggunakan view langsung:
Route::view('/keranjang', 'keranjang')->name('keranjang');

// ATAU jika menggunakan Controller:
Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang');
});

// --- RUTE ADMIN (Role Admin) ---
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
    Route::post('/admin/mahasiswa/store', [MahasiswaController::class, 'store'])->name('admin.store-mahasiswa');
    Route::get('/peminjaman', [PeminjamanAdminController::class, 'index'])->name('peminjaman.admin');
    Route::get('/perpanjangan', [PerpanjanganController::class, 'index'])->name('perpanjangan.index');
    Route::get('/pengembalian', [PengembalianController::class, 'index'])->name('pengembalian.index');
});

// Tambahkan ini di dalam routes/web.php

Route::middleware(['auth'])->group(function () {
    // Rute yang menyebabkan error RouteNotFoundException
    Route::view('/keranjang', 'keranjang')->name('keranjang');
    Route::view('/tambah-buku', 'tambah-buku')->name('tambah-buku');
    
    // Pastikan rute lainnya juga sudah terdaftar dengan nama yang benar
    Route::get('/profile', function () { return view('profile'); })->name('profile');
    Route::get('/denda', [App\Http\Controllers\DendaController::class, 'index'])->name('denda');
    Route::get('/pinjaman-saya', [App\Http\Controllers\PeminjamanController::class, 'pinjamanSaya'])->name('pinjaman-saya');
});

Route::middleware(['auth'])->group(function () {
    // ... rute yang sudah ada ...

    // Tambahkan rute yang menyebabkan error:
    Route::view('/disukai-saya', 'disukai-saya')->name('disukai-saya');
    Route::view('/keamanan-saya', 'keamanan-saya')->name('keamanan-saya');
    
    // Pastikan juga rute lain yang mungkin akan dipanggil ada di sini:
    Route::view('/riwayat-peminjaman', 'riwayat-peminjaman')->name('riwayat.index');
});

Route::middleware(['auth', 'admin'])->group(function () {
    // ... rute admin lainnya ...
    
    // Tambahkan baris ini:
    Route::get('/denda/riwayat', [App\Http\Controllers\DendaController::class, 'riwayat'])->name('denda.riwayat');
});

// Tambahkan rute untuk pencarian global
Route::get('/cari', [App\Http\Controllers\BukuController::class, 'searchGlobal'])->name('global.search');
// Tambahkan rute ini untuk menangani "Lupa Password"
Route::get('/forgot-password', function () {
    return view('auth.forgot-password'); // Pastikan file blade-nya ada
})->name('forgot.password');

Route::middleware(['auth', 'admin'])->group(function () {
    // ... rute admin lainnya ...

    // Tambahkan rute untuk admin perpanjangan dan pengembalian
    Route::get('/admin/perpanjangan', [App\Http\Controllers\PerpanjanganController::class, 'index'])->name('admin.perpanjangan');
    Route::get('/admin/pengembalian', [App\Http\Controllers\PengembalianController::class, 'index'])->name('admin.pengembalian');
});

Route::middleware(['auth', 'admin'])->group(function () {
    // ... rute lainnya ...

    // Pastikan baris ini ada:
    Route::get('/admin/mahasiswa', [App\Http\Controllers\MahasiswaController::class, 'index'])->name('admin.mahasiswa');
});

Route::middleware(['auth', 'admin'])->group(function () {
    // ... rute lainnya ...

    // Pastikan baris ini ada:
    Route::get('/admin/mahasiswa', [App\Http\Controllers\MahasiswaController::class, 'index'])->name('admin.mahasiswa');
});

Route::middleware(['auth', 'admin'])->group(function () {
    // ... rute lainnya ...

    // Tambahkan ini agar error hilang
    Route::get('/admin/register', [App\Http\Controllers\RegisterController::class, 'index'])->name('admin.register');
    
    // Pastikan juga rute untuk menyimpan data registrasinya ada (jika belum)
    Route::post('/admin/register', [App\Http\Controllers\RegisterController::class, 'store'])->name('admin.register.post');
});

// routes/web.php
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/perpanjangan', [PerpanjanganController::class, 'index'])->name('admin.perpanjangan');
    Route::post('/perpanjangan/approve/{id}', [PerpanjanganController::class, 'approve'])->name('admin.perpanjangan.approve');
    Route::post('/perpanjangan/reject/{id}', [PerpanjanganController::class, 'reject'])->name('admin.perpanjangan.reject');
});

// Pastikan barisnya terlihat seperti ini:
Route::get('/perpanjangan', [PerpanjanganController::class, 'index'])->name('perpanjangan.index');

Route::get('/pengembalian', [PengembalianController::class, 'index'])->name('pengembalian.index');
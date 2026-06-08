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
    Route::post('/logout', function () { Auth::logout(); return redirect('/'); })->name('logout');
    Route::get('/riwayat-peminjaman', [PeminjamanController::class, 'index'])->name('riwayat.index');
    Route::get('/pinjaman-saya', [PeminjamanController::class, 'pinjamanSaya'])->name('pinjaman-saya');
    Route::get('/denda', [DendaController::class, 'index'])->name('denda');
    // Jika menggunakan view langsung:
Route::view('/keranjang', 'keranjang')->name('keranjang');

// ATAU jika menggunakan Controller:
Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang');
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

// Tambahkan rute untuk pencarian global
Route::get('/cari', [App\Http\Controllers\BukuController::class, 'searchGlobal'])->name('global.search');
// Tambahkan rute ini untuk menangani "Lupa Password"
Route::get('/forgot-password', function () {
    return view('auth.forgot-password'); // Pastikan file blade-nya ada
})->name('forgot.password');

// Pastikan barisnya terlihat seperti ini:
Route::get('/perpanjangan', [PerpanjanganController::class, 'index'])->name('perpanjangan.index');

Route::get('/pengembalian', [PengembalianController::class, 'index'])->name('pengembalian.index');

// Hapus semua rute yang mirip dan sisakan ini saja:
Route::delete('/admin/mahasiswa/{id}', [App\Http\Controllers\MahasiswaController::class, 'destroy'])
    ->name('admin.mahasiswa.destroy');

// Pastikan rute DELETE ada DI ATAS rute GET yang umum
Route::delete('/admin/mahasiswa/{id}', [App\Http\Controllers\MahasiswaController::class, 'destroy'])
    ->name('admin.mahasiswa.destroy');

Route::get('/admin/mahasiswa', [App\Http\Controllers\MahasiswaController::class, 'index'])
    ->name('admin.mahasiswa');

Route::middleware(['auth'])->group(function () {
    
    // 1. Rute untuk melihat daftar mahasiswa
    Route::get('/admin/mahasiswa', function() {
        if (strtolower(auth()->user()->tipe_keanggotaan) !== 'petugas') return redirect('/dashboard');
        return app(MahasiswaController::class)->index();
    })->name('admin.mahasiswa');
    
    // 2. Rute untuk HAPUS Mahasiswa
    Route::delete('/admin/mahasiswa/destroy/{id}', function($id) {
        if (strtolower(auth()->user()->tipe_keanggotaan) !== 'petugas') return redirect('/dashboard');
        return app(MahasiswaController::class)->destroy($id);
    })->name('admin.mahasiswa.destroy');

    // 3. Rute Form Tambah/Register Mahasiswa
    Route::get('/admin/mahasiswa/register', function() {
        if (strtolower(auth()->user()->tipe_keanggotaan) !== 'petugas') return redirect('/dashboard');
        return app(MahasiswaController::class)->create();
    })->name('admin.mahasiswa.register');

    // 4. Rute Simpan Data Mahasiswa Baru
    Route::post('/admin/mahasiswa/store', function() {
        if (strtolower(auth()->user()->tipe_keanggotaan) !== 'petugas') return redirect('/dashboard');
        return app(MahasiswaController::class)->store(request());
    })->name('admin.store-mahasiswa');

    // 5. Rute Form Edit Mahasiswa
    Route::get('/admin/mahasiswa/{id}/edit', function($id) {
        if (strtolower(auth()->user()->tipe_keanggotaan) !== 'petugas') return redirect('/dashboard');
        return app(MahasiswaController::class)->edit($id);
    })->name('admin.mahasiswa.edit');

    // 6. Rute Update Data Mahasiswa
    Route::put('/admin/mahasiswa/{id}', function($id) {
        if (strtolower(auth()->user()->tipe_keanggotaan) !== 'petugas') return redirect('/dashboard');
        return app(MahasiswaController::class)->update(request(), $id);
    })->name('admin.mahasiswa.update');

});

// Jika kamu ingin langsung menampilkan view koleksi-abc.blade.php
Route::get('/koleksi-abc', function () {
    return view('koleksi-abc');
})->name('koleksi.abc');

// Tambahkan rute ini ke web.php
Route::get('/koleksi-subjek', function () {
    return view('koleksi-subjek'); // Pastikan kamu punya file koleksi-subjek.blade.php
})->name('koleksi.subjek');

// Pastikan rute ini ada di web.php
Route::post('/buku', [BukuController::class, 'store'])->name('buku.store');


// Pastikan rute ini ada di dalam file routes/web.php
Route::get('/pinjaman/detail/{id}', [PeminjamanController::class, 'detail'])->name('peminjaman.detail');

// Jika rutenya adalah /riwayat-peminjaman
Route::view('/riwayat-peminjaman', 'peminjaman.riwayat')->name('riwayat.index');
Route::get('/riwayat/pdf', [PeminjamanController::class, 'cetakPdf'])->name('riwayat.pdf');

// Ganti Route::view menjadi Route::get
Route::get('/riwayat-peminjaman', [App\Http\Controllers\PeminjamanController::class, 'riwayat'])->name('riwayat.index');


// Pastikan rute ini berada di dalam group middleware yang sesuai (misalnya admin)
Route::get('/denda/export', [DendaController::class, 'export'])->name('denda.export');

use App\Http\Controllers\ProfileController;

Route::middleware(['auth'])->group(function () {
    // Menggunakan nama 'profile' saja
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
    
    // Rute untuk proses simpan perubahan
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

// Pastikan hanya menggunakan middleware 'auth' saja
Route::middleware(['auth'])->group(function () {

    // 1. Kelola Mahasiswa
    Route::get('/mahasiswa', function() {
        if (strtolower(auth()->user()->tipe_keanggotaan) !== 'petugas') {
            return redirect('/dashboard');
        }
        return app(App\Http\Controllers\MahasiswaController::class)->index();
    })->name('mahasiswa.index');

    // 2. Kelola Peminjaman (SUDAH DISESUAIKAN DENGAN LOG ERROR ANDA)
    Route::get('/peminjaman', function() {
        if (strtolower(auth()->user()->tipe_keanggotaan) !== 'petugas') {
            return redirect('/dashboard');
        }
        return app(App\Http\Controllers\PeminjamanAdminController::class)->index();
    })->name('peminjaman.admin');

    // 3. Kelola Perpanjangan
    Route::get('/perpanjangan', function() {
        if (strtolower(auth()->user()->tipe_keanggotaan) !== 'petugas') {
            return redirect('/dashboard');
        }
        return app(App\Http\Controllers\PerpanjanganController::class)->index();
    })->name('perpanjangan.index');

    // 4. Kelola Pengembalian
    Route::get('/pengembalian', function() {
        if (strtolower(auth()->user()->tipe_keanggotaan) !== 'petugas') {
            return redirect('/dashboard');
        }
        return app(App\Http\Controllers\PengembalianController::class)->index();
    })->name('pengembalian.index');

    // Ganti rute denda-riwayat di paling bawah dengan kode ini:
Route::get('/denda-riwayat', function() {
    if (strtolower(auth()->user()->tipe_keanggotaan) !== 'petugas') {
        return redirect('/dashboard');
    }
    // Memanggil fungsi 'riwayat' langsung dari DendaController agar data $riwayatDenda ikut dimuat
    return app(\App\Http\Controllers\DendaController::class)->riwayat();
})->name('denda.riwayat')->middleware('auth');

});

use App\Http\Controllers\OtpController; // Sesuaikan dengan controller Anda

// Pastikan kodenya seperti ini:
Route::post('/otp/send', [OtpController::class, 'send'])->name('otp.send');

// Contoh di routes/web.php
Route::get('/koleksi-abc', [BukuController::class, 'index'])->name('koleksi.abc');

Route::get('/koleksi-abc', [BukuController::class, 'index'])->name('koleksi.index');

// Route untuk Daftar Subjek
Route::get('/koleksi-subjek', [BukuController::class, 'subjek'])->name('koleksi.subjek');

// Route untuk Simpan Buku (tambah-buku)
Route::post('/buku', [BukuController::class, 'store'])->name('buku.store');

// Pastikan route ini menggunakan name('koleksi.abc')
Route::get('/koleksi-abc', [BukuController::class, 'index'])->name('koleksi.abc');

use App\Http\Controllers\PetugasDashboardController;

// Route Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

// Route Dashboard (Pastikan tidak ada redirect middleware yang memaksa ke '/dashboard')
Route::get('/admin/dashboard', [PetugasDashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

use App\Http\Controllers\DashboardController;

// Contoh di routes/web.php
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

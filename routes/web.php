<?php

use Illuminate\Support\Facades\Route;
use App\Models\Student;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PasswordController;


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

Route::match(['get', 'post'], '/reset-password', [PasswordController::class, 'update']);
// Untuk menampilkan form (GET)
Route::get('/reset-password', [PasswordController::class, 'showForm']);

// Untuk memproses data (POST)
Route::post('/reset-password', [PasswordController::class, 'update']);

// Gunakan titik (.) untuk memisahkan nama folder
Route::get('/riwayat-peminjaman', function () {
    return view('peminjaman.riwayat'); 
})->name('riwayat.index');

Route::get('/koleksi', [BukuController::class, 'index'])->name('koleksi.index');
Route::get('/koleksi/subjek', [BukuController::class, 'subjek'])->name('koleksi.subjek');
Route::get('/cari', [App\Http\Controllers\BukuController::class, 'searchGlobal'])->name('global.search');
// Tambahkan baris ini di routes/web.php
// Sesuaikan Controller dan Method-nya dengan yang Anda miliki
Route::get('/denda', [App\Http\Controllers\DendaController::class, 'index'])->name('denda');    
Route::get('/peminjaman/detail/{id}', [PeminjamanController::class, 'show'])->name('peminjaman.detail');

// Rute untuk menampilkan form (GET)
Route::get('/reset-password', [PasswordController::class, 'showForm'])->name('password.show');

// Rute untuk memproses form (POST)
// Pastikan namanya 'password.reset' agar sesuai dengan error yang muncul
Route::post('/reset-password', [PasswordController::class, 'update'])->name('password.reset');

Route::get('/riwayat-peminjaman', function () {
    // Simulasi data riwayat (Nantinya ini diambil dari Database/Model)
    $riwayat = [
        ['judul' => 'Pemrograman Laravel', 'tgl_pinjam' => '2026-06-01', 'tgl_kembali' => '2026-06-08', 'status' => 'Dikembalikan', 'denda' => 0],
        ['judul' => 'Basis Data Lanjut', 'tgl_pinjam' => '2026-06-02', 'tgl_kembali' => '-', 'status' => 'Dipinjam', 'denda' => 0],
    ];

    // Kirim variabel $riwayat ke view
    return view('peminjaman.riwayat', compact('riwayat')); 
})->name('riwayat.index');

// Tambahkan baris ini ke routes/web.php
// Sesuaikan PeminjamanController dengan nama controller yang Anda gunakan
Route::get('/peminjaman', [App\Http\Controllers\PeminjamanController::class, 'index'])->name('peminjaman.index');

// Pastikan juga rute untuk denda sudah ada agar tidak error lagi
Route::get('/denda', [App\Http\Controllers\DendaController::class, 'index'])->name('denda');

use App\Http\Controllers\DendaController; // Tambahkan ini di paling atas

Route::get('/denda', [DendaController::class, 'index'])->name('denda');

Route::get('/pinjaman-saya', [App\Http\Controllers\PeminjamanController::class, 'pinjamanSaya'])->name('pinjaman-saya');
Route::get('/peminjaman/detail/{id}', [App\Http\Controllers\PeminjamanController::class, 'show'])->name('peminjaman.detail');
// Menambahkan route untuk menu baru
Route::middleware(['auth', 'admin'])->group(function () {
    // Kelola Mahasiswa
    Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
    
    // Kelola Peminjaman
    Route::get('/peminjaman', [PeminjamanAdminController::class, 'index'])->name('peminjaman.admin');
    
    // Kelola Perpanjangan
    Route::get('/perpanjangan', [PerpanjanganController::class, 'index'])->name('perpanjangan.index');
    
    // Kelola Pengembalian
    Route::get('/pengembalian', [PengembalianController::class, 'index'])->name('pengembalian.index');
});

// Route untuk Pustakawan
Route::middleware(['auth', 'admin'])->group(function () {
    // ... route lainnya ...
    
    // Riwayat Denda
    Route::get('/denda/riwayat', [DendaController::class, 'riwayat'])->name('denda.riwayat');
    Route::get('/denda/riwayat/export', [DendaController::class, 'export'])->name('denda.riwayat.export');
});

use App\Http\Controllers\MahasiswaController;

Route::post('/admin/mahasiswa/store', [MahasiswaController::class, 'store'])->name('admin.store-mahasiswa');
Route::get('/admin/mahasiswa', [MahasiswaController::class, 'index'])->name('admin.mahasiswa');


// Halaman Login
Route::get('/login', [LoginController::class, 'index'])->name('login');

// Proses Login (Post)
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

// Route Dashboard (Pastikan dilindungi middleware auth)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::get('/koleksi', [BukuController::class, 'index'])->name('koleksi.index');
Route::post('/koleksi/store', [BukuController::class, 'store'])->name('buku.store');
Route::delete('/koleksi/hapus/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');
Route::get('/koleksi/subjek', [BukuController::class, 'subjek'])->name('koleksi.subjek');

// Pastikan route ini ada
Route::post('/koleksi/store', [BukuController::class, 'store'])->name('buku.store');

Route::get('/students', function () {
    $students = Student::all(); // Sekarang Laravel tahu Student itu dari App\Models\Student
    return $students; 
});
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman; // Pastikan model ini di-import

class PeminjamanController extends Controller
{
    public function pinjamanSaya()
    {
        // Jika data dari database, gunakan: $dataPinjaman = Peminjaman::all();
        $dataPinjaman = collect([
            (object)['id' => 1, 'judul' => 'Pemrograman PHP Modern', 'penulis' => 'Andi Offset', 'tgl_pinjam' => '2026-04-28', 'tgl_kembali' => '2026-05-05', 'status' => 'Berjalan'],
            (object)['id' => 2, 'judul' => 'Sistem Basis Data', 'penulis' => 'Rinaldi Munir', 'tgl_pinjam' => '2026-05-01', 'tgl_kembali' => '2026-05-08', 'status' => 'Berjalan'],
        ]);

        return view('pinjaman-saya', compact('dataPinjaman'));
    }

    // Gunakan fungsi show ini untuk detail
    public function show($id)
    {
        // Menggunakan model untuk mencari data
        $pinjaman = Peminjaman::findOrFail($id); 

        // Sesuaikan dengan letak file view Anda. 
        // Jika file ada di resources/views/peminjaman/detail.blade.php
        return view('peminjaman.detail', compact('pinjaman'));
    }
    public function detail($id)
{
    // Mengambil data peminjaman dari model
    $pinjaman = \App\Models\Peminjaman::findOrFail($id); 

    // Pastikan file view 'peminjaman-detail.blade.php' tersedia di folder resources/views/
    return view('peminjaman-detail', compact('pinjaman'));
}
    public function cetakPdf()
{
    // 1. Ambil data yang ingin dicetak
    $data = \App\Models\Peminjaman::all(); 

    // 2. Load library PDF (Contoh menggunakan barryvdh/laravel-dompdf)
    $pdf = \PDF::loadView('peminjaman.riwayat-pdf', compact('data'));

    // 3. Download atau tampilkan PDF
    return $pdf->download('riwayat-peminjaman.pdf');
}
    public function riwayat()
{
    // Ambil data dari database atau buat data dummy
    $riwayat = [
        ['judul' => 'Pemrograman PHP', 'tgl_pinjam' => '2026-05-01', 'tgl_kembali' => '2026-05-08', 'status' => 'Dikembalikan', 'denda' => 0],
        // Tambahkan data lainnya di sini
    ];

    return view('peminjaman.riwayat', compact('riwayat'));
}
}
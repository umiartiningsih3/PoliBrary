<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman; // Pastikan model ini di-import

class PeminjamanController extends Controller
{
    public function pinjamanSaya()
{
    $dataPinjaman = Peminjaman::with('buku')
        ->where('user_id', auth()->id())
        ->get();

    return view('pinjaman-saya', compact('dataPinjaman'));
}

    // Gunakan fungsi show ini untuk detail
    public function show($id)
    {
        // Menggunakan model untuk mencari data
        $pinjaman = Peminjaman::findOrFail($id); 

        // Sesuaikan dengan letak file view Anda. 
        // Jika file ada di resources/views/peminjaman/detail.blade.php
        return view('peminjaman.peminjaman', compact('pinjaman'));
    }
    public function detail($id)
{
    $pinjaman = Peminjaman::with('buku')
        ->findOrFail($id);

    return view('peminjaman.peminjaman', compact('pinjaman'));
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

    public function kembalikan($id)
{
    $pinjaman = Peminjaman::findOrFail($id);

    $pinjaman->update([
        'status' => 'Dikembalikan'
    ]);

    return redirect()
        ->route('pinjaman-saya')
        ->with('success', 'Buku berhasil dikembalikan');
}

    public function perpanjang($id)
{
    $pinjaman = Peminjaman::findOrFail($id);

    if ($pinjaman->jumlah_perpanjangan >= 2) {
        return back()->with('error', 'Maksimal perpanjangan 2 kali');
    }

    $pinjaman->update([
        'tgl_jatuh_tempo' => Carbon::parse($pinjaman->tgl_jatuh_tempo)->addDays(7),
        'jumlah_perpanjangan' => $pinjaman->jumlah_perpanjangan + 1
    ]);

    return back()->with('success', 'Pinjaman berhasil diperpanjang');
}
}
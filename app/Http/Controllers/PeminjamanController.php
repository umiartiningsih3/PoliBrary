<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
// use App\Models\Peminjaman; // Pastikan model Anda sudah ada

class PeminjamanController extends Controller
{
    public function pinjamanSaya()
{
    // Simulasi data untuk "Pinjaman Saya" (buku yang sedang dipinjam)
    $dataPinjaman = [
        (object)['id' => 1, 'judul' => 'Pemrograman PHP Modern', 'penulis' => 'Andi Offset', 'tgl_pinjam' => '2026-04-28', 'tgl_kembali' => '2026-05-05', 'status' => 'Berjalan'],
        (object)['id' => 2, 'judul' => 'Sistem Basis Data', 'penulis' => 'Rinaldi Munir', 'tgl_pinjam' => '2026-05-01', 'tgl_kembali' => '2026-05-08', 'status' => 'Berjalan'],
    ];

    return view('pinjaman-saya', compact('dataPinjaman'));
}

    public function exportPdf()
    {
        $riwayat = [ /* Ambil data yang sama seperti di index */ ];
        
        $pdf = Pdf::loadView('peminjaman.riwayat_pdf', compact('riwayat'));
        return $pdf->download('Riwayat_Peminjaman_Umiarti.pdf');
    }
    public function show($id) 
{
    // Simulasi data detail berdasarkan ID
    $dataPeminjaman = (object)['id' => $id, 'judul' => 'Buku Terpilih']; 
    return view('peminjaman.detail', compact('dataPeminjaman'));
}
}
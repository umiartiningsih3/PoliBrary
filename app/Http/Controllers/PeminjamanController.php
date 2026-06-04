<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
// use App\Models\Peminjaman; // Pastikan model Anda sudah ada

class PeminjamanController extends Controller
{
    public function index()
    {
        // Simulasi data untuk keperluan PBL Digital Library
        $riwayat = [
            [
                'judul' => 'Introduction to Algorithms',
                'tgl_pinjam' => '2026-04-12',
                'tgl_kembali' => '2026-04-19',
                'status' => 'Dikembalikan',
                'denda' => 0
            ],
            [
                'judul' => 'Clean Code',
                'tgl_pinjam' => '2026-05-01',
                'tgl_kembali' => '2026-05-10',
                'status' => 'Terlambat',
                'denda' => 6000
            ],
        ];

        return view('peminjaman.riwayat', compact('riwayat'));
    }

    public function exportPdf()
    {
        $riwayat = [ /* Ambil data yang sama seperti di index */ ];
        
        $pdf = Pdf::loadView('peminjaman.riwayat_pdf', compact('riwayat'));
        return $pdf->download('Riwayat_Peminjaman_Umiarti.pdf');
    }
    public function show($id) {
    // Logika untuk mengambil data peminjaman berdasarkan $id
    return view('peminjaman.detail', compact('dataPeminjaman'));
}
}
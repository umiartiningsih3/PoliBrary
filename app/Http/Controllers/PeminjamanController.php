<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

    // Tambahkan 'use' di bagian atas file controller Anda
use Illuminate\Support\Collection;

class PeminjamanController extends Controller
{

public function pinjamanSaya()
{
    // Ubah array biasa menjadi collect()
    $dataPinjaman = collect([
        (object)['id' => 1, 'judul' => 'Pemrograman PHP Modern', 'penulis' => 'Andi Offset', 'tgl_pinjam' => '2026-04-28', 'tgl_kembali' => '2026-05-05', 'status' => 'Berjalan'],
        (object)['id' => 2, 'judul' => 'Sistem Basis Data', 'penulis' => 'Rinaldi Munir', 'tgl_pinjam' => '2026-05-01', 'tgl_kembali' => '2026-05-08', 'status' => 'Berjalan'],
    ]);

    return view('pinjaman-saya', compact('dataPinjaman'));
}

    public function show($id) 
    {
        $dataPeminjaman = (object)['id' => $id, 'judul' => 'Detail Buku'];
        return view('peminjaman.detail', compact('dataPeminjaman'));
    }
}
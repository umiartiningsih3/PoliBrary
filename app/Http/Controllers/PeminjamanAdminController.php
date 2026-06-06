<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeminjamanAdminController extends Controller
{
    public function index()
{
    // Mengambil data peminjaman yang statusnya 'pending' atau 'requested'
    // Pastikan relasi 'mahasiswa' dan 'buku' sudah didefinisikan di Model Peminjaman
    $peminjamans = \App\Models\Peminjaman::where('status', 'perpanjangan_diajukan')->get();
    
    return view('admin.peminjaman', compact('peminjamans'));
}
}
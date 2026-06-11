<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman; // Pastikan Model yang dibutuhkan diimport

class PengembalianController extends Controller
{
    public function index()
{
    // Mengambil data peminjaman yang statusnya 'dipinjam' 
    // dan memuat (eager loading) data mahasiswa & buku agar tidak error di view
    $peminjaman = \App\Models\Peminjaman::where('status', 'dipinjam')
                    ->with(['mahasiswa', 'buku'])
                    ->get();
    
    // MENGIRIMKAN DATA MELALUI COMPACT
    return view('admin.pengembalian.index', compact('peminjaman'));

}
}
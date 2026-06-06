<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PerpanjanganController extends Controller
{
    public function index()
    {
        // Hanya ambil data yang statusnya 'perpanjangan_diajukan'
        $perpanjangans = Peminjaman::with(['mahasiswa', 'buku'])
                            ->where('status', 'perpanjangan_diajukan')
                            ->get();

        return view('admin.perpanjangan.index', compact('perpanjangans'));
    }

    public function approve($id)
    {
        $pinjam = Peminjaman::findOrFail($id);
        // Logika update: tambah 7 hari dan ubah status
        $pinjam->update([
            'status' => 'dipinjam', // atau status lain sesuai alurmu
            'tgl_jatuh_tempo' => \Carbon\Carbon::parse($pinjam->tgl_jatuh_tempo)->addDays(7)
        ]);
        
        return back()->with('success', 'Perpanjangan disetujui!');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PetugasDashboardController extends Controller
{
    public function index()
    {
        $data = [
            'buku_terpinjam' => Peminjaman::where('status', 'dipinjam')->count(),
            'buku_terlambat' => Peminjaman::where('status', 'dipinjam')
                                          ->where('tgl_jatuh_tempo', '<', now())->count(),
            'menunggu_persetujuan' => Peminjaman::where('status', 'menunggu')->count(),
            'menunggu_perpanjangan' => Peminjaman::where('status', 'perpanjangan')->count(),
            'konfirmasi_pengembalian' => Peminjaman::where('status', 'kembali')->count(),
            'total_denda_bulan_ini' => DB::table('dendas')
                                          ->whereMonth('created_at', now()->month)
                                          ->sum('jumlah_denda'),
            'buku_terpopuler' => Buku::withCount('peminjaman')
                                     ->orderBy('peminjaman_count', 'desc')
                                     ->limit(5)->get(),
        ];

        return view('admin.dashboard', compact('data'));
    }
}
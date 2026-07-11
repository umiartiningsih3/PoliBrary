<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\Denda;
use App\Models\Perpanjangan;

class PetugasDashboardController extends Controller
{
    public function index()
    {

        // Statistik kategori buku berdasarkan jumlah peminjaman
        $kategori_populer = DB::table('buku')
            ->join('peminjaman', 'buku.id', '=', 'peminjaman.buku_id')
            ->select(
                'buku.kategori',
                DB::raw('COUNT(peminjaman.id) as total')
            )
            ->groupBy('buku.kategori')
            ->orderByDesc('total')
            ->limit(5)
            ->get();


        $data = [

            // Buku yang sedang dipinjam
            'buku_terpinjam' =>
                Peminjaman::where('status', 'Dipinjam')
                ->count(),


            // Buku yang melewati jatuh tempo
            'buku_terlambat' =>
                Peminjaman::where('status', 'Dipinjam')
                ->where('tgl_jatuh_tempo', '<', now())
                ->count(),


            // Menunggu persetujuan petugas
            'menunggu_persetujuan' =>
                Peminjaman::where('status', 'Menunggu Konfirmasi')
                ->count(),


            // Menunggu petugas menerima pengembalian
            'konfirmasi_pengembalian' =>
                Peminjaman::where('status', 'Menunggu Pengembalian')
                ->count(),


            // Permintaan perpanjangan buku
            'menunggu_perpanjangan' =>
                Perpanjangan::where('status', 'menunggu')
                ->count(),


            // Total denda bulan berjalan
            'total_denda_bulan_ini' =>
                Denda::whereMonth(
                    'created_at',
                    now()->month
                )
                ->sum('jumlah_denda'),


            // Buku terpopuler
            'buku_terpopuler' =>
                Buku::withCount('peminjaman')
                ->orderByDesc('peminjaman_count')
                ->limit(5)
                ->get(),


            // Data chart kategori
            'kategori_populer' =>
                $kategori_populer

        ];


        return view(
            'admin.dashboard',
            compact('data')
        );

    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\User;
use App\Models\Peminjaman;
use App\Models\Visitor;

class HomeController extends Controller
{
    public function index()
    {

        // jumlah buku berdasarkan kategori
        $kategori = Buku::select('kategori')
            ->selectRaw('COUNT(*) as jumlah')
            ->groupBy('kategori')
            ->get();



        // jumlah mahasiswa berdasarkan prodi
        $mahasiswa = User::select('prodi')
            ->selectRaw('COUNT(*) as jumlah')
            ->whereRaw("LOWER(tipe_keanggotaan) = 'mahasiswa'")
            ->whereNotNull('prodi')
            ->groupBy('prodi')
            ->get();



        // buku populer berdasarkan jumlah peminjaman
        $bukuPopuler = Buku::withCount('peminjaman')
            ->orderByDesc('peminjaman_count')
            ->take(10)
            ->get();



        // ==========================
        // STATISTIK PERPUSTAKAAN
        // ==========================


        // total koleksi buku
        $totalBuku = Buku::count();



        // anggota aktif
        $anggotaAktif = User::whereRaw(
            "LOWER(tipe_keanggotaan) = 'mahasiswa'"
        )->count();


        // simpan pengunjung hari ini

$today = now()->format('Y-m-d');

$cekVisitor = Visitor::where('ip_address', request()->ip())
    ->where('visit_date', $today)
    ->first();


if (!$cekVisitor) {

    Visitor::create([
        'ip_address' => request()->ip(),
        'visit_date' => $today
    ]);

}


        // jumlah pengunjung
        $jumlahPengunjung = Visitor::count();



        return view('home', compact(
            'kategori',
            'mahasiswa',
            'bukuPopuler',
            'totalBuku',
            'anggotaAktif',
            'jumlahPengunjung'
        ));

    }
}
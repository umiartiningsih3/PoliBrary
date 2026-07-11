<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Peminjaman;
use App\Models\Buku;
use App\Models\Denda;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Target membaca
        $target = 10;

        // Jumlah buku yang sudah dikonfirmasi dipinjam
$selesai = Peminjaman::where('user_id', $user->id)
    ->whereIn('status', ['dipinjam', 'dikembalikan'])
    ->count();


// Persentase progress membaca
$progress = $target > 0 
    ? min(100, ($selesai / $target) * 100) 
    : 0;


        // Jumlah buku terlambat
        $jumlah_terlambat = Peminjaman::where('user_id', $user->id)
            ->where('status', 'dipinjam')
            ->whereDate('tgl_jatuh_tempo', '<', now())
            ->count();


        $data = [

            // ==========================
            // PEMINJAMAN AKTIF
            // ==========================
            'peminjaman_aktif' => Peminjaman::where('user_id', $user->id)
                ->where('status', 'dipinjam')
                ->get(),


            // ==========================
            // RIWAYAT PEMINJAMAN
            // ==========================
            'riwayat' => Peminjaman::where('user_id', $user->id)
                ->latest()
                ->take(5)
                ->get(),


            // ==========================
            // STATISTIK
            // ==========================
            'jumlah_peminjaman' => Peminjaman::where('user_id', $user->id)
                ->where('status', 'dipinjam')
                ->count(),

            'jumlah_terlambat' => $jumlah_terlambat,

            'total_koleksi' => Buku::count(),

            'total_denda' => Denda::where('user_id', $user->id)
                ->where('status', 'belum_bayar')
                ->sum('jumlah_denda'),



            // ==========================
            // BUKU REKOMENDASI
            // ==========================
            'rekomendasi' => Buku::leftJoin(
                    'peminjaman', 
                    'buku.id', 
                    '=', 
                    'peminjaman.buku_id'
                )
                ->select(
                    'buku.*',
                    DB::raw('COUNT(peminjaman.id) as total_pinjam')
                )
                ->groupBy(
                    'buku.id',
                    'buku.judul',
                    'buku.penulis',
                    'buku.penerbit',
                    'buku.tahun_terbit',
                    'buku.kategori',
                    'buku.sub_kategori',
                    'buku.no_inventaris',
                    'buku.deskripsi',
                    'buku.jumlah_eksemplar',
                    'buku.cover_image',
                    'buku.created_at',
                    'buku.updated_at'
                )
                ->orderByDesc('total_pinjam')
                ->take(4)
                ->get(),



            // ==========================
            // BUKU TERBARU
            // ==========================
            'terbaru' => Buku::latest()
                ->take(5)
                ->get(),



            // ==========================
            // JUMLAH BUKU BARU 7 HARI
            // ==========================
            'jumlah_buku_baru' => Buku::where(
                    'created_at', 
                    '>=', 
                    Carbon::now()->subDays(7)
                )
                ->count(),



            // ==========================
            // TARGET MEMBACA
            // ==========================
            'target' => $target,

            'selesai' => $selesai,

            'progress' => round($progress),



            // ==========================
            // JATUH TEMPO TERDEKAT
            // ==========================
            'jatuh_tempo' => Peminjaman::with('buku')
                ->where('user_id', $user->id)
                ->where('status', 'dipinjam')
                ->orderBy('tgl_jatuh_tempo')
                ->first(),



            // ==========================
            // AKTIVITAS TERBARU
            // ==========================
            'aktivitas' => Peminjaman::with('buku')
                ->where('user_id', $user->id)
                ->where(
                    'updated_at',
                    '>=',
                    Carbon::now()->subDays(7)
                )
                ->orderByDesc('updated_at')
                ->get(),

        ];


        return view('dashboard', $data);
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\User;
use App\Models\Peminjaman;
use App\Models\Perpanjangan;
use App\Models\Denda;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $keyword = trim($request->q);

        if (empty($keyword)) {
            return redirect()->back()->with('error', 'Masukkan kata kunci pencarian.');
        }

        // Cari Buku
        $buku = Buku::where('judul', 'like', "%{$keyword}%")
    ->orWhere('penulis', 'like', "%{$keyword}%")
    ->orWhere('kategori', 'like', "%{$keyword}%")
    ->orWhere('sub_kategori', 'like', "%{$keyword}%")
    ->orWhere('isbn', 'like', "%{$keyword}%")
    ->get();

        $users = User::where('name', 'like', "%{$keyword}%")
    ->orWhere('email', 'like', "%{$keyword}%")
    ->orWhere('nim', 'like', "%{$keyword}%")
    ->orWhere('prodi', 'like', "%{$keyword}%")
    ->get();

        // Cari Peminjaman
        $peminjaman = Peminjaman::with(['user', 'buku'])
            ->where('status', 'like', "%{$keyword}%")
            ->get();

        // Cari Perpanjangan
        $perpanjangan = Perpanjangan::query()->get();

        // Cari Pengembalian
       // $pengembalian = Pengembalian::query()->get();

        // Cari Denda
        $denda = Denda::query()->get();

        return view('search.index', compact(
            'keyword',
            'buku',
            'users',
            'peminjaman',
            'perpanjangan',
            'denda'
        ));
    }

    public function live(Request $request)
{
    $keyword = $request->q;

    $buku = Buku::where('judul', 'like', "%{$keyword}%")
        ->orWhere('penulis', 'like', "%{$keyword}%")
        ->limit(10)
        ->get();

    return response()->json($buku);
}
}
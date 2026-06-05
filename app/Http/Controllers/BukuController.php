<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $semuaBuku = Buku::all();
        return view('koleksi', compact('semuaBuku'));
    }

    public function store(Request $request)
{
    $data = $request->validate([
        'judul' => 'required',
        'isbn' => 'required|unique:buku',
        'penulis' => 'required',
        'penerbit' => 'required',
        'tahun_terbit' => 'required',
        'kategori' => 'required',
        'sub_kategori' => 'required',
        'jumlah_eksemplar' => 'required|integer',
        // 'nomor_inventaris' biasanya digenerate otomatis
    ]);

    // Contoh generate nomor inventaris otomatis (INV + timestamp)
    $data['nomor_inventaris'] = 'INV-' . time();

    Buku::create($data);
    return redirect()->route('koleksi.index')->with('success', 'Buku berhasil disimpan!');
}

    public function subjek(Request $request)
{
    // Mengambil data unik subjek dan jumlahnya
    $subjek = \App\Models\Buku::select('kategori', \DB::raw('count(*) as jumlah'))
                ->groupBy('kategori')
                ->get();

    // Jika ada request kategori, ambil sub-kategorinya
    $subkategori = [];
    $buku = [];
    if ($request->has('kategori')) {
        $subkategori = \App\Models\Buku::where('kategori', $request->kategori)
                        ->select('sub_kategori', \DB::raw('count(*) as jumlah'))
                        ->groupBy('sub_kategori')
                        ->get();
        
        $buku = \App\Models\Buku::where('kategori', $request->kategori)
                        ->when($request->sub_kategori, function($q) use ($request) {
                            return $q->where('sub_kategori', $request->sub_kategori);
                        })->get();
    }

    return view('koleksi', compact('subjek', 'subkategori', 'buku'));
}

    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();
        return redirect()->route('koleksi.index')->with('success', 'Buku berhasil dihapus!');
    }
}
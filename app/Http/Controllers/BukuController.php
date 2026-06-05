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
    dd($request->all());
    // Pastikan key-nya adalah 'judul' (bukan 'judul_buku')
    // jika di form HTML name-nya adalah name="judul"
    $data = $request->validate([
        'judul' => 'required',
        'isbn' => 'required',
        'penulis' => 'required',
        'penerbit' => 'required',
        'tahun_terbit' => 'required',
        'kategori' => 'required',
        'sub_kategori' => 'required',
        'jumlah_eksemplar' => 'required|integer',
        'deskripsi' => 'nullable',
        'sampul' => 'nullable|image'
    ]);

    // Tambahkan no_inventaris ke dalam array data
    $data['no_inventaris'] = 'INV-' . time();

    // Tambahkan logika upload sampul jika ada
    if ($request->hasFile('sampul')) {
        $data['sampul'] = $request->file('sampul')->store('covers', 'public');
    }

    Buku::create($data);
    return redirect()->route('koleksi.index')->with('success', 'Buku berhasil disimpan!');
}
    public function subjek(Request $request)
    {
        $subjek = \App\Models\Buku::select('kategori', \DB::raw('count(*) as jumlah'))
                    ->groupBy('kategori')
                    ->get();

        return view('koleksi', compact('subjek'));
    }

    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();
        return redirect()->route('koleksi.index')->with('success', 'Buku berhasil dihapus!');
    }
}
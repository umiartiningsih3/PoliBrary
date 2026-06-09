<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
{
    // Mengambil semua data buku dari database
    $semuaBuku = \App\Models\Buku::all();

    // Menghitung jumlah per subjek (kategori)
    $subjekSidebar = \App\Models\Buku::select('kategori as subjek', \DB::raw('count(*) as jumlah'))
                        ->groupBy('kategori')
                        ->get();

    return view('koleksi-abc', compact('semuaBuku', 'subjekSidebar'));
}

    public function store(Request $request)
{
    // dd($request->all());
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

    if ($request->hasFile('sampul')) {
    // Ini akan menyimpan path seperti: "covers/nama-file.jpg"
    $data['sampul'] = $request->file('sampul')->store('covers', 'public');
}

    Buku::create($data);
    return redirect()->route('koleksi.abc')->with('success', 'Buku berhasil disimpan!');
}
    public function subjek(Request $request)
{
    $subjek = \App\Models\Buku::select('kategori', \DB::raw('count(*) as jumlah'))
                ->groupBy('kategori')
                ->get();

    // Pastikan nama view sesuai dengan nama file di folder resources/views/
    return view('koleksi-subjek', compact('subjek')); 
}

    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();
        return redirect()->route('koleksi.abc')->with('success', 'Buku berhasil dihapus!');
    }
}
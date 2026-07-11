<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
{
    $semuaBuku = \App\Models\Buku::all()->map(function ($buku) {
        $buku->tersedia = $buku->jumlah_eksemplar;
        return $buku;
    });

    $subjekSidebar = \App\Models\Buku::select(
            'kategori as subjek',
            \DB::raw('count(*) as jumlah')
        )
        ->groupBy('kategori')
        ->get();

    return view('koleksi-abc', compact(
        'semuaBuku',
        'subjekSidebar'
    ));
}

    // Halaman data buku petugas
    public function dataBuku()
    {
        $buku = Buku::latest()->get();

        return view('admin.buku.index', compact('buku'));
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
    return redirect()
    ->route('admin.buku.index')
    ->with('success', 'Buku berhasil disimpan!');
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

    return redirect()
        ->route('admin.buku.index')
        ->with('success', 'Buku berhasil dihapus!');
}

    public function edit($id)
{
    $buku = Buku::findOrFail($id);

    return view('admin.buku.edit', compact('buku'));
}

    public function update(Request $request, $id)
{
    $buku = Buku::findOrFail($id);

    $request->validate([
        'judul' => 'required',
        'isbn' => 'required',
        'penulis' => 'required',
        'penerbit' => 'required',
        'tahun_terbit' => 'required',
        'kategori' => 'required',
        'sub_kategori' => 'required',
        'jumlah_eksemplar' => 'required',
    ]);


    $data = [
        'judul' => $request->judul,
        'isbn' => $request->isbn,
        'penulis' => $request->penulis,
        'penerbit' => $request->penerbit,
        'tahun_terbit' => $request->tahun_terbit,
        'kategori' => $request->kategori,
        'sub_kategori' => $request->sub_kategori,
        'nomor_rak' => $request->nomor_rak,
        'deskripsi' => $request->deskripsi,
        'jumlah_eksemplar' => $request->jumlah_eksemplar,
    ];


    if($request->hasFile('sampul')){

        $path = $request->file('sampul')
            ->store('sampul','public');

        $data['sampul'] = $path;
    }


    $buku->update($data);


    return redirect()
        ->route('admin.buku.index')
        ->with('success','Data buku berhasil diperbarui');
}
}
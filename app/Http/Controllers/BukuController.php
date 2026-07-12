<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    public function index()
    {
        $semuaBuku = Buku::all()->map(function ($buku) {
            $buku->tersedia = $buku->jumlah_eksemplar;
            return $buku;
        });

        $subjekSidebar = Buku::select(
                'kategori as subjek',
                DB::raw('count(*) as jumlah')
            )
            ->groupBy('kategori')
            ->get();

        return view('koleksi-abc', compact(
            'semuaBuku',
            'subjekSidebar'
        ));
    }

    // ==========================
    // HALAMAN DATA BUKU PETUGAS
    // ==========================
    public function dataBuku(Request $request)
    {
        $perPage = $request->get('per_page', 10);

        $query = Buku::query();

        // Search
        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('judul', 'like', "%{$search}%")
                    ->orWhere('penulis', 'like', "%{$search}%")
                    ->orWhere('isbn', 'like', "%{$search}%");

            });
        }

        $buku = $query
            ->latest()
            ->paginate($perPage)
            ->withQueryString();

        // Statistik
        $totalJudul = Buku::count();

        $totalStok = Buku::sum('jumlah_eksemplar');

        $bukuTerbaru = Buku::latest()->first();

        return view('admin.buku.index', compact(
            'buku',
            'totalJudul',
            'totalStok',
            'bukuTerbaru'
        ));
    }

    // ==========================
    // SIMPAN BUKU
    // ==========================
    public function store(Request $request)
    {
        $data = $request->validate([

            'judul' => 'required',
            'isbn' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
            'bahasa' => 'required',
            'jumlah_halaman' => 'required|integer|min:1',
            'kategori' => 'required',
            'sub_kategori' => 'required',
            'nomor_rak' => 'required',
            'jumlah_eksemplar' => 'required|integer',
            'deskripsi' => 'nullable',
            'sampul' => 'nullable|image'

        ]);

        // Nomor Inventaris Otomatis
        $data['no_inventaris'] = 'INV-' . time();

        if ($request->hasFile('sampul')) {

            $data['sampul'] = $request->file('sampul')
                ->store('covers', 'public');
        }

        Buku::create($data);

        return redirect()
            ->route('admin.buku.index')
            ->with('success', 'Buku berhasil disimpan!');
    }

    // ==========================
    // HALAMAN SUBJEK
    // ==========================
    public function subjek()
    {
        $subjek = Buku::select(
                'kategori',
                DB::raw('count(*) as jumlah')
            )
            ->groupBy('kategori')
            ->get();

        return view('koleksi-subjek', compact('subjek'));
    }

    // ==========================
    // EDIT
    // ==========================
    public function edit($id)
    {
        $buku = Buku::findOrFail($id);

        return view('admin.buku.edit', compact('buku'));
    }

    // ==========================
    // UPDATE
    // ==========================
    public function update(Request $request, $id)
{
    $buku = Buku::findOrFail($id);

    $request->validate([
        'judul' => 'required|max:255',
        'isbn' => 'required|max:255|unique:buku,isbn,' . $buku->id,
        'penulis' => 'required|max:255',
        'penerbit' => 'required|max:255',
        'tahun_terbit' => 'required|numeric',
        'kategori' => 'required',
        'sub_kategori' => 'required',
        'nomor_rak' => 'nullable|max:100',
        'bahasa' => 'required|max:100',
        'jumlah_halaman' => 'required|integer|min:1',
        'jumlah_eksemplar' => 'required|integer|min:1',
        'deskripsi' => 'nullable',
        'sampul' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $data = $request->except('sampul');

    if ($request->hasFile('sampul')) {

        if ($buku->sampul && Storage::disk('public')->exists($buku->sampul)) {
            Storage::disk('public')->delete($buku->sampul);
        }

        $data['sampul'] = $request->file('sampul')
            ->store('covers', 'public');
    }

    $buku->update($data);

    return redirect()
        ->route('admin.buku.index')
        ->with('success', 'Data buku berhasil diperbarui.');
}

    // ==========================
    // HAPUS
    // ==========================
    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);

        $buku->delete();

        return redirect()
            ->route('admin.buku.index')
            ->with('success', 'Buku berhasil dihapus!');
    }
}
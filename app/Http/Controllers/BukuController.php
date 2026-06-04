<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BukuController extends Controller
{
    // Data dummy yang bisa diakses di semua fungsi di controller ini
    private function getDataBuku() {
        return [
            ['id' => 1, 'judul' => 'Belajar Laravel', 'penulis' => 'Umiarti Ningsih', 'subjek' => 'Teknologi & Komputer', 'subKategori' => 'Tutorial'],
            ['id' => 2, 'judul' => 'Kisah Klasik', 'penulis' => 'Budi Santoso', 'subjek' => 'Fiksi', 'subKategori' => 'Novel'],
        ];
    }

    public function index()
    {
        return view('koleksi-abc'); 
    }

    public function subjek() 
    {
        $semuaBuku = $this->getDataBuku();
        return view('koleksi', compact('semuaBuku'));
    }

    public function searchGlobal(Request $request)
    {
        $query = strtolower($request->input('q'));
        $semuaBuku = $this->getDataBuku();

        // Mencari di dalam array
        $hasilBuku = array_filter($semuaBuku, function($buku) use ($query) {
            return str_contains(strtolower($buku['judul']), $query) || 
                   str_contains(strtolower($buku['penulis']), $query);
        });

        // Mengirim hasil ke view
        return view('hasil-pencarian', compact('hasilBuku', 'query'));
    }
}
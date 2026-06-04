<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        return view('koleksi-abc'); 
    }

    public function subjek() 
    {
        // Tanpa memanggil Model Buku::all() agar tidak error
        $semuaBuku = [
            ['id' => 1, 'judul' => 'Belajar Laravel', 'subjek' => 'Teknologi & Komputer', 'subKategori' => 'Tutorial'],
            ['id' => 2, 'judul' => 'Kisah Klasik', 'subjek' => 'Fiksi', 'subKategori' => 'Novel'],
        ];
        
        return view('koleksi', compact('semuaBuku'));
    }
}
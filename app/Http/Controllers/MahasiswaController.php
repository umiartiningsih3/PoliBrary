<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MahasiswaController extends Controller
{
    public function index()
{
    // Mengambil semua data user. Jika ingin hanya mahasiswa, 
    // Anda bisa tambahkan filter ->where('role', 'mahasiswa')
    $mahasiswas = \App\Models\User::all(); 
    
    return view('admin.mahasiswa', compact('mahasiswas'));
}
    // Method untuk menyimpan data mahasiswa baru
    public function store(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'nama'     => 'required|string|max:255',
            'nim'      => 'required|unique:users,nim|max:20',
            'prodi'    => 'required',
            // Default password, misalnya nim atau password standar
            'password' => 'nullable|min:6', 
        ]);

        // 2. Simpan ke Database
        User::create([
            'name'            => $request->nama,
            'nim'             => $request->nim,
            'prodi'           => $request->prodi,
            'password'        => $request->password ?? 'password123', // Password default jika tidak diisi
            'tgl_daftar'      => $request->tgl_daftar, // Pastikan field ini ada di tabel users/students
            // Tambahkan field lainnya jika ada
        ]);

        // 3. Redirect dengan pesan sukses
        return redirect()->route('admin.mahasiswa')->with('success', 'Anggota baru berhasil didaftarkan!');
    }
}
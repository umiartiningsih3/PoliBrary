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
    
    public function store(Request $request)
{
    // 1. Validasi input
    $request->validate([
        'nama'  => 'required|string',
        'nim'   => 'required|unique:users,nim',
        'prodi' => 'required',
        // Tambahkan input tipe_keanggotaan di form jika belum ada
        'tipe_keanggotaan' => 'required|in:mahasiswa,dosen', 
    ]);

    // 2. Logika Email Otomatis
    // Ambil nama depan (sebelum spasi pertama) dan jadikan huruf kecil
    $firstName = strtolower(explode(' ', trim($request->nama))[0]);
    
    // Tentukan domain berdasarkan tipe_keanggotaan
    $domain = ($request->tipe_keanggotaan === 'mahasiswa') 
              ? '@students.polibatam.ac.id' 
              : '@polibatam.ac.id';
    
    $emailOtomatis = $firstName . '.' . $request->nim . $domain;

    // 3. Simpan ke Database
    \App\Models\User::create([
        'name'             => $request->nama,
        'nim'              => $request->nim,
        'email'            => $emailOtomatis,
        'prodi'            => $request->prodi,
        'tipe_keanggotaan' => $request->tipe_keanggotaan,
        'password'         => Hash::make('password123'), // Default password
        'tgl_daftar'       => $request->tgl_daftar,
    ]);

    return redirect()->route('admin.mahasiswa')->with('success', 'Anggota berhasil didaftarkan dengan email: ' . $emailOtomatis);
}
}
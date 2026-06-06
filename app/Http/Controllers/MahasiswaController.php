<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MahasiswaController extends Controller
{
    public function index()
{
    // Coba tambahkan dd di sini untuk memastikan data ada
    $mahasiswas = \App\Models\User::where('tipe_keanggotaan', 'mahasiswa')->get();
    
    // Debug: Cek apakah ID ada di koleksi data
    // dd($mahasiswas->first()->id); 
    
    return view('admin.mahasiswa.index', compact('mahasiswas'));
}

    public function create()
{
    return view('admin.mahasiswa.create'); // Pastikan file blade-nya ada di resources/views/admin/mahasiswa/create.blade.php
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

    public function destroy($id)
{
    // Jika masih error 405, hapus komentar di bawah ini untuk melihat apakah ID masuk
    // dd($id); 

    $mahasiswa = \App\Models\User::findOrFail($id);
    $mahasiswa->delete();

    return redirect()->route('admin.mahasiswa')->with('success', 'Data berhasil dihapus!');
}

public function edit($id)
{
    $mahasiswa = \App\Models\User::findOrFail($id);
    return view('admin.mahasiswa.edit', compact('mahasiswa'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'nim'  => 'required',
        'prodi'=> 'required',
    ]);

    $mahasiswa = \App\Models\User::findOrFail($id);
    $mahasiswa->update($request->all());

    return redirect()->route('admin.mahasiswa')->with('success', 'Data berhasil diupdate!');
}
}
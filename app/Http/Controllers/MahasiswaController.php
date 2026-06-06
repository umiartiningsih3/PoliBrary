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
    
    public function store(Request $request)
{
    // 1. Validasi input
    $request->validate([
        'nama'  => 'required|string|max:255',
        'nim'   => 'required|string|unique:users,nim', // Pastikan kolom di DB adalah 'nim'
        'prodi' => 'required|string',
        'tipe_keanggotaan' => 'required|in:mahasiswa,dosen', 
    ]);

    // 2. Logika Email Otomatis
    // Ambil nama depan saja, hilangkan spasi, dan jadikan huruf kecil
    $firstName = strtolower(preg_replace('/[^a-zA-Z]/', '', explode(' ', trim($request->nama))[0]));
    
    // Tentukan domain berdasarkan tipe_keanggotaan
    $domain = ($request->tipe_keanggotaan === 'mahasiswa') 
              ? '@students.polibatam.ac.id' 
              : '@polibatam.ac.id';
    
    $emailOtomatis = $firstName . '.' . $request->nim . $domain;

    // 3. Simpan ke Database
    // Menggunakan NIM sebagai password awal
    \App\Models\User::create([
        'name'             => $request->nama,
        'nim'              => $request->nim,
        'email'            => $emailOtomatis,
        'prodi'            => $request->prodi,
        'tipe_keanggotaan' => $request->tipe_keanggotaan,
        'password'         => Hash::make($request->nim), // NIM sebagai password
        // Hapus 'tgl_daftar' jika kolom tersebut tidak ada di tabel users
        // 'tgl_daftar' => $request->tgl_daftar, 
    ]);

    return redirect()->route('admin.mahasiswa')->with('success', 'Anggota berhasil didaftarkan! Email: ' . $emailOtomatis . ' (Password: NIM)');
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

    public function create()
    {
        return view('admin.mahasiswa.register');
    }
}
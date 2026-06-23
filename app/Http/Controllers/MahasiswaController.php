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
    try {

        \DB::beginTransaction();

        // Ambil semua peminjaman mahasiswa
        $peminjaman = \App\Models\Peminjaman::where('user_id', $id)->get();

        foreach ($peminjaman as $item) {

            // hapus denda terkait
            if (\Schema::hasTable('dendas')) {
                \DB::table('dendas')
                    ->where('peminjaman_id', $item->id)
                    ->delete();
            }

            // hapus perpanjangan terkait
            if (\Schema::hasTable('perpanjangans')) {
                \DB::table('perpanjangans')
                    ->where('peminjaman_id', $item->id)
                    ->delete();
            }

            // hapus peminjaman
            $item->delete();
        }


        // hapus user mahasiswa
        $mahasiswa = \App\Models\User::findOrFail($id);
        $mahasiswa->delete();


        \DB::commit();


        return redirect()
            ->route('mahasiswa.index')
            ->with(
                'success',
                'Data mahasiswa berhasil dihapus'
            );


    } catch (\Exception $e) {

        \DB::rollBack();

        return back()->with(
            'error',
            'Gagal menghapus mahasiswa: '.$e->getMessage()
        );
    }
}

    public function edit($id)
{
    $mahasiswa = \App\Models\User::findOrFail($id);
    // Kembalikan data dalam bentuk JSON untuk pop-up Javascript
    return response()->json($mahasiswa);
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
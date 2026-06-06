@extends('layouts.app')

@section('content')
<div class="bg-gray-50 min-h-screen py-10 px-4 md:px-12">
    <div class="max-w-4xl mx-auto bg-white p-6 md:p-8 rounded-xl shadow-sm border border-gray-100">
        
        <div class="mb-8 border-b pb-4 flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Tambah Anggota Baru</h1>
                <p class="text-sm text-gray-500">Lengkapi data berikut untuk mendaftarkan mahasiswa ke sistem.</p>
            </div>
            <a href="{{ route('admin.mahasiswa') }}" class="text-gray-400 hover:text-gray-600 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </a>
        </div>

        <form action="{{ route('admin.store-mahasiswa') }}" method="POST" class="space-y-6">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="col-span-1 md:col-span-2">
                    <label class="block text-xs font-bold text-gray-400 uppercase mb-2">Nama Lengkap Mahasiswa</label>
                    <input type="text" name="nama" required class="w-full bg-gray-50 border border-gray-200 rounded-lg p-3 text-sm focus:ring-2 focus:ring-pink-500 outline-none transition" placeholder="Masukkan nama lengkap sesuai KTM">
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase mb-2">NIM (Nomor Induk Mahasiswa)</label>
                    <input type="text" name="nim" required class="w-full bg-gray-50 border border-gray-200 rounded-lg p-3 text-sm focus:ring-2 focus:ring-pink-500 outline-none transition" placeholder="Contoh: 2241101xxx">
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase mb-2">Program Studi</label>
                    <select name="prodi" class="w-full bg-gray-50 border border-gray-200 rounded-lg p-3 text-sm focus:ring-2 focus:ring-pink-500 outline-none transition">
                        <option value="D3TI">D3 Teknologi Informasi</option>
                        <option value="D4TRPL">D4 Teknologi Rekayasa Perangkat Lunak</option>
                        <option value="D3SI">D3 Sistem Informasi</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase mb-2 text-pink-600">Tanggal Terdaftar (Sistem)</label>
                    <input type="text" value="{{ date('d F Y') }}" readonly class="w-full bg-pink-50 border border-pink-100 rounded-lg p-3 text-sm text-pink-700 font-bold cursor-not-allowed outline-none">
                    <input type="hidden" name="tgl_daftar" value="{{ date('Y-m-d') }}">
                </div>
            </div>

            <div class="pt-6 border-t flex justify-end gap-3">
                <a href="{{ route('admin.mahasiswa') }}" class="px-6 py-3 rounded-xl font-bold text-sm text-gray-500 hover:bg-gray-100 transition">
                    Batal
                </a>
                <button type="submit" class="bg-slate-900 text-white px-10 py-3 rounded-xl font-bold text-sm hover:bg-pink-600 transition shadow-lg shadow-gray-200">
                    Simpan Anggota
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
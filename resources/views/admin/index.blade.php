@extends('layouts.app')

@section('content')
<div class="bg-gray-50 min-h-screen py-10 px-4 md:px-12">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row gap-8">
        
        <!-- Sidebar Kiri (Tetap Konsisten) -->
        <div class="w-full md:w-1/4">
            <div class="flex items-center gap-4 mb-6">
                <img src="/image/staff-avatar.png" alt="Avatar" class="w-16 h-16 rounded-full border-2 border-pink-500">
                <div>
                    <h2 class="font-bold text-lg text-gray-800">Admin Umiarti</h2>
                    <p class="text-xs text-pink-600 font-bold uppercase tracking-wider">Petugas Perpustakaan</p>
                </div>
            </div>

            <nav class="space-y-1 border-t pt-6">
                <a href="{{ route('admin.register') }}" class="flex items-center gap-3 px-4 py-2 text-pink-700 font-bold bg-pink-50 rounded-lg transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                    </svg>
                    Registrasi Baru
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Konfirmasi Perpanjangan
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    Konfirmasi Pengembalian
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    Manage Mahasiswa
                </a>
            </nav>
        </div>

        <!-- Konten Utama: Form Registrasi -->
        <div class="flex-1 bg-white p-6 md:p-8 rounded-xl shadow-sm border border-gray-100">
            <div class="mb-8 border-b pb-4">
                <h1 class="text-2xl font-bold text-gray-800">Registrasi Mahasiswa Baru</h1>
                <p class="text-sm text-gray-500">Gunakan form ini untuk mendaftarkan akun mahasiswa ke sistem secara manual.</p>
            </div>

            <form action="{{ route('admin.store-mahasiswa') }}" method="POST" class="space-y-6">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Input NIM -->
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase mb-2">NIM / NIK</label>
                        <input type="text" name="nim" required class="w-full bg-gray-50 border border-gray-200 rounded-lg p-3 text-sm focus:ring-2 focus:ring-pink-500 outline-none" placeholder="Masukkan NIM mahasiswa">
                    </div>

                    <!-- Input Nama -->
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase mb-2">Nama Lengkap</label>
                        <input type="text" name="nama" required class="w-full bg-gray-50 border border-gray-200 rounded-lg p-3 text-sm focus:ring-2 focus:ring-pink-500 outline-none" placeholder="Nama sesuai KTM">
                    </div>

                    <!-- Input Prodi -->
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase mb-2">Program Studi</label>
                        <select name="prodi" class="w-full bg-gray-50 border border-gray-200 rounded-lg p-3 text-sm focus:ring-2 focus:ring-pink-500 outline-none">
                            <option value="D3TI">D3 Teknologi Informasi</option>
                            <option value="D4TRPL">D4 Teknologi Rekayasa Perangkat Lunak</option>
                            <option value="D3SI">D3 Sistem Informasi</option>
                        </select>
                    </div>

                    <!-- Tanggal Terdaftar (Otomatis) -->
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase mb-2">Tanggal Terdaftar</label>
                        <input type="date" name="tgl_daftar" value="{{ date('Y-m-d') }}" readonly class="w-full bg-gray-100 border border-gray-200 rounded-lg p-3 text-sm text-gray-500 cursor-not-allowed outline-none">
                        <p class="text-[10px] text-gray-400 mt-1 italic">* Tanggal diisi otomatis oleh sistem hari ini.</p>
                    </div>
                </div>

                <div class="pt-4 border-t flex justify-end">
                    <button type="submit" class="bg-pink-600 text-white px-10 py-3 rounded-xl font-bold text-sm hover:bg-pink-700 transition shadow-lg shadow-pink-100">
                        Daftarkan Mahasiswa
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
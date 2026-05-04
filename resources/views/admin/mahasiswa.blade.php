@extends('layouts.app')

@section('content')
<div class="bg-gray-50 min-h-screen py-10 px-4 md:px-12">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row gap-8">
        
        <!-- Sidebar Kiri -->
        <div class="w-full md:w-1/4">
            <div class="flex items-center gap-4 mb-6">
                <img src="/image/staff-avatar.png" alt="Avatar" class="w-16 h-16 rounded-full border-2 border-pink-500">
                <div>
                    <h2 class="font-bold text-lg text-gray-800">Admin Umiarti</h2>
                    <p class="text-xs text-pink-600 font-bold uppercase tracking-wider">Petugas Perpustakaan</p>
                </div>
            </div>

            <nav class="space-y-1 border-t pt-6">
                <a href="{{ route('admin.perpanjangan') }}" class="flex items-center gap-3 px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Konfirmasi Perpanjangan
                </a>
                <a href="{{ route('admin.pengembalian') }}" class="flex items-center gap-3 px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    Konfirmasi Pengembalian
                </a>
                <!-- Gabungan Sidebar: Registrasi & Manage -->
                <a href="{{ route('admin.mahasiswa') }}" class="flex items-center gap-3 px-4 py-2 text-pink-700 font-bold bg-pink-50 rounded-lg transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    Manage Mahasiswa
                </a>
            </nav>
        </div>

        <!-- Konten Utama -->
        <div class="flex-1">
            <div class="bg-white p-6 md:p-8 rounded-xl shadow-sm border border-gray-100">
                <!-- Header dengan Tombol Tambah di Sudut Kanan -->
                <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4 border-b pb-6">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">Manajemen Anggota</h1>
                        <p class="text-sm text-gray-500">Kelola informasi akun dan daftar mahasiswa yang terdaftar.</p>
                    </div>
                    <a href="{{ route('admin.register') }}" class="inline-flex items-center gap-2 bg-slate-900 text-white px-5 py-2.5 rounded-lg font-bold text-xs hover:bg-pink-600 transition shadow-md shadow-slate-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                        Tambah Anggota
                    </a>
                </div>

                <!-- Tabel Data Mahasiswa -->
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="bg-gray-50 text-gray-400 text-[10px] uppercase font-bold">
                            <tr>
                                <th class="px-4 py-3 text-left">NIM</th>
                                <th class="px-4 py-3 text-left">Nama Lengkap</th>
                                <th class="px-4 py-3 text-left">Prodi</th>
                                <th class="px-4 py-3 text-left">Terdaftar Pada</th>
                                <th class="px-4 py-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <!-- Contoh Baris Data -->
                            <tr class="hover:bg-gray-50/50 transition">
                                <td class="px-4 py-4 font-mono text-gray-600">2241101001</td>
                                <td class="px-4 py-4 font-bold text-gray-800">Ahmad Faisal</td>
                                <td class="px-4 py-4">
                                    <span class="px-2 py-1 bg-blue-50 text-blue-600 rounded text-[10px] font-bold uppercase tracking-wide">D3 TI</span>
                                </td>
                                <td class="px-4 py-4 text-gray-500 text-xs">
                                    {{ date('d M Y') }}
                                </td>
                                <td class="px-4 py-4 text-center space-x-3">
                                    <button class="text-blue-500 hover:text-blue-700 font-bold text-xs">Edit</button>
                                    <button class="text-red-400 hover:text-red-600 font-bold text-xs">Hapus</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="bg-gray-50 min-h-screen py-10 px-4 md:px-12">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row gap-8">
        
        <!-- Sidebar Kiri (Konsisten) -->
        <div class="w-full md:w-1/4">
            <div class="flex items-center gap-4 mb-6">
                <img src="/image/staff-avatar.png" alt="Avatar" class="w-16 h-16 rounded-full border-2 border-pink-500">
                <div>
                    <h2 class="font-bold text-lg text-gray-800">Admin Umiarti</h2>
                    <p class="text-xs text-pink-600 font-bold uppercase tracking-wider">Petugas Perpustakaan</p>
                </div>
            </div>

            <nav class="space-y-1 border-t pt-6">
                <a href="{{ route('admin.register') }}" class="flex items-center gap-3 px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                    </svg>
                    Registrasi Baru
                </a>
                <a href="{{ route('admin.perpanjangan') }}" class="flex items-center gap-3 px-4 py-2 text-pink-700 font-bold bg-pink-50 rounded-lg transition">
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
                <a href="#" class="flex items-center gap-3 px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg transition">
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
                <div class="mb-8 border-b pb-4 flex justify-between items-center">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">Antrean Perpanjangan</h1>
                        <p class="text-sm text-gray-500">Tinjau dan setujui permintaan tambahan waktu pinjam mahasiswa.</p>
                    </div>
                    <span class="bg-pink-100 text-pink-700 text-xs font-bold px-3 py-1 rounded-full">
                        3 Permintaan Baru
                    </span>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="bg-gray-50 text-gray-500 text-[10px] uppercase font-bold tracking-wider">
                            <tr>
                                <th class="px-6 py-4 text-left">Mahasiswa</th>
                                <th class="px-6 py-4 text-left">Buku</th>
                                <th class="px-6 py-4 text-left text-orange-600">Jatuh Tempo Awal</th>
                                <th class="px-6 py-4 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <!-- Contoh Row 1 -->
                            <tr class="hover:bg-gray-50/50 transition">
                                <td class="px-6 py-5">
                                    <div class="font-bold text-gray-800">Budi Santoso</div>
                                    <div class="text-[10px] text-gray-400">NIM: 2241101001</div>
                                </td>
                                <td class="px-6 py-5">
                                    <div class="text-gray-700">Algoritma & Pemrograman</div>
                                    <div class="text-[10px] text-gray-400 italic">ISBN: 978-602-xxx</div>
                                </td>
                                <td class="px-6 py-5 font-mono text-gray-600">
                                    2026-05-10
                                </td>
                                <td class="px-6 py-5 text-center">
                                    <div class="flex justify-center gap-3">
                                        <button class="bg-green-600 text-white px-4 py-2 rounded-lg text-xs font-bold hover:bg-green-700 shadow-sm transition">
                                            Setujui
                                        </button>
                                        <button class="border border-red-200 text-red-500 px-4 py-2 rounded-lg text-xs font-bold hover:bg-red-50 transition">
                                            Tolak
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Contoh Row 2 -->
                            <tr class="hover:bg-gray-50/50 transition">
                                <td class="px-6 py-5">
                                    <div class="font-bold text-gray-800">Siti Aminah</div>
                                    <div class="text-[10px] text-gray-400">NIM: 2241101005</div>
                                </td>
                                <td class="px-6 py-5">
                                    <div class="text-gray-700">UI/UX Design Essentials</div>
                                    <div class="text-[10px] text-gray-400 italic">ISBN: 978-623-xxx</div>
                                </td>
                                <td class="px-6 py-5 font-mono text-gray-600">
                                    2026-05-12
                                </td>
                                <td class="px-6 py-5 text-center">
                                    <div class="flex justify-center gap-3">
                                        <button class="bg-green-600 text-white px-4 py-2 rounded-lg text-xs font-bold hover:bg-green-700 shadow-sm transition">
                                            Setujui
                                        </button>
                                        <button class="border border-red-200 text-red-500 px-4 py-2 rounded-lg text-xs font-bold hover:bg-red-50 transition">
                                            Tolak
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Info Alert -->
                <div class="mt-8 flex gap-4 p-4 bg-blue-50 rounded-xl border border-blue-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <p class="text-xs text-blue-800 leading-relaxed italic">
                        <strong>Catatan Petugas:</strong> Menyetujui perpanjangan akan otomatis menambah masa pinjam selama 7 hari dari tanggal jatuh tempo awal sesuai kebijakan perpustakaan  .
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
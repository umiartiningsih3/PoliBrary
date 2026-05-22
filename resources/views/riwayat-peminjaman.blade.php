@extends('layouts.app')

@section('content')
<div class="bg-gray-50 min-h-screen py-10 px-4 md:px-12">
    <div class="max-w-6xl mx-auto flex flex-col md:flex-row gap-8">
        
        <!-- Sidebar Kiri (Konsisten dengan Profile) -->
        <div class="w-full md:w-1/4">
            <div class="flex items-center gap-4 mb-6">
                <img src="/image/user-avatar.png" alt="Avatar" class="w-16 h-16 rounded-full border-2 border-blue-500">
                <div>
                    <h2 class="font-bold text-lg text-gray-800">Umiarti Ningsih</h2>
                    <p class="text-sm text-gray-500">Mahasiswa</p>
                </div>
            </div>

             <!-- Menu Navigasi dengan Ikon SVG -->
            <nav class="space-y-1 border-t pt-6">
                <a href="#" class="flex items-center gap-3 px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    Akun Saya
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-2 text-blue-700 font-bold bg-blue-50 rounded-lg transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    Pinjaman Saya
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                    Disukai Saya
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                    Keamanan Saya
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Riwayat Peminjaman
                </a>
            </nav>
        </div>


        <!-- Konten Utama -->
        <div class="flex-1 bg-white p-8 rounded-xl shadow-sm border border-gray-100">
            <div class="mb-6 border-b pb-4 flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Pinjaman Saya</h1>
                    <p class="text-sm text-gray-500">Daftar buku yang sedang Anda pinjam saat ini</p>
                </div>
                <span class="bg-blue-100 text-blue-700 text-xs font-bold px-3 py-1 rounded-full">
                    3 Buku Dipinjam
                </span>
            </div>

            <!-- Tabel Pinjaman -->
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b text-gray-400 text-sm uppercase">
                            <th class="py-4 px-2 font-medium">Buku</th>
                            <th class="py-4 px-2 font-medium">Tgl Pinjam</th>
                            <th class="py-4 px-2 font-medium">Tgl Kembali</th>
                            <th class="py-4 px-2 font-medium">Status</th>
                            <th class="py-4 px-2 font-medium text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        <!-- Baris 1 -->
                        <tr class="border-b hover:bg-gray-50 transition">
                            <td class="py-4 px-2 flex items-center gap-3">
                                <div class="w-12 h-16 bg-gray-200 rounded shadow-sm overflow-hidden">
                                    <img src="/image/buku1.png" alt="Cover" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <p class="font-bold text-sm">Pemrograman PHP Modern</p>
                                    <p class="text-xs text-gray-400">Andi Offset</p>
                                </div>
                            </td>
                            <td class="py-4 px-2 text-sm">28 April 2026</td>
                            <td class="py-4 px-2 text-sm font-semibold text-red-500">05 Mei 2026</td>
                            <td class="py-4 px-2">
                                <span class="bg-yellow-100 text-yellow-700 text-[10px] font-bold px-2 py-0.5 rounded uppercase">
                                    Berjalan
                                </span>
                            </td>
                            <td class="py-4 px-2 text-center">
                                <button class="text-blue-600 hover:underline text-xs font-bold">Detail</button>
                            </td>
                        </tr>

                        <!-- Baris 2 -->
                        <tr class="border-b hover:bg-gray-50 transition">
                            <td class="py-4 px-2 flex items-center gap-3">
                                <div class="w-12 h-16 bg-gray-200 rounded shadow-sm overflow-hidden">
                                    <img src="/image/buku2.png" alt="Cover" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <p class="font-bold text-sm">Sistem Basis Data</p>
                                    <p class="text-xs text-gray-400">Rinaldi Munir</p>
                                </div>
                            </td>
                            <td class="py-4 px-2 text-sm">01 Mei 2026</td>
                            <td class="py-4 px-2 text-sm">08 Mei 2026</td>
                            <td class="py-4 px-2">
                                <span class="bg-yellow-100 text-yellow-700 text-[10px] font-bold px-2 py-0.5 rounded uppercase">
                                    Berjalan
                                </span>
                            </td>
                            <td class="py-4 px-2 text-center">
                                <button class="text-blue-600 hover:underline text-xs font-bold">Detail</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Informasi Denda (Opsional untuk PBL Anda) -->
            <div class="mt-8 p-4 bg-red-50 border border-red-100 rounded-lg flex items-start gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
                <div>
                    <h4 class="text-sm font-bold text-red-800">Catatan Pengembalian</h4>
                    <p class="text-xs text-red-700 leading-relaxed">
                        Pastikan untuk mengembalikan buku sebelum tanggal jatuh tempo guna menghindari denda keterlambatan sebesar Rp 2.000/hari.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
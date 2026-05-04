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
                <a href="#" class="flex items-center gap-3 px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    Pinjaman Saya
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-2 text-blue-700 font-bold bg-blue-50 rounded-lg transition">
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
        <div class="flex-1 bg-white p-6 md:p-8 rounded-xl shadow-sm border border-gray-100">
            <div class="mb-8 border-b pb-4">
                <h1 class="text-2xl font-bold text-gray-800">Disukai Saya</h1>
                <p class="text-sm text-gray-500">Koleksi buku favorit yang Anda simpan</p>
            </div>

            <!-- Grid Kartu Buku -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                
                <!-- Buku 1 (Status: Tersedia) -->
                <div class="group relative bg-white border border-gray-200 rounded-2xl p-4 hover:shadow-md transition">
                    <div class="aspect-[3/4] bg-gray-100 rounded-xl mb-4 overflow-hidden relative">
                        <img src="/image/buku1.png" alt="Cover Buku" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        
                        <!-- Badge Status Tersedia -->
                        <div class="absolute bottom-2 left-2">
                            <span class="bg-green-500 text-white text-[10px] font-bold px-2 py-1 rounded-md shadow-sm">
                                TERSEDIA
                            </span>
                        </div>

                        <!-- Tombol Hapus dari Favorit -->
                        <button class="absolute top-2 right-2 bg-white/90 p-1.5 rounded-full shadow text-red-500 hover:bg-red-50 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                    <h3 class="font-bold text-gray-800 line-clamp-1 text-sm">Pemrograman PHP Modern</h3>
                    <p class="text-xs text-gray-400 mb-4">Andi Offset</p>
                    <a href="#" class="block text-center bg-blue-600 text-white text-xs font-bold py-2.5 rounded-lg hover:bg-blue-700 transition">
                        Pinjam Buku
                    </a>
                </div>

                <!-- Buku 2 (Status: Habis Stok) -->
                <div class="group relative bg-white border border-gray-200 rounded-2xl p-4 hover:shadow-md transition">
                    <div class="aspect-[3/4] bg-gray-100 rounded-xl mb-4 overflow-hidden relative">
                        <!-- Overlay untuk visual buku tidak tersedia -->
                        <div class="absolute inset-0 bg-black/20 z-10"></div>
                        
                        <img src="/image/buku2.png" alt="Cover Buku" class="w-full h-full object-cover">
                        
                        <!-- Badge Status Habis -->
                        <div class="absolute bottom-2 left-2 z-20">
                            <span class="bg-red-600 text-white text-[10px] font-bold px-2 py-1 rounded-md shadow-sm">
                                HABIS STOK
                            </span>
                        </div>

                        <button class="absolute top-2 right-2 bg-white/90 p-1.5 rounded-full shadow text-red-500 hover:bg-red-50 z-20 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                    <h3 class="font-bold text-gray-800 line-clamp-1 text-sm opacity-50">Sistem Basis Data</h3>
                    <p class="text-xs text-gray-400 mb-4 opacity-50">Rinaldi Munir</p>
                    <!-- Tombol Disabled -->
                    <button disabled class="w-full bg-gray-200 text-gray-400 text-xs font-bold py-2.5 rounded-lg cursor-not-allowed">
                        Tidak Tersedia
                    </button>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
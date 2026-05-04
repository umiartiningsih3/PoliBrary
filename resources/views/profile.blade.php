@extends('layouts.app')

@section('content')
<div class="bg-gray-50 min-h-screen py-10 px-4 md:px-12">
    <div class="max-w-6xl mx-auto flex flex-col md:flex-row gap-8">
        
        <!-- Sidebar Kiri -->
        <div class="w-full md:w-1/4">
            <div class="flex items-center gap-4 mb-6">
                <img src="/image/user-avatar.png" alt="Avatar" class="w-16 h-16 rounded-full border-2 border-blue-500">
                <div>
                    <h2 class="font-bold text-lg text-gray-800">Umiarti Ningsih</h2>
                    <button class="text-sm text-gray-500 flex items-center gap-1 hover:text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                        Ubah Profil
                    </button>
                </div>
            </div>

            <!-- Menu Navigasi dengan Ikon SVG -->
            <nav class="space-y-1 border-t pt-6">
                <a href="#" class="flex items-center gap-3 px-4 py-2 text-blue-700 font-bold bg-blue-50 rounded-lg">
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

        <!-- Konten Utama (Form) -->
        <div class="flex-1 bg-white p-8 rounded-xl shadow-sm border border-gray-100">
            <div class="mb-6 border-b pb-4">
                <h1 class="text-2xl font-bold text-gray-800">Akun Saya</h1>
                <p class="text-sm text-gray-500">Kelola informasi profil Anda untuk mengontrol, melindungi dan mengamankan akun</p>
            </div>

            <div class="flex flex-col lg:flex-row gap-10">
                <!-- Form Input -->
                <form action="#" method="POST" class="flex-1 space-y-4 text-gray-700">
                    @csrf
                    <div class="flex flex-col md:flex-row md:items-center gap-2">
                        <label class="md:w-32 font-semibold">Nama</label>
                        <input type="text" value="Umiarti Ningsih" class="flex-1 p-2 bg-gray-100 rounded border-none outline-none focus:ring-2 focus:ring-blue-400">
                    </div>
                    <div class="flex flex-col md:flex-row md:items-center gap-2">
                        <label class="md:w-32 font-semibold">NIM</label>
                        <input type="text" value="3312XXXXXXXX" class="flex-1 p-2 bg-gray-100 rounded border-none outline-none focus:ring-2 focus:ring-blue-400">
                    </div>
                    <div class="flex flex-col md:flex-row md:items-center gap-2">
                        <label class="md:w-32 font-semibold">Program Studi</label>
                        <input type="text" value="D3 Teknik Informatika" class="flex-1 p-2 bg-gray-100 rounded border-none outline-none focus:ring-2 focus:ring-blue-400">
                    </div>
                    <div class="flex flex-col md:flex-row md:items-center gap-2">
                        <label class="md:w-32 font-semibold">Tanggal Lahir</label>
                        <div class="flex gap-2 flex-1">
                            <select class="p-2 bg-gray-100 rounded border-none w-full"><option>01</option></select>
                            <select class="p-2 bg-gray-100 rounded border-none w-full"><option>Januari</option></select>
                            <select class="p-2 bg-gray-100 rounded border-none w-full"><option>2000</option></select>
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row md:items-center gap-2">
                        <label class="md:w-32 font-semibold">Tipe Keanggotaan</label>
                        <input type="text" value="Mahasiswa" class="flex-1 p-2 bg-gray-100 rounded border-none outline-none focus:ring-2 focus:ring-blue-400" disabled>
                    </div>
                    <div class="flex flex-col md:flex-row md:items-center gap-2">
                        <label class="md:w-32 font-semibold">Email</label>
                        <input type="email" value="umiarti@student.polibatam.ac.id" class="flex-1 p-2 bg-gray-100 rounded border-none outline-none focus:ring-2 focus:ring-blue-400">
                    </div>
                    <div class="flex flex-col md:flex-row md:items-center gap-2">
                        <label class="md:w-32 font-semibold">Nomor Telepon</label>
                        <input type="text" value="08XXXXXXXXXX" class="flex-1 p-2 bg-gray-100 rounded border-none outline-none focus:ring-2 focus:ring-blue-400">
                    </div>

                    <div class="md:pl-32 pt-4">
                        <button type="submit" class="bg-gray-800 text-white px-8 py-2 rounded shadow hover:bg-black transition">Simpan</button>
                    </div>
                </form>

                <!-- Foto Profil di Kanan -->
                <div class="w-full lg:w-1/3 flex flex-col items-center border-l lg:pl-10 space-y-4">
                    <div class="w-32 h-32 rounded-full border-4 border-gray-200 flex items-center justify-center overflow-hidden">
                        <span class="text-6xl text-gray-300">👤</span>
                    </div>
                    <button class="px-4 py-2 border border-gray-300 rounded hover:bg-gray-50 transition">Pilih Gambar</button>
                    <div class="text-xs text-center text-gray-400 leading-relaxed">
                        Ukuran gambar: maks. 1 MB<br>
                        Format gambar: .JPEG, .PNG
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
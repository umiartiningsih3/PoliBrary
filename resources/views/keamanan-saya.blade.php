@extends('layouts.app')

@section('content')
<div class="bg-gray-50 min-h-screen py-10 px-4 md:px-12">
    <div class="max-w-6xl mx-auto flex flex-col md:flex-row gap-8">
        
        <!-- Sidebar Kiri (Konsisten) -->
        <div class="w-full md:w-1/4">
            <div class="flex items-center gap-4 mb-6">
                <img src="/image/user-avatar.png" alt="Avatar" class="w-16 h-16 rounded-full border-2 border-blue-500">
                <div>
                    <h2 class="font-bold text-lg text-gray-800">Umiarti Ningsih</h2>
                    <p class="text-sm text-gray-500">Mahasiswa</p>
                </div>
            </div>

            <!-- Menu Navigasi -->
            <nav class="space-y-1 border-t pt-6">
                <a href="{{ route('profile') }}" class="flex items-center gap-3 px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    Akun Saya
                </a>
                <a href="{{ route('pinjaman-saya') }}" class="flex items-center gap-3 px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    Pinjaman Saya
                </a>
                <a href="{{ route('disukai-saya') }}" class="flex items-center gap-3 px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                    Disukai Saya
                </a>
                <!-- Menu Aktif: Keamanan Saya -->
                <a href="#" class="flex items-center gap-3 px-4 py-2 text-blue-700 font-bold bg-blue-50 rounded-lg transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                    Keamanan Saya
                </a>
                <a href="{{ route('riwayat-peminjaman') }}" class="flex items-center gap-3 px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Riwayat Peminjaman
                </a>
            </nav>
        </div>

        <!-- Konten Utama -->
        <div class="flex-1 space-y-6">
            <!-- Card Ganti Password -->
            <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100">
                <div class="mb-6 border-b pb-4">
                    <h1 class="text-2xl font-bold text-gray-800">Keamanan Akun</h1>
                    <p class="text-sm text-gray-500">Kelola kata sandi dan lindungi akun perpustakaan Anda</p>
                </div>

                <form action="#" method="POST" class="space-y-5">
                    @csrf
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Kata Sandi Saat Ini</label>
                        <input type="password" name="current_password" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition" placeholder="Masukkan kata sandi saat ini" required>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Kata Sandi Baru</label>
                            <input type="password" name="new_password" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition" placeholder="Min. 8 karakter" required>
                            <!-- Keterangan Validasi Teks -->
                            <p class="mt-2 text-[11px] text-gray-500 leading-relaxed italic">
                                <span class="text-blue-600 font-bold">*</span> Minimal **8 karakter**. Gunakan kombinasi huruf besar, angka, dan simbol agar akun lebih aman.
                            </p>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Konfirmasi Kata Sandi Baru</label>
                            <input type="password" name="new_password_confirmation" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition" placeholder="Ulangi kata sandi baru" required>
                        </div>
                    </div>

                    <div class="pt-4">
                        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg font-bold hover:bg-blue-700 transition shadow-md">
                            Perbarui Kata Sandi
                        </button>
                    </div>
                </form>
            </div>

            <!-- Info Perangkat Terhubung -->
            <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100">
                <h3 class="font-bold text-gray-800 mb-4">Sesi Aktif</h3>
                <div class="flex items-center justify-between p-4 bg-blue-50 rounded-lg border border-blue-100">
                    <div class="flex items-center gap-4">
                        <div class="p-2 bg-blue-100 rounded-full text-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 21h6l-.75-4M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-bold text-gray-800">Windows PC - Chrome Browser</p>
                            <p class="text-xs text-gray-500">Batam, Indonesia • Sedang Aktif</p>
                        </div>
                    </div>
                    <button class="text-xs font-bold text-red-600 hover:underline">Keluar</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
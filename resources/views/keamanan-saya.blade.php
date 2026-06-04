@extends('layouts.app')

@section('content')
<div class="bg-gray-50 min-h-screen py-10 px-4">
    <div class="max-w-4xl mx-auto space-y-6">
        
        <div class="mb-2">
            <h1 class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-[#0052cc] to-[#3b82f6]">
                Keamanan Akun
            </h1>
            <p class="text-gray-500 mt-1">Kelola kata sandi dan lindungi akun perpustakaan Anda</p>
        </div>

        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
            <form action="#" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Kata Sandi Saat Ini</label>
                    <input type="password" name="current_password" class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-100 outline-none transition" placeholder="Masukkan kata sandi saat ini" required>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Kata Sandi Baru</label>
                        <input type="password" name="new_password" class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-100 outline-none transition" placeholder="Min. 8 karakter" required>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Konfirmasi Kata Sandi Baru</label>
                        <input type="password" name="new_password_confirmation" class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-100 outline-none transition" placeholder="Ulangi kata sandi baru" required>
                    </div>
                </div>

                <p class="text-[12px] text-gray-600 leading-relaxed italic bg-blue-50/50 p-4 rounded-xl border border-blue-100">
                    <span class="text-[#0052cc] font-bold">* Minimal **8 karakter**. Gunakan kombinasi huruf besar, angka, dan simbol agar akun lebih aman.
                </p>

                <div class="pt-2">
                    <button type="submit" class="w-full md:w-auto bg-gradient-to-r from-[#0052cc] to-[#3b82f6] text-white px-8 py-3 rounded-xl font-bold shadow-md hover:shadow-blue-200 hover:shadow-lg transition-all transform hover:-translate-y-0.5">
                        Perbarui Kata Sandi
                    </button>
                </div>
            </form>
        </div>

        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
            <h3 class="font-bold text-gray-800 mb-4">Sesi Aktif</h3>
            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl border border-gray-100">
                <div class="flex items-center gap-4">
                    <div class="p-3 bg-blue-100 rounded-full text-[#0052cc]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 21h6l-.75-4M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-bold text-gray-800">Windows PC - Chrome Browser</p>
                        <p class="text-xs text-gray-500">Batam, Indonesia • Sedang Aktif</p>
                    </div>
                </div>
                <button class="text-xs font-bold text-red-600 hover:bg-red-50 px-4 py-2 rounded-lg transition">Keluar</button>
            </div>
        </div>
    </div>
</div>
@endsection
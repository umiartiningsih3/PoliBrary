@extends('layouts.auth')

@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');
    
    footer { display: none !important; }
    .font-poppins { font-family: 'Poppins', sans-serif; }
</style>

<div class="min-h-screen py-20 bg-cover bg-center bg-no-repeat relative flex items-center justify-center px-4 font-poppins"
     style="background-image: url('/image/login-bg.png')">

    <div class="absolute inset-0 bg-white/50 backdrop-blur-[2px]"></div>

    <div class="relative z-10 w-full max-w-md">
        <div class="bg-sky-200/70 backdrop-blur-md border border-white/40 rounded-[34px] shadow-2xl px-8 py-12">

            <div class="text-center mb-6">
                <div class="flex justify-center mb-4">
                    <img src="{{ asset('image/Polibrary-logo.png') }}" class="h-20 w-auto">
                </div>
                <h2 class="text-3xl font-bold text-blue-800">Lupa Password</h2>
                <p class="text-gray-600 mt-2 text-sm">Verifikasi akun anda</p>
            </div>

            <div class="border-t border-white/40 mb-6"></div>

            <form action="{{ route('otp.send') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">NIM</label>
                    <input type="text" name="nim" class="w-full px-4 py-3 rounded-xl bg-white/90 border border-gray-300 outline-none focus:ring-2 focus:ring-sky-400 focus:border-transparent transition" placeholder="Masukkan NIM">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Lahir</label>
                    <input type="date" name="dob" class="w-full px-4 py-3 rounded-xl bg-white/90 border border-gray-300 outline-none focus:ring-2 focus:ring-sky-400 focus:border-transparent transition">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Pertanyaan Keamanan</label>
                    <select name="question" class="w-full px-4 py-3 rounded-xl bg-white/90 border border-gray-300 outline-none focus:ring-2 focus:ring-sky-400 focus:border-transparent transition">
                        <option disabled selected>Pilih pertanyaan</option>
                        <option value="favorit">Apa tempat favorit Anda?</option>
                        <option value="makanan">Apa makanan kesukaan Anda?</option>
                        <option value="kota">Apa kota impian Anda?</option>
                    </select>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Jawaban</label>
                    <input type="text" name="answer" class="w-full px-4 py-3 rounded-xl bg-white/90 border border-gray-300 outline-none focus:ring-2 focus:ring-sky-400 focus:border-transparent transition" placeholder="Masukkan jawaban">
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Kata Sandi Baru</label>
                    <input type="text" name="answer" class="w-full px-4 py-3 rounded-xl bg-white/90 border border-gray-300 outline-none focus:ring-2 focus:ring-sky-400 focus:border-transparent transition" placeholder="Masukkan Kata Sandi Baru">
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Konfirmasi Kata Sandi</label>
                    <input type="text" name="answer" class="w-full px-4 py-3 rounded-xl bg-white/90 border border-gray-300 outline-none focus:ring-2 focus:ring-sky-400 focus:border-transparent transition" placeholder="Konfirmasi Kata Sandi Baru">
                </div>


            <button type="submit" class="w-full bg-sky-400 hover:bg-sky-500 text-white font-bold py-3 rounded-full shadow-lg transition duration-300">
    Simpan Perubahan
</button>

<div class="text-center mt-4">
    <a href="{{ route('login') }}" class="text-sm text-gray-600 hover:text-blue-800 font-medium transition flex items-center justify-center gap-1">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        Kembali ke Login
    </a>
</div>
            </form>

        </div>
    </div>
</div>

@endsection
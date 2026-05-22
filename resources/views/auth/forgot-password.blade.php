@extends('layouts.auth')

@section('content')

<style>
footer { display: none !important; }
</style>

<div class="min-h-screen flex items-center justify-center bg-cover bg-center relative px-4"
     style="background-image: url('/image/login-bg.png')">

    <div class="absolute inset-0 bg-white/50 backdrop-blur-[2px]"></div>

    <div class="relative z-10 w-full max-w-md">

        <div class="bg-sky-200/70 backdrop-blur-md border border-white/40
                    rounded-[34px] shadow-2xl px-8 py-12">

            <!-- HEADER -->
            <div class="text-center mb-6">
                <img src="{{ asset('image/Polibrary-logo.png') }}" class="h-14 mx-auto mb-4">

                <h2 class="text-3xl font-bold text-blue-800">Lupa Password</h2>
                <p class="text-gray-600 mt-2 text-sm">Verifikasi data akun Anda</p>
            </div>

            <div class="border-t border-white/40 mb-6"></div>

            <form action="{{ route('otp.send') }}" method="POST">
                @csrf

                <!-- NIM -->
                <input type="text" name="nim"
                    placeholder="NIM"
                    class="w-full mb-4 px-4 py-3 rounded-xl bg-white/90 border">

                <!-- Tanggal Lahir -->
                <input type="date" name="dob"
                    class="w-full mb-4 px-4 py-3 rounded-xl bg-white/90 border">

                <!-- Pertanyaan -->
                <select name="question"
                    class="w-full mb-4 px-4 py-3 rounded-xl bg-white/90 border">
                    <option disabled selected>Pilih pertanyaan</option>
                    <option value="food">Makanan kesukaan</option>
                    <option value="place">Tempat favorit</option>
                    <option value="parent">Nama orang tua</option>
                    <option value="birthplace">Tempat kelahiran</option>
                </select>

                <!-- Jawaban -->
                <input type="text" name="answer"
                    placeholder="Jawaban"
                    class="w-full mb-6 px-4 py-3 rounded-xl bg-white/90 border">

                <button class="w-full bg-sky-400 hover:bg-sky-500 text-white py-3 rounded-full font-bold">
                    Kirim OTP
                </button>

                <!-- Kembali ke login -->
<div class="text-center mt-4">
    <a href="{{ route('login') }}"
       class="text-sm text-blue-700 hover:underline transition">
        ← Kembali ke login
    </a>
</div>

            </form>

        </div>
    </div>
</div>

@endsection
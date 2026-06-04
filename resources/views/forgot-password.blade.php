@extends('layouts.auth')

@section('content')

<style>
    footer { display: none !important; }
</style>

<div class="min-h-screen bg-cover bg-center bg-no-repeat relative flex items-center justify-center px-4"
     style="background-image: url('/image/login-bg.png')">

    <div class="absolute inset-0 bg-white/50 backdrop-blur-[2px]"></div>

    <div class="relative z-10 w-full max-w-md">

        <div class="bg-sky-200/70 backdrop-blur-md border border-white/40
                    rounded-[34px] shadow-2xl px-8 py-12">

            <!-- HEADER -->
            <div class="text-center mb-6">
                <div class="flex justify-center mb-4">
                    <img src="{{ asset('image/Polibrary-logo.png') }}" class="h-14 w-auto">
                </div>

                <h2 class="text-3xl font-bold text-blue-800">Lupa Password</h2>
                <p class="text-gray-600 mt-2 text-sm">Verifikasi akun untuk menerima OTP</p>
            </div>

            <div class="border-t border-white/40 mb-6"></div>

            <!-- FORM STEP 1 -->
            <form action="{{ route('otp.send') }}" method="POST">
                @csrf

                <!-- NIM -->
                <div class="mb-4">
                    <label class="text-sm font-semibold text-gray-700">NIM</label>
                    <input type="text" name="nim"
                        class="w-full px-4 py-3 rounded-xl bg-white/90 border mt-2"
                        placeholder="Masukkan NIM">
                </div>

                <!-- Tanggal Lahir -->
                <div class="mb-4">
                    <label class="text-sm font-semibold text-gray-700">Tanggal Lahir</label>
                    <input type="date" name="dob"
                        class="w-full px-4 py-3 rounded-xl bg-white/90 border mt-2">
                </div>

                <!-- Pertanyaan Keamanan (Diperbarui) -->
<div class="mb-4">
    <label class="text-sm font-semibold text-gray-700">Pertanyaan Keamanan</label>
    <select name="question"
        class="w-full px-4 py-3 rounded-xl bg-white/90 border mt-2 outline-none focus:ring-2 focus:ring-sky-300">
        <option disabled selected>Pilih pertanyaan</option>
        <option value="favorit">Apa tempat favorit Anda?</option>
        <option value="makanan">Apa makanan kesukaan Anda?</option>
        <option value="kota">Apa kota impian Anda?</option>
    </select>
</div>

                <!-- Jawaban -->
                <div class="mb-6">
                    <label class="text-sm font-semibold text-gray-700">Jawaban</label>
                    <input type="text" name="answer"
                        class="w-full px-4 py-3 rounded-xl bg-white/90 border mt-2"
                        placeholder="Masukkan jawaban">
                </div>

                <button type="submit"
                    class="w-full bg-sky-400 hover:bg-sky-500 text-white font-bold py-3 rounded-full">
                    Kirim OTP
                </button>

            </form>

        </div>
    </div>
</div>

@endsection
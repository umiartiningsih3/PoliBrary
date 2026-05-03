@extends('layouts.app')

@section('content')

<div class="min-h-screen flex items-center justify-center bg-[#d7ecf7] px-6 py-10">

    <!-- Background Utama -->
    <div class="relative w-full max-w-6xl h-[700px] rounded-[35px] overflow-hidden shadow-2xl bg-cover bg-center"
         style="background-image: url('/image/register-bg.png');">

        <!-- Overlay transparan -->
        <div class="absolute inset-0 bg-white/10 backdrop-blur-[1px]"></div>

        <!-- Box Register di dalam Background -->
        <div class="relative z-10 h-full flex items-center pl-40">

    <div class="w-[420px] bg-sky-100/80 backdrop-blur-md rounded-[28px] shadow-xl px-8 py-8 border border-white/40">

        <!-- Icon -->
        <div class="flex justify-center mb-4">
            <img src="{{ url('/image/informasi-bg.png') }}"
                 alt="Icon"
                 class="w-32 h-32 object-contain">
        </div>

                <!-- Title -->
                <div class="text-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-700">
                        Buat Akun Baru
                    </h2>
                </div>

                <!-- Form -->
                <form action="#" method="POST">
                    @csrf

                    <!-- Nama -->
                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-gray-700 mb-1">
                            Nama Lengkap
                        </label>

                        <input type="text"
                               placeholder="Masukkan nama lengkap"
                               class="w-full px-4 py-2 rounded-xl bg-white border border-gray-300 focus:ring-2 focus:ring-blue-400 outline-none">
                    </div>

                    <!-- NIM -->
                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-gray-700 mb-1">
                            NIM
                        </label>

                        <input type="text"
                               placeholder="Masukkan NIM"
                               class="w-full px-4 py-2 rounded-xl bg-white border border-gray-300 focus:ring-2 focus:ring-blue-400 outline-none">
                    </div>

                    <!-- Password -->
                    <div class="mb-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-1">
                            Kata Sandi
                        </label>

                        <input type="password"
                               placeholder="Masukkan kata sandi"
                               class="w-full px-4 py-2 rounded-xl bg-white border border-gray-300 focus:ring-2 focus:ring-blue-400 outline-none">
                    </div>

                    <p class="text-xs text-gray-600 mb-5">
                        Kata sandi harus setidaknya 6 karakter
                    </p>

                    <!-- Button -->
                    <button type="submit"
                            class="w-full bg-white text-blue-700 font-bold py-2.5 rounded-full shadow-md hover:bg-blue-100 transition">
                        Daftar Sekarang
                    </button>

                    <!-- Link -->
                    <p class="text-center text-sm mt-4 text-gray-700">
                        Sudah punya akun?
                        <a href="/login" class="text-blue-700 font-bold hover:underline">
                            Masuk
                        </a>
                    </p>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection
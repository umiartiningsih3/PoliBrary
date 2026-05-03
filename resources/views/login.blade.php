@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-cover bg-center bg-no-repeat flex items-center justify-center px-4"
     style="background-image:url('/image/login-bg.png')">

    <!-- Posisi pas di layar HP -->
    <div class="w-full flex justify-center">

        <!-- Ukuran disesuaikan dengan layar HP -->
        <div class="w-[315px] md:w-[325px] mt-30 md:mt-24
                    bg-sky-200/75 backdrop-blur-md
                    border-2 border-blue-200
                    rounded-[34px] shadow-2xl
                    px-7 py-9">

            <!-- Title -->
            <div class="text-center mb-5">
                <h2 class="text-xl font-bold text-blue-700 leading-tight">
                    Masuk ke akun Anda
                </h2>
            </div>

            <!-- Form -->
            <form action="{{ route('dashboard') }}" method="GET">
                @csrf

                <!-- NIM -->
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        NIM
                    </label>

                    <input type="text"
                           placeholder="Masukkan NIM"
                           class="w-full px-3 py-2 text-sm rounded-lg bg-white/90 border border-gray-300 outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <!-- Password -->
                <div class="mb-5">
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        Kata Sandi
                    </label>

                    <input type="password"
                           placeholder="Masukkan kata sandi"
                           class="w-full px-3 py-2 text-sm rounded-lg bg-white/90 border border-gray-300 outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <!-- Button -->
                <button type="submit"
                        class="w-full bg-white text-blue-700 text-sm font-bold py-2 rounded-full shadow hover:bg-blue-100 transition">
                    Masuk
                </button>

                <!-- Register + Kembali -->
                <p class="text-center text-xs mt-4 text-gray-700">
                    Belum punya akun?
                    <a href="/register" class="text-blue-700 font-bold hover:underline">
                        Daftar
                    </a>

                    <span class="mx-1">|</span>

                    <a href="/" class="text-blue-700 font-bold hover:underline">
                        Kembali
                    </a>
                </p>

            </form>

        </div>

    </div>

</div>

@endsection
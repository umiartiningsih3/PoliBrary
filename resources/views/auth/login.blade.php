@extends('layouts.app')

@section('content')

<style>
    footer{
        display: none !important;
    }
</style>

<div class="min-h-screen bg-cover bg-center bg-no-repeat relative flex items-center justify-center px-4"
     style="background-image: url('/image/login-bg.png')">

    <!-- Overlay -->
    <div class="absolute inset-0 bg-white/50 backdrop-blur-[2px]"></div>

    <!-- LOGIN CARD -->
    <div class="relative z-10 w-full max-w-md">

        <div class="bg-sky-200/70 backdrop-blur-md
                    border border-white/40
                    rounded-[34px]
                    shadow-2xl
                    px-8 py-12">

            <!-- HEADER (CENTER ONLY) -->
            <div class="text-center mb-6">

                <div class="flex justify-center mb-4">
                    <img src="{{ asset('image/Polibrary-logo.png') }}"
                         alt="Polibrary Logo"
                         class="h-20 w-auto">
                </div>

                <h2 class="text-3xl font-bold text-blue-800">
                    Masuk
                </h2>

                <p class="text-gray-600 mt-2 text-sm">
                    Silakan masuk ke akun Anda
                </p>
            </div>

            <div class="border-t border-white/40 mb-6"></div>

            <form action="{{ route('login.process') }}" method="POST">
    @csrf

    @if($errors->any())
        <div class="mb-4 p-3 bg-red-100 text-red-600 text-sm rounded-lg">
            {{ $errors->first() }}
        </div>
    @endif

    <div class="mb-5">
        <label class="block text-sm font-semibold text-gray-700 mb-2">NIM</label>
        <input type="text" name="nim" required value="{{ old('nim') }}"
               placeholder="Masukkan NIM"
               class="w-full px-4 py-3 rounded-xl bg-white/90 border border-gray-300 outline-none focus:ring-2 focus:ring-sky-400 transition">
    </div>

    <div class="mb-6">
        <label class="block text-sm font-semibold text-gray-700 mb-2">Kata Sandi</label>
        <input type="password" name="password" required
               placeholder="Masukkan kata sandi"
               class="w-full px-4 py-3 rounded-xl bg-white/90 border border-gray-300 outline-none focus:ring-2 focus:ring-sky-400 transition">
    </div>


    <button type="submit"
            class="w-full bg-sky-400 hover:bg-sky-500 text-white font-bold py-3 rounded-full shadow-lg transition">
        Masuk
    </button>

    <div class="text-center">
        <a href="{{ route('forgot.password') }}"
           class="text-sm text-blue-700 hover:text-blue-900 hover:underline transition font-medium">
            Lupa password?
        </a>
    </div>

</form>

        </div>

    </div>

</div>

@endsection
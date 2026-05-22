@extends('layouts.app')

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
                <h2 class="text-3xl font-bold text-blue-800">Reset Password</h2>
                <p class="text-gray-600 mt-2 text-sm">Buat password baru</p>
            </div>

            <div class="border-t border-white/40 mb-6"></div>

            <form action="{{ route('password.reset') }}" method="POST">
                @csrf

                <!-- Password Baru -->
                <input type="password" name="password"
                    placeholder="Password baru"
                    class="w-full mb-4 px-4 py-3 rounded-xl bg-white/90 border">

                <!-- Konfirmasi -->
                <input type="password" name="password_confirmation"
                    placeholder="Konfirmasi password"
                    class="w-full mb-6 px-4 py-3 rounded-xl bg-white/90 border">

                <button class="w-full bg-sky-400 hover:bg-sky-500 text-white py-3 rounded-full font-bold">
                    Reset Password
                </button>

            </form>

        </div>
    </div>
</div>

@endsection
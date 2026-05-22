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
                <h2 class="text-3xl font-bold text-blue-800">Verifikasi OTP</h2>
                <p class="text-gray-600 mt-2 text-sm">Masukkan kode OTP</p>
            </div>

            <div class="border-t border-white/40 mb-6"></div>

            <form action="{{ route('otp.verify') }}" method="POST">
                @csrf

                <input type="text" name="otp"
                    maxlength="6"
                    placeholder="------"
                    class="w-full mb-6 px-4 py-3 text-center tracking-widest rounded-xl bg-white/90 border">

                <button class="w-full bg-sky-400 hover:bg-sky-500 text-white py-3 rounded-full font-bold">
                    Verifikasi
                </button>

            </form>

        </div>
    </div>
</div>

@endsection
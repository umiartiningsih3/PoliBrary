@extends('layouts.app')

@section('content')

<div class="min-h-screen flex">

    <!-- KIRI (FORM) -->
    <div class="w-1/2 flex items-center justify-center bg-blue-100">
        <div class="bg-blue-200 p-8 rounded-2xl w-96 shadow-lg">

            <!-- Icon + Title -->
            <div class="text-center mb-6">
                <h2 class="text-xl font-bold">Buat Akun Baru</h2>
            </div>

            <!-- Form -->
            <form action="#" method="POST">
                @csrf

                <!-- Nama -->
                <div class="mb-4">
                    <label class="text-sm">Nama Lengkap</label>
                    <input type="text" placeholder="Masukkan nama lengkap"
                        class="w-full px-3 py-2 rounded bg-gray-200 mt-1 outline-none">
                </div>

                <!-- NIM -->
                <div class="mb-4">
                    <label class="text-sm">NIM</label>
                    <input type="text" placeholder="Masukkan NIM"
                        class="w-full px-3 py-2 rounded bg-gray-200 mt-1 outline-none">
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label class="text-sm">Kata Sandi</label>
                    <input type="password" placeholder="Masukkan kata sandi"
                        class="w-full px-3 py-2 rounded bg-gray-200 mt-1 outline-none">
                    <p class="text-xs text-gray-600 mt-1">
                        kata sandi harus setidaknya 6 karakter
                    </p>
                </div>

                <!-- Button -->
                <button 
                    class="w-full bg-blue-500 text-white py-2 rounded mt-4 hover:bg-blue-600">
                    Daftar Sekarang
                </button>

                <!-- Link -->
                <p class="text-center text-sm mt-4">
                    Sudah punya akun?
                    <a href="/login" class="text-blue-600 font-semibold">Masuk</a>
                    | 
                    <a href="/" class="text-gray-600">Kembali</a>
                </p>

            </form>
        </div>
    </div>

    <!-- KANAN (ILUSTRASI) -->
    <div class="w-1/2 bg-white flex items-center justify-center">
        <img src="{{ asset('image/register.png') }}" 
             alt="ilustrasi" 
             class="w-1/1">
    </div>

</div>

@endsection
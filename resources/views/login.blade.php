@extends('layouts.app')

@section('content')

<div class="min-h-screen flex items-center justify-center">

    <div class="bg-blue-200 p-8 rounded-2xl w-96 shadow-lg backdrop-blur-md bg-opacity-80">

        <!-- Title -->
        <div class="text-center mb-6">
            <h2 class="text-xl font-bold">Masuk Ke Akun Anda</h2>
        </div>

        <!-- Form -->
        <form action="{{ route('dashboard') }}" method="GET">
            @csrf

            <div class="mb-4">
                <label class="text-sm">NIM</label>
                <input type="text" placeholder="Masukkan NIM"
                    class="w-full px-3 py-2 rounded bg-gray-200 mt-1 outline-none">
            </div>

            <div class="mb-4">
                <label class="text-sm">Kata Sandi</label>
                <input type="password" placeholder="Masukkan kata sandi"
                    class="w-full px-3 py-2 rounded bg-gray-200 mt-1 outline-none">
            </div>

            <button 
                type="submit"
                class="w-full bg-blue-500 text-white py-2 rounded mt-4 hover:bg-blue-600">
                Masuk
            </button>

            <p class="text-center text-sm mt-4">
                Belum punya akun?
                <a href="/register" class="text-blue-600 font-semibold">Daftar</a>
            </p>

        </form>
    </div>

</div>

@endsection
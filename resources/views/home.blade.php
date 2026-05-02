@extends('layouts.app')

@section('content')

<div class="relative h-screen">

    <!-- Background Image -->
    <div class="absolute inset-0 bg-cover bg-center"
        style="background-image: url('{{ asset('image/landingpage.png') }}');">
    </div>

    <!-- Overlay (biar agak gelap & elegan) -->
    <div class="absolute inset-0 bg-black opacity-40"></div>

    <!-- Content -->
    <div class="relative flex items-center justify-center h-full text-center px-4">
        <div class="bg-white/80 backdrop-blur-md p-8 rounded-2xl shadow-lg max-w-xl">
            
            <h1 class="text-3xl font-bold text-gray-800 mb-4">
                Selamat Datang di FUDi-gital
            </h1>

            <p class="text-gray-700 text-lg">
                Sistem Perpustakaan Digital Polibatam
            </p>

            <p class="mt-2 text-gray-600">
                Halo, <span class="font-semibold">{{ $nama }}</span><br>
                Anda adalah seorang <span class="font-semibold">{{ $pekerjaan }}</span>
            </p>

        </div>
    </div>

</div>

@endsection
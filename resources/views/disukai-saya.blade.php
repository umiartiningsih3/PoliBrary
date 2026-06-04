@extends('layouts.app')

@section('content')
<div class="bg-gray-50 min-h-screen py-10 px-4 md:px-12">
    <div class="max-w-6xl mx-auto">
        
        <div class="mb-8 flex justify-between items-end">
            <div>
                <h1 class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-[#0052cc] to-[#3b82f6]">
                    Disukai Saya
                </h1>
                <p class="text-sm text-gray-500 mt-1">Koleksi buku favorit yang telah Anda simpan</p>
            </div>
            <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">2 Buku Disukai</span>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            
            <div class="group relative bg-white border border-gray-100 rounded-2xl p-4 hover:shadow-lg transition-all duration-300">
                <div class="aspect-[3/4] bg-gray-50 rounded-xl mb-4 overflow-hidden relative border border-gray-100">
                    <img src="{{ asset('image/buku1.png') }}" alt="Cover" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    
                    <div class="absolute bottom-2 left-2">
                        <span class="bg-green-500 text-white text-[10px] font-bold px-2 py-1 rounded-md shadow-sm">TERSEDIA</span>
                    </div>

                    <button class="absolute top-2 right-2 bg-white/90 p-1.5 rounded-full shadow text-red-500 hover:bg-red-50 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
                <h3 class="font-bold text-gray-800 text-sm mb-0.5">Pemrograman PHP Modern</h3>
                <p class="text-xs text-gray-400 mb-4">Andi Offset</p>
                <a href="#" class="block text-center bg-blue-600 text-white text-xs font-bold py-2.5 rounded-lg hover:bg-[#0052cc] transition shadow-sm">
                    Pinjam Buku
                </a>
            </div>

            <div class="group relative bg-white border border-gray-100 rounded-2xl p-4 hover:shadow-lg transition-all duration-300">
                <div class="aspect-[3/4] bg-gray-50 rounded-xl mb-4 overflow-hidden relative border border-gray-100">
                    <div class="absolute inset-0 bg-black/10 z-10"></div>
                    <img src="{{ asset('image/buku2.png') }}" alt="Cover" class="w-full h-full object-cover">
                    
                    <div class="absolute bottom-2 left-2 z-20">
                        <span class="bg-red-500 text-white text-[10px] font-bold px-2 py-1 rounded-md shadow-sm">HABIS STOK</span>
                    </div>

                    <button class="absolute top-2 right-2 bg-white/90 p-1.5 rounded-full shadow text-red-500 hover:bg-red-50 z-20 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
                <h3 class="font-bold text-gray-800 text-sm mb-0.5 opacity-60">Sistem Basis Data</h3>
                <p class="text-xs text-gray-400 mb-4 opacity-60">Rinaldi Munir</p>
                <button disabled class="w-full bg-gray-100 text-gray-400 text-xs font-bold py-2.5 rounded-lg cursor-not-allowed">
                    Tidak Tersedia
                </button>
            </div>

        </div>
    </div>
</div>
@endsection 
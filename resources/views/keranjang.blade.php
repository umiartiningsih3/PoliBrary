@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-12 px-6">
    
    <!-- Kartu Utama -->
    <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
        
        <!-- Header -->
        <div class="mb-8 border-b pb-6">
            <h2 class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-[#0052cc] to-[#3b82f6]">
                Keranjang Saya
            </h2>
            <p class="text-slate-500 mt-1">Kelola daftar buku yang ingin Anda pinjam.</p>
        </div>

        <div class="space-y-6">
            <!-- ITEM TERSEDIA -->
            <div class="bg-gray-50/50 p-6 rounded-2xl border border-gray-100 flex items-center gap-6">
                <input type="checkbox" class="w-5 h-5 accent-[#0052cc] cursor-pointer">
                
                <!-- Logo Polibrary dengan filter abu-abu -->
                <div class="w-20 h-28 bg-white border border-gray-100 rounded-lg shadow-sm flex-shrink-0 flex items-center justify-center overflow-hidden">
                    <img src="{{ asset('image/Polibrary-logo.png') }}" alt="Logo" class="w-12 h-12 object-contain grayscale opacity-60">
                </div>
                
                <div class="flex-1">
                    <h3 class="font-bold text-gray-800 text-lg">Budidaya Ikan Bandeng</h3>
                    <p class="text-sm text-gray-500">Umiarti Ningsih</p>
                    <div class="mt-3 flex items-center gap-4">
                        <span class="text-xs font-semibold text-orange-600 bg-orange-50 px-3 py-1 rounded-full">Sisa 1 buku</span>
                        <button class="text-sm text-red-500 hover:text-red-700 transition">Hapus</button>
                    </div>
                </div>
                <div class="text-right">
                    <span class="text-emerald-600 font-bold text-sm bg-emerald-50 px-4 py-1 rounded-full border border-emerald-100">Tersedia</span>
                </div>
            </div>

            <!-- ITEM HABIS -->
            <div class="bg-gray-50/50 p-6 rounded-2xl border border-gray-100 flex items-center gap-6 opacity-60">
                <input type="checkbox" class="w-5 h-5" disabled>
                
                <!-- Logo Polibrary dengan filter abu-abu yang lebih pekat -->
                <div class="w-20 h-28 bg-white border border-gray-100 rounded-lg shadow-sm flex-shrink-0 flex items-center justify-center overflow-hidden">
                    <img src="{{ asset('image/Polibrary-logo.png') }}" alt="Logo" class="w-12 h-12 object-contain grayscale opacity-40">
                </div>
                
                <div class="flex-1">
                    <h3 class="font-bold text-gray-400 text-lg">Dasar Pemrograman Web</h3>
                    <p class="text-sm text-gray-400">Andi Saputra</p>
                    <div class="mt-3 flex items-center gap-4">
                        <span class="text-xs font-semibold text-red-500 bg-red-50 px-3 py-1 rounded-full">Stok kosong</span>
                        <button class="text-sm text-red-500 hover:text-red-700 font-semibold transition">Hapus</button>
                    </div>
                </div>
                <div class="text-right">
                    <span class="text-gray-400 font-bold text-sm uppercase tracking-wider">Habis</span>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="mt-10 pt-8 border-t flex justify-end">
            <button class="bg-gradient-to-r from-[#0052cc] to-[#3b82f6] text-white px-10 py-3 rounded-xl font-semibold shadow-md hover:opacity-90 transition">
                Pinjam Sekarang
            </button>
        </div>
        
    </div>
</div>
@endsection
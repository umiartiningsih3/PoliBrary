@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-12 px-6">
    
    <!-- Kartu Utama -->
    <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
        
        <!-- Header -->
        <div class="mb-8 border-b pb-6">
            <h2 class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-[#0052cc] to-[#3b82f6]">
                Status Denda
            </h2>
            <p class="text-slate-500 mt-1">Pantau kewajiban denda buku Anda di Polibrary.</p>
        </div>

        <div class="space-y-6">
            <!-- ITEM DENDA AKTIF -->
            <div class="bg-red-50/30 p-6 rounded-2xl border border-red-100 flex items-center gap-6">
                <!-- Ikon Denda -->
                <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center flex-shrink-0">
                    <span class="text-2xl">⚠️</span>
                </div>
                
                <div class="flex-1">
                    <h3 class="font-bold text-gray-800 text-lg">Budidaya Ikan Bandeng</h3>
                    <p class="text-sm text-gray-500">Terlambat 3 hari</p>
                    <div class="mt-2 text-sm font-semibold text-red-600">
                        Total Denda: Rp 15.000
                    </div>
                </div>
                
                <div class="text-right">
                    <span class="text-red-600 font-bold text-sm bg-red-100 px-4 py-1 rounded-full">Belum Dibayar</span>
                </div>
            </div>

            <!-- ITEM DENDA LUNAS (Contoh) -->
            <div class="bg-gray-50/50 p-6 rounded-2xl border border-gray-100 flex items-center gap-6">
                <!-- Ikon Centang -->
                <div class="w-16 h-16 bg-emerald-100 rounded-full flex items-center justify-center flex-shrink-0">
                    <span class="text-2xl">✅</span>
                </div>
                
                <div class="flex-1">
                    <h3 class="font-bold text-gray-800 text-lg">Dasar Pemrograman Web</h3>
                    <p class="text-sm text-gray-500">Telah diselesaikan</p>
                    <div class="mt-2 text-sm font-semibold text-emerald-600">
                        Total Denda: Rp 10.000
                    </div>
                </div>
                
                <div class="text-right">
                    <span class="text-emerald-600 font-bold text-sm bg-emerald-50 px-4 py-1 rounded-full border border-emerald-100">Lunas</span>
                </div>
            </div>
        </div>

        <!-- Ringkasan & Tindakan -->
        <div class="mt-10 pt-8 border-t flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="text-lg font-bold text-gray-800">
                Total Tagihan: <span class="text-[#0052cc]">Rp 15.000</span>
            </div>
            <button class="bg-gradient-to-r from-[#0052cc] to-[#3b82f6] text-white px-10 py-3 rounded-xl font-semibold shadow-md hover:opacity-90 transition">
                Bayar Sekarang
            </button>
        </div>
        
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-12 px-6">
    
    <!-- Kartu Utama -->
    <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
        
        <!-- Header -->
        <div class="mb-8 border-b pb-6">
            <h2 class="text-3xl font-bold tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-sky-400">
                Keranjang Saya
            </h2>
            <p class="text-slate-500 mt-1">Kelola daftar buku yang ingin Anda pinjam.</p>
        </div>
                
                @foreach($keranjang as $item)
<div class="bg-gray-50/50 p-6 rounded-2xl border border-gray-100 flex items-center gap-6">

    <input type="checkbox" class="w-5 h-5 accent-[#0052cc]">

    <div class="w-20 h-28 bg-white border border-gray-100 rounded-lg shadow-sm overflow-hidden">
        <img src="{{ asset('storage/'.$item->buku->sampul) }}"
             class="w-full h-full object-cover"
             onerror="this.src='{{ asset('image/Polibrary-logo.png') }}'">
    </div>

    <div class="flex-1">
        <h3 class="font-bold text-gray-800 text-lg">
            {{ $item->buku->judul }}
        </h3>

        <p class="text-sm text-gray-500">
            {{ $item->buku->penulis }}
        </p>

        <div class="mt-3 flex items-center gap-4">
            <span class="text-xs font-semibold text-orange-600 bg-orange-50 px-3 py-1 rounded-full">
                Sisa {{ $item->buku->tersedia }} buku
            </span>

            <form method="POST" action="{{ route('keranjang.hapus', $item->id) }}">
                @csrf
                @method('DELETE')

                <button class="text-sm text-red-500 hover:text-red-700">
                    Hapus
                </button>
            </form>
        </div>
    </div>

    <div class="text-right">
        <span class="text-emerald-600 font-bold text-sm bg-emerald-50 px-4 py-1 rounded-full border border-emerald-100">
            Tersedia
        </span>
    </div>

</div>
@endforeach
        <!-- Footer -->
        <div class="mt-10 pt-8 border-t flex justify-end">
            <button class="bg-gradient-to-r from-[#0052cc] to-[#3b82f6] text-white px-10 py-3 rounded-xl font-semibold shadow-md hover:opacity-90 transition">
                Pinjam Sekarang
            </button>
        </div>
        
    </div>
</div>
@endsection
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
            <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">{{ $favorit->count() }} Buku Disukai</span>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

@foreach($favorit as $item)

<div class="group relative bg-white border border-gray-100 rounded-2xl p-4 hover:shadow-lg transition-all duration-300">

    <div class="aspect-[3/4] bg-gray-50 rounded-xl mb-4 overflow-hidden relative border border-gray-100">

        <img src="{{ asset('storage/'.$item->buku->sampul) }}"
             class="w-full h-full object-cover">

        <div class="absolute bottom-2 left-2">
            <span class="bg-green-500 text-white text-[10px] font-bold px-2 py-1 rounded-md">
                TERSEDIA
            </span>
        </div>

    </div>

    <h3 class="font-bold text-gray-800 text-sm mb-1">
        {{ $item->buku->judul }}
    </h3>

    <p class="text-xs text-gray-400 mb-4">
        {{ $item->buku->penulis }}
    </p>

    <a href="{{ route('keranjang') }}"
       class="block text-center bg-blue-600 text-white text-xs font-bold py-2.5 rounded-lg hover:bg-[#0052cc]">
        Pinjam Buku
    </a>

</div>

@endforeach

</div>

        </div>
    </div>
</div>
@endsection 
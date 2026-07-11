@extends('layouts.app')

@section('content')

@php
    use Carbon\Carbon;

    $jatuhTempo = Carbon::parse($pinjaman->tgl_jatuh_tempo);
@endphp

<div class="min-h-screen bg-[#F8FAFC] py-10 px-6 font-['Poppins']">

    <div class="max-w-7xl mx-auto">

        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">

            <!-- HEADER CARD -->

            <div class="px-8 py-6 border-b border-slate-200 bg-gradient-to-r from-sky-50 to-white">

                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-5">

                    <div>

                        <span class="px-4 py-2 rounded-full text-xs font-semibold bg-blue-50 text-[#0F3D5E] border border-blue-100">

                            D E T A I L &nbsp; P I N J A M A N

                        </span>

                        <h1 class="text-3xl font-bold text-[#0F3D5E] mt-4">

                            Rincian Pinjaman Buku

                        </h1>

                        <p class="text-sm text-slate-500 mt-2">

                            Informasi lengkap mengenai buku yang sedang dipinjam beserta status, riwayat, dan proses pengembaliannya.

                        </p>

                    </div>

                    <a href="{{ route('pinjaman-saya') }}"
                    class="flex items-center gap-2 px-5 py-2.5 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 text-slate-700 text-sm font-semibold transition">

                        <svg class="w-5 h-5"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M15 19l-7-7 7-7"/>

                        </svg>

                        Kembali

                    </a>

                </div>

            </div>

            <!-- ISI HALAMAN -->

            <div class="p-8">

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Kolom Kiri: Detail Buku & Aksi -->
            <div class="lg:col-span-2 space-y-6">
                
                <!-- Card Utama Detail -->
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 flex flex-col md:flex-row gap-8 items-start">
                    <!-- Cover Buku -->
                    <div class="w-full md:w-48 h-64 overflow-hidden rounded-xl border border-gray-200 flex-shrink-0">
    @if($pinjaman->buku->sampul)
        <img
            src="{{ asset('storage/' . $pinjaman->buku->sampul) }}"
            alt="{{ $pinjaman->buku->judul }}"
            class="w-full h-full object-cover">
    @else
        <div class="w-full h-full flex items-center justify-center bg-gray-100">
            Tidak ada sampul
        </div>
    @endif
</div>

                    <!-- Informasi Buku -->
                    <div class="flex-1">

<div class="space-y-4 text-sm">

    <div class="grid grid-cols-[140px_10px_1fr] items-center">
        <span class="text-gray-500 font-medium">
            Judul Buku
        </span>
        <span class="text-gray-400">:</span>
        <span class="text-gray-800 font-semibold">
            {{ $pinjaman->buku->judul }}
        </span>
    </div>


    <div class="grid grid-cols-[140px_10px_1fr] items-center">
        <span class="text-gray-500 font-medium">
            Penulis
        </span>
        <span class="text-gray-400">:</span>
        <span class="text-gray-800 font-medium">
            {{ $pinjaman->buku->penulis }}
        </span>
    </div>


    <div class="grid grid-cols-[140px_10px_1fr] items-center">
        <span class="text-gray-500 font-medium">
            Kategori
        </span>
        <span class="text-gray-400">:</span>
        <span class="text-gray-800 font-medium capitalize">
            {{ $pinjaman->buku->kategori }}
        </span>
    </div>


    <div class="grid grid-cols-[140px_10px_1fr] items-center">
        <span class="text-gray-500 font-medium">
            No. Inventaris
        </span>
        <span class="text-gray-400">:</span>
        <span class="text-gray-800 font-medium">
            {{ $pinjaman->buku->no_inventaris }}
        </span>
    </div>


    <div class="grid grid-cols-[140px_10px_1fr] items-center">
        <span class="text-gray-500 font-medium">
            Status
        </span>
        <span class="text-gray-400">:</span>
        <span class="text-blue-600 font-semibold">
            {{ $pinjaman->status }}
        </span>
    </div>


    <div class="grid grid-cols-[140px_10px_1fr] items-center">
        <span class="text-gray-500 font-medium">
            Tanggal Pinjam
        </span>
        <span class="text-gray-400">:</span>
        <span class="text-gray-800 font-medium">
            {{ $pinjaman->created_at->translatedFormat('d F Y') }}
        </span>
    </div>


    <div class="grid grid-cols-[140px_10px_1fr] items-center">
        <span class="text-gray-500 font-medium">
            Jatuh Tempo
        </span>
        <span class="text-gray-400">:</span>
        <span class="text-gray-800 font-semibold">
            {{ $jatuhTempo->translatedFormat('d F Y') }}
        </span>
    </div>


</div>


                    <div class="flex gap-4 mt-8">

    <form action="{{ route('peminjaman.kembalikan', $pinjaman->id) }}" method="POST">
        @csrf

        <button type="submit"
            class="bg-white border border-gray-300 text-gray-700 px-6 py-2.5 rounded-xl font-semibold hover:bg-gray-50 transition">

            Kembalikan Buku

        </button>

    </form>


    <form action="{{ route('peminjaman.perpanjang', $pinjaman->id) }}" method="POST">
        @csrf

        <button type="submit"
            class="bg-blue-600 text-white px-6 py-2.5 rounded-xl font-semibold hover:bg-blue-700 transition">

            Perpanjang Pinjaman

        </button>

    </form>

</div>

                    </div>
                </div>

                <!-- RIWAYAT PERPANJANGAN -->

<div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-8 mt-8">

<div class="flex items-center gap-3 mb-6">

<div class="w-11 h-11 rounded-xl bg-blue-50 border border-blue-100 flex items-center justify-center">

<svg class="w-5 h-5 text-[#1D5D8F]"
fill="none"
stroke="currentColor"
viewBox="0 0 24 24">

<path stroke-linecap="round"
stroke-linejoin="round"
stroke-width="2"
d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0"/>

</svg>

</div>

<div>

<h3 class="font-semibold text-[#0F3D5E]">

Riwayat Perpanjangan

</h3>

<p class="text-xs text-slate-400">

Riwayat seluruh pengajuan perpanjangan buku.

</p>

</div>

</div>

<div class="overflow-x-auto">

<table class="w-full">

<thead>

<tr class="border-b border-slate-200 text-xs uppercase tracking-wider text-slate-400">

<th class="px-6 py-4 text-center">

Tanggal

</th>

<th class="px-6 py-4 text-center">

Jatuh Tempo Baru

</th>

<th class="px-6 py-4 text-center">

Status

</th>

</tr>

</thead>

<tbody>

@if($pinjaman->perpanjangan->count())

@foreach($pinjaman->perpanjangan as $item)

<tr class="border-b border-slate-100 hover:bg-slate-50 transition">

<td class="px-6 py-5 text-center text-sm text-slate-600">

{{ $item->created_at->format('d M Y') }}

</td>

<td class="px-6 py-5 text-center">

<span class="px-3 py-1 rounded-full text-xs font-semibold
bg-blue-50 text-blue-600 border border-blue-100">

{{ \Carbon\Carbon::parse($item->jatuh_tempo_baru)->format('d M Y') }}

</span>

</td>

<td class="px-6 py-5 text-center">

@php

$statusPerpanjang = match($item->status){

'Disetujui' => 'bg-emerald-50 text-emerald-600 border-emerald-100',

'Ditolak' => 'bg-red-50 text-red-600 border-red-100',

default => 'bg-yellow-50 text-yellow-700 border-yellow-100'

};

@endphp

<span class="px-3 py-1 rounded-full text-xs font-semibold border {{ $statusPerpanjang }}">

{{ $item->status }}

</span>

</td>

</tr>

@endforeach

@else

<tr>

<td colspan="3" class="py-16 text-center">

<svg class="w-14 h-14 mx-auto text-slate-300 mb-3"
fill="none"
stroke="currentColor"
viewBox="0 0 24 24">

<path stroke-width="1.5"
stroke-linecap="round"
stroke-linejoin="round"
d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0"/>

</svg>

<p class="text-sm font-medium text-slate-500">

Belum Ada Riwayat Perpanjangan

</p>

<p class="text-xs text-slate-400 mt-1">

Belum pernah melakukan perpanjangan masa pinjam.

</p>

</td>

</tr>

@endif

</tbody>

</table>

</div>

</div>

</div>


            <div class="space-y-6">
            <!-- Card Pembayaran Denda -->
<div class="bg-white p-6 rounded-2xl shadow-sm border 
{{ $totalDenda > 0 ? 'border-red-100' : 'border-gray-100' }}">

    <h3 class="font-bold text-gray-800 mb-5 text-sm flex items-center gap-2">

        <svg xmlns="http://www.w3.org/2000/svg" 
        class="h-5 w-5 text-blue-600" 
        fill="none" 
        viewBox="0 0 24 24" 
        stroke="currentColor">

        <path stroke-linecap="round" 
        stroke-linejoin="round" 
        stroke-width="2" 
        d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>

        </svg>

        Pembayaran Denda

    </h3>


    <div class="space-y-3">


        <!-- Total Denda -->
        <p class="text-sm text-gray-600">
            Total keterlambatan:
            <span class="font-bold text-gray-800">
                {{ $terlambat }} Hari
            </span>
        </p>


        <p class="text-3xl font-black 
        {{ $totalDenda > 0 ? 'text-red-600' : 'text-green-600' }}">

            Rp {{ number_format($totalDenda,0,',','.') }}

        </p>



        <!-- STATUS SAAT INI -->
        <div class="mt-5 pt-5 border-t border-dashed border-gray-200">

            <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">
                Status Saat Ini
            </span>


            <div class="flex items-center gap-2 mt-2">

                <span class="flex h-3 w-3 relative">

                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full 
                    {{ $totalDenda > 0 ? 'bg-red-400' : 'bg-green-400' }} opacity-75">
                    </span>


                    <span class="relative inline-flex rounded-full h-3 w-3 
                    {{ $totalDenda > 0 ? 'bg-red-500' : 'bg-green-500' }}">
                    </span>

                </span>


                <span class="font-bold text-sm
                {{ $totalDenda > 0 ? 'text-red-700' : 'text-green-700' }}">

                    {{ $totalDenda > 0 
                        ? 'Buku Terlambat Dikembalikan' 
                        : 'Pinjaman Aman' 
                    }}

                </span>

            </div>

        </div>




        <!-- Tombol Pembayaran -->

        @if($totalDenda > 0)

            <a href="{{ route('bayar.denda') }}"
            class="mt-6 block text-center bg-blue-600 text-white px-8 py-3 rounded-xl font-bold hover:bg-blue-700 transition">

                Bayar Sekarang

            </a>


        @else

            <button
            onclick="alert('Anda tidak memiliki denda yang harus dibayar')"
            class="mt-6 w-full bg-gray-400 text-white px-8 py-3 rounded-xl font-bold cursor-not-allowed">

                Bayar Sekarang

            </button>

        @endif


    </div>

</div>


<!-- Catatan Kebijakan (Selalu Muncul) -->
<div class="bg-gray-100 p-6 rounded-2xl border border-gray-200 mt-4">
    <h4 class="text-[10px] font-black text-gray-400 mb-3 uppercase tracking-[0.2em]">Ketentuan Denda</h4>
    <ul class="text-[11px] text-gray-500 space-y-3 italic">
        <li class="flex gap-3 leading-relaxed">
            <span class="text-red-500 font-bold">01.</span>
            Denda keterlambatan buku adalah sebesar **Rp 2.000/hari**.
        </li>
        <li class="flex gap-3 leading-relaxed">
            <span class="text-red-500 font-bold">02.</span>
            Akses peminjaman buku baru akan **dibekukan secara otomatis** oleh sistem jika terdapat denda aktif yang belum dilunasi.
        </li>
    </ul>
</div>

                <!-- Card Info Tambahan -->
                <div class="bg-blue-600 p-6 rounded-2xl shadow-sm text-white">
                    <h4 class="font-bold mb-2 text-sm">Butuh bantuan?</h4>
                    <p class="text-xs text-blue-100 leading-relaxed">
                        Jika ada kendala dalam perpanjangan buku atau kesalahan data, silakan hubungi petugas melalui layanan chat.
                    </p>
                    <a href="#" class="mt-4 block text-center bg-blue-500 py-2 rounded-lg text-xs font-bold hover:bg-blue-400 transition">Hubungi Petugas</a>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-[#F8FAFC] py-10 px-6 font-['Poppins']">

<div class="max-w-7xl mx-auto">

<div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-8">

<!-- HEADER -->

<div class="flex flex-col md:flex-row justify-between md:items-center gap-5 mb-8">

<div>

<span class="px-4 py-2 rounded-full text-xs font-semibold bg-[#C8A951]/10 text-[#A27D20] border border-[#C8A951]/30">

P I N J A M A N

</span>

<h1 class="text-3xl font-bold text-[#0F3D5E] mt-4">

Pinjaman Saya

</h1>

<p class="text-sm text-slate-500 mt-2">

Daftar buku yang sedang Anda pinjam pada sistem PoliBrary.

</p>

</div>

</div>

<!-- TABEL -->

<div class="overflow-x-auto">

<table class="w-full">

<thead>

<tr class="border-b border-slate-200 text-xs uppercase tracking-wider text-slate-400">

<th class="px-6 py-4 text-left">

Buku

</th>

<th class="px-6 py-4 text-center">

Tanggal Pinjam

</th>

<th class="px-6 py-4 text-center">

Jatuh Tempo

</th>

<th class="px-6 py-4 text-center">

Status

</th>

<th class="px-6 py-4 text-center">

Aksi

</th>

</tr>

</thead>

<tbody>

@forelse($dataPinjaman as $pinjaman)

<tr class="border-b border-slate-100 hover:bg-slate-50 transition">

<td class="px-6 py-5">

<div class="flex items-center gap-4">

<div class="w-14 h-18 rounded-xl overflow-hidden border border-slate-200 bg-slate-50 flex items-center justify-center">

@if($pinjaman->buku->cover_image)

<img src="{{ asset('storage/'.$pinjaman->buku->cover_image) }}"
class="w-full h-full object-cover">

@else

<img src="{{ asset('image/Polibrary-logo.png') }}"
class="w-8 h-8 opacity-40 object-contain">

@endif

</div>

<div>

<p class="font-semibold text-slate-800">

{{ $pinjaman->buku->judul }}

</p>

<p class="text-xs text-slate-400">

{{ $pinjaman->buku->penulis }}

</p>

</div>

</div>

</td>

<td class="px-6 py-5 text-center text-sm text-slate-600">

{{ \Carbon\Carbon::parse($pinjaman->created_at)->format('d M Y') }}

</td>

<td class="px-6 py-5 text-center">

<span class="px-3 py-1 rounded-full text-xs font-semibold bg-red-50 text-red-600 border border-red-100">

{{ \Carbon\Carbon::parse($pinjaman->tgl_jatuh_tempo)->format('d M Y') }}

</span>

</td>

<td class="px-6 py-5 text-center">

@php

$statusColor = match($pinjaman->status){

'Dipinjam' => 'bg-blue-50 text-blue-600 border-blue-100',

'Menunggu Pengembalian' => 'bg-yellow-50 text-yellow-700 border-yellow-100',

'Dikembalikan' => 'bg-emerald-50 text-emerald-600 border-emerald-100',

default => 'bg-slate-100 text-slate-600 border-slate-200'

};

@endphp

<span class="px-3 py-1 rounded-full text-xs font-semibold border {{ $statusColor }}">

{{ $pinjaman->status }}

</span>

</td>

<td class="px-6 py-5">

<div class="flex justify-center">

<a href="{{ route('peminjaman.detail',$pinjaman->id) }}"
class="text-[#1D5D8F] font-semibold text-sm hover:underline">

Detail

</a>

</div>

</td>

</tr>

@empty

<tr>

<td colspan="5" class="py-16 text-center">

<svg class="w-14 h-14 mx-auto text-slate-300 mb-3"
fill="none"
stroke="currentColor"
viewBox="0 0 24 24">

<path stroke-width="1.5"
stroke-linecap="round"
stroke-linejoin="round"
d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a3 3 0 006 0M9 5a3 3 0 016 0"/>

</svg>

<p class="text-sm font-medium text-slate-500">

Belum Ada Pinjaman

</p>

<p class="text-xs text-slate-400 mt-1">

Anda belum memiliki buku yang sedang dipinjam.

</p>

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

</div>

</div>

</div>

@endsection
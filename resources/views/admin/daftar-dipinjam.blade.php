@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-[#F8FAFC] py-10 px-6 font-['Poppins']">

<div class="max-w-7xl mx-auto">

<div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-8">


<!-- HEADER -->
<div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-5 mb-8">

<div>

<span class="px-4 py-2 rounded-full text-xs font-semibold 
bg-[#C8A951]/10 text-[#A27D20] border border-[#C8A951]/30">
MONITORING
</span>


<h1 class="text-3xl font-bold text-[#0F3D5E] mt-4">
Daftar Buku Dipinjam
</h1>


<p class="text-sm text-slate-500 mt-2">
Monitoring seluruh buku yang sedang dipinjam oleh mahasiswa.
</p>

</div>



<div class="flex gap-3">


<a href="{{ route('admin.dipinjam.excel') }}"
class="flex items-center gap-2 px-5 py-2.5 rounded-xl bg-emerald-600 
hover:bg-emerald-700 text-white text-sm font-semibold transition">


<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
<path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
d="M12 10v6m0 0l-3-3m3 3l3-3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
</svg>

Excel

</a>



<a href="{{ route('admin.dipinjam.pdf') }}"
class="flex items-center gap-2 px-5 py-2.5 rounded-xl bg-red-600 
hover:bg-red-700 text-white text-sm font-semibold transition">


<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
<path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
d="M12 10v6m0 0l-3-3m3 3l3-3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
</svg>

PDF

</a>


</div>

</div>

<!-- SEARCH -->
<form method="GET" action="{{ route('admin.daftar.dipinjam') }}" class="mb-8">

<div class="flex flex-col md:flex-row gap-4">

<div class="flex-1 relative">

<svg class="absolute left-4 top-3.5 w-5 h-5 text-slate-400"
fill="none"
stroke="currentColor"
viewBox="0 0 24 24">

<path stroke-width="2"
stroke-linecap="round"
stroke-linejoin="round"
d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z"/>

</svg>


<input  
type="text"
name="search_nim"
value="{{ request('search_nim') }}"
placeholder="Cari berdasarkan NIM mahasiswa..."
class="w-full pl-12 px-4 py-3 rounded-xl border border-slate-200 
focus:ring-2 focus:ring-blue-200 outline-none text-sm">

</div>



<button
type="submit"
class="px-6 py-3 rounded-xl bg-[#0F3D5E] 
text-white font-semibold text-sm hover:bg-[#1D5D8F] transition">

Cari Data

</button>


@if(request('search_nim'))

<a href="{{ route('admin.daftar.dipinjam') }}"
class="px-6 py-3 rounded-xl bg-slate-100 text-slate-600 
font-semibold text-sm hover:bg-slate-200 transition text-center">

Reset

</a>

@endif


</div>

</form>


<!-- TABLE -->

<div class="overflow-x-auto">

<table class="w-full">


<thead>

<tr class="border-b border-slate-200 text-xs uppercase tracking-wider text-slate-400">


<th class="px-5 py-4 text-left">
Mahasiswa
</th>


<th class="px-5 py-4 text-left">
Buku
</th>


<th class="px-5 py-4 text-left">
Tanggal Pinjam
</th>


<th class="px-5 py-4 text-left">
Jatuh Tempo
</th>


<th class="px-5 py-4 text-left">
Status
</th>


<th class="px-5 py-4 text-left">
Denda
</th>


</tr>

</thead>



<tbody>


@forelse($peminjaman as $item)


<tr class="border-b border-slate-100 hover:bg-slate-50 transition">


<td class="px-5 py-5">


<p class="font-semibold text-slate-800">
{{ $item->mahasiswa->name }}
</p>


<p class="text-xs text-slate-400">
NIM : {{ $item->mahasiswa->nim }}
</p>


</td>



<td class="px-5 py-5">


<p class="font-semibold text-slate-800">
{{ $item->buku->judul }}
</p>


<p class="text-xs text-slate-400">
{{ $item->buku->penulis }}
</p>


</td>




<td class="px-5 py-5 text-sm text-slate-600">

{{ $item->created_at->format('d M Y') }}

</td>




<td class="px-5 py-5 text-sm text-slate-600">

{{ \Carbon\Carbon::parse($item->tgl_jatuh_tempo)->format('d M Y') }}

</td>




<td class="px-5 py-5">


@if($item->status == 'Dipinjam')

<span class="px-3 py-1 rounded-full text-xs font-semibold 
bg-emerald-50 text-emerald-600 border border-emerald-100">

Dipinjam

</span>


@else


<span class="px-3 py-1 rounded-full text-xs font-semibold 
bg-amber-50 text-amber-600 border border-amber-100">

Menunggu Pengembalian

</span>


@endif


</td>





<td class="px-5 py-5">


@php

$jatuhTempo = \Carbon\Carbon::parse($item->tgl_jatuh_tempo);

$terlambat = now()->greaterThan($jatuhTempo)
? now()->diffInDays($jatuhTempo)
: 0;

$denda = $terlambat * 2000;

@endphp



@if($denda > 0)


<span class="px-3 py-1 rounded-full text-xs font-semibold 
bg-red-50 text-red-600 border border-red-100">

Rp {{ number_format($denda,0,',','.') }}

</span>


@else


<span class="px-3 py-1 rounded-full text-xs font-semibold 
bg-slate-100 text-slate-500">

Tidak Ada

</span>


@endif


</td>



</tr>


@empty


<tr>

<td colspan="6" class="py-16 text-center">


<svg class="w-14 h-14 mx-auto text-slate-300 mb-3"
fill="none"
stroke="currentColor"
viewBox="0 0 24 24">

<path stroke-width="1.5"
stroke-linecap="round"
stroke-linejoin="round"
d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253"/>

</svg>


<p class="text-sm font-medium text-slate-500">
Belum Ada Buku Dipinjam
</p>


<p class="text-xs text-slate-400 mt-1">
Data peminjaman akan muncul setelah transaksi dilakukan.
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
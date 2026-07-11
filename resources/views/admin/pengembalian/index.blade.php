@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-[#F8FAFC] py-10 px-6">

<div class="max-w-7xl mx-auto">


<div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-8">


<!-- HEADER -->
<div class="flex flex-col md:flex-row justify-between gap-5 mb-8">


<div>

<span class="px-4 py-2 rounded-full text-xs font-semibold 
bg-[#C8A951]/10 text-[#A27D20] border border-[#C8A951]/30">
PENGEMBALIAN
</span>


<h1 class="text-2xl font-bold text-[#0F3D5E] mt-4">
Konfirmasi Pengembalian Buku
</h1>


<p class="text-sm text-slate-500 mt-1">
Proses pengembalian buku mahasiswa dan perbarui status peminjaman.
</p>


</div>


<div class="bg-blue-50 border border-blue-100 px-5 py-3 rounded-xl">

<p class="text-xs text-slate-500">
Total Pengajuan
</p>

<p class="text-2xl font-bold text-[#0F3D5E]">
{{ $peminjaman->count() }}
</p>

</div>


</div>





<!-- SEARCH -->

<form method="GET" class="mb-8">

<div class="flex flex-col md:flex-row gap-3">


<div class="flex-1 relative">


<svg class="absolute left-4 top-3.5 w-5 h-5 text-slate-400"
fill="none"
stroke="currentColor"
viewBox="0 0 24 24">

<path stroke-width="2"
stroke-linecap="round"
stroke-linejoin="round"
d="M21 21l-4.35-4.35m1.35-5.65a7 7 0 11-14 0 7 7 0 0114 0z"/>

</svg>


<input 
type="text"
name="search_nim"
placeholder="Cari berdasarkan NIM mahasiswa..."
class="w-full pl-12 px-4 py-3 rounded-xl border border-slate-200 
focus:ring-2 focus:ring-blue-200 outline-none text-sm">

</div>



<button
class="px-6 py-3 rounded-xl bg-[#0F3D5E] 
text-white font-semibold text-sm hover:bg-[#1D5D8F] transition">

Cari Data

</button>


</div>

</form>





<!-- TABLE -->

<div class="overflow-x-auto">


<table class="w-full">


<thead>

<tr class="border-b text-xs uppercase tracking-wider text-slate-400">


<th class="px-5 py-4 text-left">
Mahasiswa
</th>


<th class="px-5 py-4 text-left">
Buku
</th>


<th class="px-5 py-4">
Tanggal Pinjam
</th>


<th class="px-5 py-4">
Jatuh Tempo
</th>


<th class="px-5 py-4">
Denda
</th>


<th class="px-5 py-4 text-center">
Aksi
</th>


</tr>

</thead>




<tbody class="divide-y divide-slate-100">


@forelse($peminjaman as $item)


<tr class="hover:bg-blue-50/30 transition">


<td class="px-5 py-5">

<p class="font-semibold text-slate-800">
{{ $item->mahasiswa->nama ?? '-' }}
</p>

<p class="text-xs text-slate-400">
NIM : {{ $item->mahasiswa->nim ?? '-' }}
</p>

</td>




<td class="px-5 py-5">


<p class="font-semibold text-slate-700">
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


@php

$jatuhTempo=\Carbon\Carbon::parse($item->tgl_jatuh_tempo);

$hariIni=\Carbon\Carbon::now();

$terlambat=$hariIni->greaterThan($jatuhTempo)
? $hariIni->diffInDays($jatuhTempo)
:0;

$denda=$terlambat*2000;

@endphp



@if($denda>0)

<span class="px-3 py-1 rounded-full text-xs font-bold
bg-red-50 text-red-600">

Rp {{number_format($denda,0,',','.')}}

</span>


@else

<span class="px-3 py-1 rounded-full text-xs font-bold
bg-emerald-50 text-emerald-600">

Tidak Ada

</span>


@endif


</td>






<td class="px-5 py-5 text-center">


<form action="{{route('admin.konfirmasi.pengembalian',$item->id)}}" method="POST">

@csrf


<button
class="inline-flex items-center gap-2 
bg-emerald-600 hover:bg-emerald-700 
text-white px-4 py-2 rounded-xl 
text-xs font-semibold transition">


<svg class="w-4 h-4"
fill="none"
stroke="currentColor"
viewBox="0 0 24 24">

<path stroke-width="2"
stroke-linecap="round"
stroke-linejoin="round"
d="M5 13l4 4L19 7"/>

</svg>


Konfirmasi


</button>


</form>


</td>


</tr>



@empty


<tr>

<td colspan="6" class="py-12 text-center">


<div class="flex flex-col items-center text-slate-400">


<svg class="w-12 h-12 mb-3"
fill="none"
stroke="currentColor"
viewBox="0 0 24 24">

<path stroke-width="1.5"
stroke-linecap="round"
stroke-linejoin="round"
d="M12 8v4l3 3"/>

</svg>


<p>
Belum ada pengajuan pengembalian buku.
</p>


</div>


</td>


</tr>


@endforelse


</tbody>


</table>


</div>





<div class="mt-8 bg-blue-50 border border-blue-100 rounded-xl p-4">


<p class="text-xs text-blue-800">

<strong>Catatan Petugas:</strong>
Setelah dikonfirmasi, stok buku akan otomatis bertambah dan status peminjaman mahasiswa berubah menjadi selesai.

</p>


</div>


</div>


</div>


</div>


@endsection
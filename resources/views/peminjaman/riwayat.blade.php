@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-[#F8FAFC] py-10 px-6 font-['Poppins']">

<div class="max-w-7xl mx-auto">


<div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-8">


<!-- HEADER -->
<div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-5 mb-8">


<div>

<span class="px-4 py-2 rounded-full text-xs font-semibold 
bg-blue-50 text-blue-600 border border-blue-100">
RIWAYAT
</span>


<h1 class="text-3xl font-bold text-[#0F3D5E] mt-4">
Riwayat Peminjaman
</h1>


<p class="text-sm text-slate-500 mt-2">
Daftar buku yang pernah Anda pinjam di PoliBrary.
</p>


</div>



<div>


<a href="{{ route('riwayat.pdf') }}"
class="flex items-center gap-2 px-5 py-2.5 rounded-xl 
bg-red-600 hover:bg-red-700 
text-white text-sm font-semibold transition">


<svg class="w-4 h-4"
fill="none"
stroke="currentColor"
viewBox="0 0 24 24">

<path stroke-width="2"
stroke-linecap="round"
stroke-linejoin="round"
d="M12 10v6m0 0l-3-3m3 3l3-3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>

</svg>

Cetak PDF

</a>


</div>


</div>



<!-- TABLE -->

<div class="overflow-x-auto">


<table class="w-full">


<thead>

<tr class="border-b border-slate-200 text-xs uppercase tracking-wider text-slate-400">


<th class="px-5 py-4 text-left">
Buku
</th>


<th class="px-5 py-4 text-left">
Tanggal Pinjam
</th>


<th class="px-5 py-4 text-left">
Tanggal Kembali
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


@forelse($riwayat as $item)


@php

$jatuhTempo = \Carbon\Carbon::parse($item->tgl_jatuh_tempo);

$tglKembali = $item->updated_at;


$terlambat = $tglKembali->greaterThan($jatuhTempo)
? $tglKembali->diffInDays($jatuhTempo)
: 0;


$denda = $terlambat * 2000;

@endphp



<tr class="border-b border-slate-100 hover:bg-slate-50 transition">



<td class="px-5 py-5">


<p class="font-semibold text-slate-800">
{{ $item->buku->judul }}
</p>


<p class="text-xs text-slate-400">
{{ $item->buku->penulis ?? '-' }}
</p>


</td>




<td class="px-5 py-5 text-sm text-slate-600">

{{ $item->created_at->format('d M Y') }}

</td>




<td class="px-5 py-5 text-sm text-slate-600">

{{ $item->updated_at->format('d M Y') }}

</td>





<td class="px-5 py-5">


@if(strtolower($item->status) == 'dikembalikan')


<span class="px-3 py-1 rounded-full text-xs font-semibold 
bg-emerald-50 text-emerald-600 border border-emerald-100">

Dikembalikan

</span>


@else


<span class="px-3 py-1 rounded-full text-xs font-semibold 
bg-blue-50 text-blue-600 border border-blue-100">

{{ ucfirst($item->status) }}

</span>


@endif


</td>





<td class="px-5 py-5">


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


<td colspan="5" class="py-16 text-center">


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
Belum Ada Riwayat Peminjaman
</p>


<p class="text-xs text-slate-400 mt-1">
Data buku yang sudah dipinjam akan muncul di sini.
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
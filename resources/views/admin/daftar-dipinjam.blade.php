@extends('layouts.app')

@section('content')

<div class="bg-gray-50 min-h-screen py-10 px-4 md:px-12">

<div class="max-w-6xl mx-auto">

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">


<!-- Header -->
<div class="flex justify-between items-center mb-8">

    <div>
        <h1 class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-[#0052cc] to-[#3b82f6]">
            Daftar Buku Dipinjam
        </h1>

        <p class="text-sm text-gray-500 mt-1">
            Daftar seluruh buku yang sedang dipinjam oleh mahasiswa
        </p>
    </div>


    <!-- Export -->
    <div class="flex gap-3">

        <a href="{{ route('admin.dipinjam.excel') }}"
        class="bg-green-600 hover:bg-green-700 text-white px-5 py-2.5 rounded-xl text-sm font-bold transition">
            Export Excel
        </a>


        <a href="{{ route('admin.dipinjam.pdf') }}"
        class="bg-red-600 hover:bg-red-700 text-white px-5 py-2.5 rounded-xl text-sm font-bold transition">
            Export PDF
        </a>

    </div>

</div>




<div class="overflow-x-auto">

<table class="w-full text-left">


<thead>

<tr class="border-b border-gray-100 text-gray-400 text-xs uppercase tracking-wider">

<th class="py-4 px-3">
Mahasiswa
</th>


<th class="py-4 px-3">
Buku
</th>


<th class="py-4 px-3">
Tanggal Pinjam
</th>


<th class="py-4 px-3">
Jatuh Tempo
</th>


<th class="py-4 px-3">
Status
</th>


<th class="py-4 px-3">
Denda
</th>


</tr>

</thead>



<tbody class="text-gray-700">


@foreach($peminjaman as $item)


<tr class="border-b border-gray-100">


<!-- Mahasiswa -->
<td class="py-5 px-3">

<p class="font-semibold text-gray-800">
{{ $item->mahasiswa->name }}
</p>

<p class="text-xs text-gray-400">
{{ $item->mahasiswa->nim }}
</p>

</td>




<!-- Buku -->
<td class="py-5 px-3">

<p class="font-bold text-gray-800">
{{ $item->buku->judul }}
</p>

<p class="text-xs text-gray-400">
{{ $item->buku->penulis }}
</p>

</td>




<!-- Tanggal Pinjam -->
<td class="py-5 px-3 text-sm">

{{ $item->created_at->format('d-m-Y') }}

</td>





<!-- Jatuh Tempo -->
<td class="py-5 px-3 text-sm">

{{ \Carbon\Carbon::parse($item->tgl_jatuh_tempo)->format('d-m-Y') }}

</td>





<!-- Status -->
<td class="py-5 px-3">


@if($item->status == 'Dipinjam')


<span class="px-3 py-1 rounded-full text-xs font-bold bg-green-50 text-green-600 border border-green-100">

Dipinjam

</span>


@else


<span class="px-3 py-1 rounded-full text-xs font-bold bg-yellow-50 text-yellow-600 border border-yellow-100">

Menunggu Pengembalian

</span>


@endif


</td>





<!-- Denda -->
<td class="py-5 px-3">


@php

$jatuhTempo = \Carbon\Carbon::parse($item->tgl_jatuh_tempo);

$hariIni = \Carbon\Carbon::now();


$terlambat = $hariIni->greaterThan($jatuhTempo)
    ? $hariIni->diffInDays($jatuhTempo)
    : 0;


$denda = $terlambat * 2000;

@endphp




@if($denda > 0)

<span class="px-3 py-1 rounded-full text-xs font-bold bg-red-50 text-red-600 border border-red-100">

Rp {{ number_format($denda,0,',','.') }}

</span>


@else


<span class="px-3 py-1 rounded-full text-xs font-bold bg-green-50 text-green-600 border border-green-100">

Tidak Ada

</span>


@endif


</td>


</tr>


@endforeach


</tbody>


</table>


</div>


</div>

</div>

</div>


@endsection
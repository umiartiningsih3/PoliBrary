@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-[#F8FAFC] py-10 px-4 md:px-12">

<div class="max-w-7xl mx-auto">


<div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-8">


<!-- HEADER -->

<div class="flex flex-col md:flex-row justify-between md:items-center gap-4 mb-8">


<div>


<span class="px-4 py-2 rounded-full text-xs font-semibold bg-[#C8A951]/10 text-[#A27D20] border border-[#C8A951]/30">

KERANJANG

</span>


<h1 class="text-2xl font-bold text-[#0F3D5E] mt-3">

Keranjang Peminjaman

</h1>


<p class="text-sm text-slate-500 mt-1">

Pilih buku yang ingin dipinjam kemudian lanjutkan proses peminjaman.

</p>


</div>



<div class="flex items-center gap-2 bg-blue-50 border border-blue-100 px-4 py-3 rounded-xl">


<svg class="w-5 h-5 text-[#1D5D8F]"
fill="none"
stroke="currentColor"
viewBox="0 0 24 24">

<path
stroke-width="2"
stroke-linecap="round"
stroke-linejoin="round"
d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.5 7M17 13l1.5 7M9 20h6"/>

</svg>


<span class="text-sm font-semibold text-[#1D5D8F]">

{{ count($keranjang) }} Buku

</span>


</div>


</div>


@if(session('success'))

<div class="mx-8 mt-6 rounded-xl bg-green-50 border border-green-200 px-5 py-4 text-green-700">

{{ session('success') }}

</div>

@endif


@if(session('error'))

<div class="mx-8 mt-6 rounded-xl bg-red-50 border border-red-200 px-5 py-4 text-red-700">

{{ session('error') }}

</div>

@endif



<form action="{{ route('keranjang.pinjam') }}" method="POST">

@csrf


<div class="divide-y divide-slate-100">


@forelse($keranjang as $item)


<div class="p-6 hover:bg-slate-50 transition">

<div class="flex flex-col lg:flex-row lg:items-center gap-6">


<div class="flex items-center">

<input
type="checkbox"
name="keranjang_ids[]"
value="{{ $item->id }}"
class="w-5 h-5 rounded border-slate-300 text-sky-600 focus:ring-sky-500">

</div>


<div class="w-24 h-32 rounded-xl overflow-hidden border border-slate-200 bg-white flex-shrink-0">

@if($item->buku->sampul)

<img
src="{{ asset('storage/'.$item->buku->sampul) }}"
class="w-full h-full object-cover">

@else

<img
src="{{ asset('image/Polibrary-logo.png') }}"
class="w-full h-full object-contain p-4">

@endif

</div>


<div class="flex-1">

<h2 class="text-xl font-semibold text-slate-800">
{{ $item->buku->judul }}
</h2>


<p class="text-slate-500 mt-1">
{{ $item->buku->penulis }}
</p>


<div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-5">


<div class="text-sm">

<p class="text-slate-400">
Kategori
</p>

<p class="font-medium text-slate-700">
{{ $item->buku->kategori ?? '-' }}
</p>

</div>


<div class="text-sm">

<p class="text-slate-400">
Penerbit
</p>

<p class="font-medium text-slate-700">
{{ $item->buku->penerbit ?? '-' }}
</p>

</div>


<div class="text-sm">

<p class="text-slate-400">
Tahun Terbit
</p>

<p class="font-medium text-slate-700">
{{ $item->buku->tahun_terbit ?? '-' }}
</p>

</div>


<div class="text-sm">

<p class="text-slate-400">
Stok
</p>

<p class="font-medium text-slate-700">
{{ $item->buku->jumlah_eksemplar ?? 0 }} Buku
</p>

</div>


</div>


</div>


<div class="flex lg:flex-col gap-2">


<button
form="hapus-{{ $item->id }}"
type="submit"
class="px-4 py-2 rounded-xl bg-red-50 text-red-600 border border-red-100 text-sm font-medium hover:bg-red-100 transition">

Hapus

</button>


</div>


</div>

</div>


@empty

<div class="p-10 text-center">

<svg
class="w-14 h-14 mx-auto text-slate-300"
fill="none"
stroke="currentColor"
viewBox="0 0 24 24">

<path
stroke-linecap="round"
stroke-linejoin="round"
stroke-width="2"
d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.5 7M17 13l1.5 7M9 20h6"/>

</svg>


<h3 class="mt-4 text-lg font-semibold text-slate-700">
Keranjang masih kosong
</h3>


<p class="text-slate-500 mt-1">
Tambahkan buku terlebih dahulu sebelum melakukan peminjaman.
</p>


<a
href="{{ route('koleksi.abc') }}"
class="inline-flex items-center gap-2 mt-6 px-6 py-3 rounded-xl bg-sky-600 text-white font-semibold hover:bg-sky-700 transition">


<svg
class="w-5 h-5"
fill="none"
stroke="currentColor"
viewBox="0 0 24 24">

<path
stroke-linecap="round"
stroke-linejoin="round"
stroke-width="2"
d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5s3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18s-3.332.477-4.5 1.253"/>

</svg>

Lihat Koleksi Buku

</a>


</div>

@endforelse


</div>



@if(count($keranjang) > 0)


<div class="px-8 py-6 bg-slate-50 border-t border-slate-100 flex flex-col md:flex-row md:items-center md:justify-between gap-4">


<div>

<p class="text-sm text-slate-500">
Pilih buku yang akan dipinjam
</p>

<p class="text-lg font-semibold text-slate-800">
{{ count($keranjang) }} Buku tersedia dalam keranjang
</p>

</div>


<button
type="submit"
class="px-6 py-3 rounded-xl bg-sky-600 text-white font-semibold hover:bg-sky-700 transition">

Lanjutkan Peminjaman

</button>


</div>


@endif


</form>


@foreach($keranjang as $item)

<form
id="hapus-{{ $item->id }}"
action="{{ route('keranjang.hapus',$item->id) }}"
method="POST">

@csrf

@method('DELETE')

</form>

@endforeach


</div>

</div>

</div>


@endsection
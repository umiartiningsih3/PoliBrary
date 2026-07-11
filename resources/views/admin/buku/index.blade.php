@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-[#F8FAFC] py-10 px-6 font-['Poppins']">

<div class="max-w-6xl mx-auto">


<!-- CARD UTAMA -->
<div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">


<!-- HEADER -->
<div class="px-8 py-6 border-b border-slate-200 bg-gradient-to-r from-sky-50 to-white">

<div class="flex flex-col md:flex-row justify-between md:items-center gap-5">

<div>

<span class="px-4 py-2 rounded-full text-xs font-semibold bg-blue-50 text-[#1D5D8F] border border-blue-100">
K O L E K S I &nbsp; B U K U
</span>

<h1 class="text-3xl font-bold text-[#0F3D5E] mt-4">
Data Buku
</h1>

<p class="text-sm text-slate-500 mt-2">
Kelola seluruh koleksi buku pada sistem PoliBrary.
</p>

</div>


<a href="{{ route('tambah-buku') }}"
class="bg-[#1D5D8F] hover:bg-[#174B73] text-white px-6 py-3 rounded-xl font-semibold transition">

+ Tambah Buku

</a>


</div>

</div>



<!-- ISI -->
<div class="p-8">


<!-- STATISTIK -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-8">


<div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm">

<p class="text-sm text-slate-500">
Total Judul Buku
</p>

<h2 class="text-3xl font-bold text-[#1D5D8F] mt-2">
{{ $buku->count() }}
</h2>

</div>



<div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm">

<p class="text-sm text-slate-500">
Total Stok Buku
</p>

<h2 class="text-3xl font-bold text-[#1D5D8F] mt-2">
{{ $buku->sum('jumlah_eksemplar') }}
</h2>

</div>



<div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm">

<p class="text-sm text-slate-500">
Buku Terbaru
</p>

<h2 class="text-lg font-bold text-[#0F3D5E] mt-2">
{{ $buku->first()->judul ?? '-' }}
</h2>

</div>


</div>





<!-- CARD TABEL -->
<div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">


<!-- HEADER TABEL -->
<div class="p-6 border-b border-slate-200 flex flex-col md:flex-row justify-between gap-5">


<div>

<h2 class="text-xl font-bold text-[#0F3D5E]">
Daftar Koleksi Buku
</h2>

<p class="text-sm text-slate-500 mt-1">
Semua buku yang telah diinput oleh petugas.
</p>

</div>



<!-- SEARCH -->

<div class="relative w-full md:w-80">


<form action="{{ route('admin.buku.index') }}" method="GET">


<div class="relative">


<svg
class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-slate-400"
fill="none"
stroke="currentColor"
viewBox="0 0 24 24">

<path
stroke-width="2"
stroke-linecap="round"
stroke-linejoin="round"
d="M21 21l-4.35-4.35m1.35-5.65a7 7 0 11-14 0 7 7 0 0114 0z"/>

</svg>



<input
type="text"
name="search"
value="{{ request('search') }}"
placeholder="Cari judul, penulis, atau ISBN..."

class="w-full pl-12 pr-12 py-3 rounded-2xl border border-slate-200 bg-slate-50 text-sm text-slate-700 placeholder-slate-400 focus:bg-white focus:border-sky-400 focus:ring-4 focus:ring-sky-100 transition">


@if(request('search'))

<a href="{{ route('admin.buku.index') }}"
class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 hover:text-red-500">

✕


</a>

@endif


</div>


</form>


</div>


</div>





<!-- TABLE -->

<div class="overflow-x-auto">


<table class="w-full">


<thead class="bg-slate-100">


<tr class="text-sm text-slate-600">


<th class="px-6 py-4 text-left">
No
</th>


<th class="px-6 py-4 text-left">
Cover
</th>


<th class="px-6 py-4 text-left">
Informasi Buku
</th>


<th class="px-6 py-4 text-left">
Kategori
</th>


<th class="px-6 py-4 text-center">
Stok
</th>


<th class="px-6 py-4 text-center">
Aksi
</th>


</tr>


</thead>



<tbody class="divide-y">


@forelse($buku as $index=>$item)


<tr class="hover:bg-sky-50/40 transition">


<td class="px-6 py-5 text-slate-500">
{{ $index+1 }}
</td>



<td class="px-6 py-5">


@if($item->sampul)

<div class="w-16 h-24 rounded-xl overflow-hidden border border-slate-200 shadow-sm">

<img src="{{ asset('storage/'.$item->sampul) }}"
class="w-full h-full object-cover">

</div>


@else


<div class="w-16 h-24 rounded-xl bg-slate-50 border border-slate-200 flex items-center justify-center">

<img src="{{ asset('image/Polibrary-logo.png') }}"
class="w-10 h-10 object-contain">

</div>


@endif


</td>




<td class="px-6 py-5">


<h3 class="font-semibold text-slate-800">
{{ $item->judul }}
</h3>


<p class="text-sm text-slate-500 mt-1">
{{ $item->penulis }}
</p>


<p class="text-xs text-slate-400">
{{ $item->penerbit }} • {{ $item->tahun_terbit }}
</p>


</td>




<td class="px-6 py-5">


<span class="bg-sky-100 text-sky-700 px-3 py-1 rounded-full text-xs font-semibold">

{{ $item->kategori }}

</span>


</td>



<td class="px-6 py-5 text-center">


@if($item->jumlah_eksemplar > 0)


<span class="bg-emerald-100 text-emerald-700 px-3 py-1 rounded-full text-sm font-semibold">

{{ $item->jumlah_eksemplar }} tersedia

</span>


@else


<span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">

Kosong

</span>


@endif


</td>




<td class="px-6 py-5">


<div class="flex justify-center gap-2">


<a href="{{ route('admin.buku.edit',$item->id) }}"
class="px-4 py-2 rounded-xl bg-amber-100 text-amber-700 text-sm hover:bg-amber-200">

Edit

</a>



<form action="{{ route('admin.buku.destroy',$item->id) }}"
method="POST">

@csrf
@method('DELETE')


<button onclick="return confirm('Hapus buku ini?')"
class="px-4 py-2 rounded-xl bg-red-100 text-red-700 text-sm hover:bg-red-200">

Hapus

</button>


</form>


</div>


</td>


</tr>


@empty


<tr>

<td colspan="6"
class="text-center py-12 text-slate-500">

Belum ada data buku

</td>

</tr>


@endforelse


</tbody>


</table>


</div>


</div>


</div>


</div>


</div>


@endsection
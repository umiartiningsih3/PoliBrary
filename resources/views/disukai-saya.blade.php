@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-slate-50 py-10 px-6 font-['Poppins']">


<div class="max-w-6xl mx-auto">


<div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">



<!-- HEADER -->

<div class="px-8 py-7 bg-gradient-to-r from-sky-50 to-white border-b border-slate-200">


<span class="px-4 py-2 rounded-full text-xs font-semibold bg-blue-50 text-blue-700 border border-blue-100">

BUKU FAVORIT

</span>




<div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">


<div>


<h1 class="text-3xl font-bold text-[#0F3D5E] mt-4">

Disukai Saya

</h1>


<p class="text-sm text-slate-500 mt-2">

Koleksi buku favorit yang telah Anda simpan.

</p>


</div>



<div class="px-4 py-2 rounded-xl bg-slate-100 text-slate-600 text-xs font-semibold">

{{ $favorit->count() }} Buku Disukai

</div>



</div>


</div>






<div class="p-8">



@if($favorit->count() > 0)



<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">



@foreach($favorit as $item)



<div class="bg-white border border-slate-200 rounded-2xl p-4 hover:shadow-md transition">





<div class="aspect-[3/4] bg-slate-100 rounded-xl overflow-hidden border border-slate-200 relative">



@if($item->buku->sampul)

<img 
src="{{ asset('storage/'.$item->buku->sampul) }}"
class="w-full h-full object-cover">


@else

<img 
src="{{ asset('image/Polibrary-logo.png') }}"
class="w-full h-full object-contain p-10 opacity-40">


@endif




<div class="absolute bottom-3 left-3">

<span class="bg-green-500 text-white text-[10px] font-bold px-3 py-1 rounded-full">

TERSEDIA

</span>

</div>


</div>







<h3 class="mt-4 font-bold text-slate-800 text-sm line-clamp-2">

{{ $item->buku->judul }}

</h3>



<p class="text-xs text-slate-400 mt-1 mb-4">

{{ $item->buku->penulis }}

</p>







<form action="{{ route('keranjang.tambah') }}" method="POST">


@csrf


<input 
type="hidden"
name="buku_id"
value="{{ $item->buku->id }}">



<button 
type="submit"

class="w-full px-4 py-2.5 rounded-xl bg-[#1D5D8F] hover:bg-[#174B73] text-white text-xs font-semibold transition">


Pinjam Buku


</button>



</form>




</div>



@endforeach



</div>




@else



<div class="py-16 text-center">


<div class="w-20 h-20 mx-auto rounded-full bg-slate-100 flex items-center justify-center mb-5">


<svg class="w-10 h-10 text-slate-400"
fill="none"
stroke="currentColor"
viewBox="0 0 24 24">


<path stroke-linecap="round"
stroke-linejoin="round"
stroke-width="2"
d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>


</svg>


</div>



<h2 class="text-lg font-bold text-slate-700">

Belum Ada Buku Favorit

</h2>



<p class="text-sm text-slate-500 mt-2">

Tambahkan buku yang Anda sukai agar mudah ditemukan kembali.

</p>



</div>



@endif



</div>



</div>


</div>


</div>


@endsection
@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-slate-50 py-10 px-6 font-['Poppins']">


<div class="max-w-5xl mx-auto">


@if(session('success'))

<div class="mb-5 bg-green-50 border border-green-200 text-green-700 p-4 rounded-xl text-sm">
{{ session('success') }}
</div>

@endif


@if(session('error'))

<div class="mb-5 bg-red-50 border border-red-200 text-red-700 p-4 rounded-xl text-sm">
{{ session('error') }}
</div>

@endif



<div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">



<!-- HEADER -->

<div class="px-8 py-7 bg-gradient-to-r from-sky-50 to-white border-b border-slate-200">


<span class="px-4 py-2 rounded-full text-xs font-semibold bg-blue-50 text-blue-700 border border-blue-100">

STATUS DENDA

</span>



<h1 class="text-3xl font-bold text-[#0F3D5E] mt-4">

Status Denda

</h1>



<p class="text-sm text-slate-500 mt-2">

Pantau tagihan denda keterlambatan pengembalian buku Anda pada PoliBrary.

</p>


</div>





<div class="p-8">



@if(isset($denda) && $denda > 0)



<div class="bg-red-50 rounded-2xl border border-red-200 p-10 text-center flex flex-col items-center">



<div class="w-20 h-20 rounded-full bg-red-100 flex items-center justify-center text-red-600 mb-6">


<svg class="w-10 h-10"
fill="none"
stroke="currentColor"
viewBox="0 0 24 24">

<path stroke-linecap="round"
stroke-linejoin="round"
stroke-width="2"
d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>

</svg>


</div>





<h2 class="text-xl font-bold text-slate-800">

Anda Memiliki Tunggakan

</h2>




<p class="text-4xl font-black text-red-600 my-5">

Rp {{ number_format($denda,0,',','.') }}

</p>




<p class="text-slate-500 max-w-md mb-7">

Segera lakukan pembayaran ke bagian administrasi perpustakaan agar akses peminjaman kembali normal.

</p>




<a href="{{ route('bayar.denda') }}"

class="px-8 py-3 rounded-xl bg-[#1D5D8F] hover:bg-[#174B73] text-white font-semibold transition">

Bayar Sekarang

</a>



</div>



@else



<div class="bg-green-50 rounded-2xl border border-green-200 p-10 text-center flex flex-col items-center">



<div class="w-20 h-20 rounded-full bg-green-100 flex items-center justify-center text-green-600 mb-6">


<svg class="w-10 h-10"
fill="none"
stroke="currentColor"
viewBox="0 0 24 24">


<path stroke-linecap="round"
stroke-linejoin="round"
stroke-width="2"
d="M5 13l4 4L19 7"/>


</svg>


</div>





<h2 class="text-xl font-bold text-slate-800">

Tidak Ada Denda

</h2>




<p class="text-slate-500 mt-3 max-w-md">

Kondisi akun Anda bersih. Terima kasih telah mengembalikan buku tepat waktu.

</p>



</div>



@endif



</div>


</div>


</div>


</div>


@endsection
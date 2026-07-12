@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-slate-50 py-10 px-6 font-['Poppins']">

<div class="max-w-5xl mx-auto">


<!-- CARD UTAMA -->

<div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">


<!-- HEADER -->

<div class="px-8 py-7 bg-gradient-to-r from-sky-50 to-white border-b border-slate-200">


<span class="px-4 py-2 rounded-full text-xs font-semibold bg-blue-50 text-blue-700 border border-blue-100">

KEAMANAN AKUN

</span>


<h1 class="text-3xl font-bold text-[#0F3D5E] mt-4">

Keamanan Akun

</h1>


<p class="text-sm text-slate-500 mt-2">

Kelola kata sandi dan lindungi akun perpustakaan Anda.

</p>


</div>



<div class="p-8 space-y-8">



@if(session('success'))

<div class="p-4 rounded-xl bg-emerald-100 text-emerald-700 border border-emerald-200">

{{ session('success') }}

</div>

@endif




<!-- FORM PASSWORD -->


<div class="bg-slate-50 rounded-2xl border border-slate-200 p-6">


<h2 class="text-lg font-bold text-[#0F3D5E] mb-6">

Ubah Kata Sandi

</h2>



<form action="{{ route('password.update') }}" method="POST" class="space-y-6">


@csrf



<!-- Password Lama -->

<div>

<label class="text-sm font-semibold text-slate-700">

Kata Sandi Saat Ini

</label>


@error('current_password')

<p class="text-red-500 text-xs mt-1">
{{ $message }}
</p>

@enderror


<input
type="password"
name="current_password"
required
placeholder="Masukkan kata sandi saat ini"

class="mt-2 w-full rounded-xl border border-slate-300 bg-white px-4 py-3 focus:border-sky-400 focus:ring-4 focus:ring-sky-100">


</div>




<div class="grid grid-cols-1 md:grid-cols-2 gap-5">


<!-- Password Baru -->

<div>

<label class="text-sm font-semibold text-slate-700">

Kata Sandi Baru

</label>


@error('new_password')

<p class="text-red-500 text-xs mt-1">
{{ $message }}
</p>

@enderror


<input
type="password"
name="new_password"
required
placeholder="Minimal 8 karakter"

class="mt-2 w-full rounded-xl border border-slate-300 bg-white px-4 py-3 focus:border-sky-400 focus:ring-4 focus:ring-sky-100">


</div>




<!-- Konfirmasi -->

<div>

<label class="text-sm font-semibold text-slate-700">

Konfirmasi Kata Sandi Baru

</label>


<input
type="password"
name="new_password_confirmation"
required
placeholder="Ulangi kata sandi baru"

class="mt-2 w-full rounded-xl border border-slate-300 bg-white px-4 py-3 focus:border-sky-400 focus:ring-4 focus:ring-sky-100">


</div>


</div>




<div class="p-4 rounded-xl bg-sky-50 border border-sky-100 text-sm text-slate-600">

<span class="font-bold text-[#1D5D8F]">
Catatan:
</span>

Gunakan minimal 8 karakter dengan kombinasi huruf besar, angka, dan simbol agar akun lebih aman.

</div>




<div class="flex justify-end">


<button
type="submit"

class="px-7 py-3 rounded-xl bg-[#1D5D8F] hover:bg-[#174B73] text-white font-semibold transition">


Perbarui Kata Sandi


</button>


</div>



</form>


</div>





<!-- SESI AKTIF -->


<div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">


<h2 class="text-lg font-bold text-[#0F3D5E] mb-5">

Sesi Aktif

</h2>



<div class="flex items-center justify-between bg-slate-50 rounded-xl border border-slate-200 p-5">


<div class="flex items-center gap-4">


<div class="w-12 h-12 rounded-xl bg-sky-100 flex items-center justify-center text-[#1D5D8F]">


<svg xmlns="http://www.w3.org/2000/svg"
class="w-6 h-6"
fill="none"
viewBox="0 0 24 24"
stroke="currentColor">

<path stroke-linecap="round"
stroke-linejoin="round"
stroke-width="2"
d="M9.75 17L9 21h6l-.75-4M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>

</svg>


</div>



<div>

<p class="font-semibold text-slate-800">

Windows PC - Chrome Browser

</p>


<p class="text-sm text-slate-500">

Batam, Indonesia • Sedang Aktif

</p>


</div>


</div>




<button

class="px-5 py-2 rounded-xl bg-red-100 text-red-700 text-sm font-semibold hover:bg-red-200 transition">

Keluar

</button>



</div>


</div>




</div>


</div>


</div>


</div>


@endsection
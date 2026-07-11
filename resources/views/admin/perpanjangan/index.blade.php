@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-[#F8FAFC] py-10 px-4 md:px-12">

<div class="max-w-7xl mx-auto">


<div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-8">


<!-- HEADER -->

<div class="flex flex-col md:flex-row justify-between md:items-center gap-4 mb-8">


<div>

<span class="px-4 py-2 rounded-full text-xs font-semibold bg-[#C8A951]/10 text-[#A27D20] border border-[#C8A951]/30">
PERPANJANGAN
</span>


<h1 class="text-2xl font-bold text-[#0F3D5E] mt-3">
Antrean Perpanjangan Peminjaman
</h1>


<p class="text-sm text-slate-500 mt-1">
Kelola permintaan penambahan waktu peminjaman buku dari anggota.
</p>


</div>



<div class="flex items-center gap-2 bg-blue-50 border border-blue-100 px-4 py-3 rounded-xl">


<svg class="w-5 h-5 text-[#1D5D8F]"
fill="none"
stroke="currentColor"
viewBox="0 0 24 24">

<path stroke-width="2"
stroke-linecap="round"
stroke-linejoin="round"
d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>

</svg>


<span class="text-sm font-semibold text-[#1D5D8F]">

{{ $perpanjangans->count() }} Permintaan

</span>


</div>


</div>





<!-- TABLE -->

<div class="overflow-x-auto">


<table class="w-full text-left">


<thead>

<tr class="border-b border-slate-100 text-xs uppercase tracking-wider text-slate-400">


<th class="px-6 py-4">
Mahasiswa
</th>


<th class="px-6 py-4">
Buku
</th>


<th class="px-6 py-4">
Jatuh Tempo Awal
</th>


<th class="px-6 py-4">
Status
</th>


<th class="px-6 py-4 text-center">
Aksi
</th>


</tr>

</thead>




<tbody class="divide-y divide-slate-100">


@forelse($perpanjangans as $pinjam)



<tr class="hover:bg-blue-50/30 transition">


<!-- MAHASISWA -->

<td class="px-6 py-5">


<div class="flex items-center gap-3">


<div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center">


<svg class="w-5 h-5 text-[#1D5D8F]"
fill="none"
stroke="currentColor"
viewBox="0 0 24 24">


<path stroke-width="2"
stroke-linecap="round"
stroke-linejoin="round"
d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2m10-10a4 4 0 100-8 4 4 0 000 8z"/>


</svg>


</div>



<div>

<p class="font-semibold text-slate-800">

{{ $pinjam->peminjaman->mahasiswa->name ?? '-' }}

</p>


<p class="text-xs text-slate-400">

NIM : {{ $pinjam->peminjaman->mahasiswa->nim ?? '-' }}

</p>


</div>


</div>


</td>





<!-- BUKU -->

<td class="px-6 py-5">


<div class="flex items-center gap-3">


<div class="w-10 h-10 rounded-lg bg-amber-50 flex items-center justify-center">


<svg class="w-5 h-5 text-[#C8A951]"
fill="none"
stroke="currentColor"
viewBox="0 0 24 24">


<path stroke-width="2"
stroke-linecap="round"
stroke-linejoin="round"
d="M4 19.5A2.5 2.5 0 016.5 17H20V6a2 2 0 00-2-2H6.5A2.5 2.5 0 004 6.5v13z"/>


</svg>


</div>



<div>

<p class="font-medium text-slate-700">

{{ $pinjam->peminjaman->buku->judul ?? '-' }}

</p>


<p class="text-xs text-slate-400">

ISBN : {{ $pinjam->peminjaman->buku->isbn ?? '-' }}

</p>


</div>


</div>


</td>





<!-- TANGGAL -->

<td class="px-6 py-5">


<div class="flex items-center gap-2 text-sm text-slate-600">


<svg class="w-4 h-4 text-slate-400"
fill="none"
stroke="currentColor"
viewBox="0 0 24 24">


<path stroke-width="2"
stroke-linecap="round"
stroke-linejoin="round"
d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7H3v12a2 2 0 002 2z"/>


</svg>



{{ \Carbon\Carbon::parse($pinjam->peminjaman->tgl_jatuh_tempo)->format('d M Y') }}


</div>


</td>





<!-- STATUS -->

<td class="px-6 py-5">


<span class="px-3 py-1.5 rounded-full text-xs font-semibold bg-yellow-50 text-yellow-700 border border-yellow-100">

Menunggu Konfirmasi

</span>


</td>






<!-- AKSI -->

<td class="px-6 py-5">


<div class="flex justify-center gap-3">


<form action="{{ route('admin.perpanjangan.approve',$pinjam->id) }}" method="POST">

@csrf


<button
class="flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2 rounded-xl text-xs font-semibold transition">


<svg class="w-4 h-4"
fill="none"
stroke="currentColor"
viewBox="0 0 24 24">


<path stroke-width="2"
stroke-linecap="round"
stroke-linejoin="round"
d="M5 13l4 4L19 7"/>


</svg>


Setujui


</button>


</form>





<form action="{{ route('admin.perpanjangan.reject',$pinjam->id) }}" method="POST">

@csrf


<button
class="flex items-center gap-2 border border-red-200 text-red-600 hover:bg-red-50 px-4 py-2 rounded-xl text-xs font-semibold transition">


<svg class="w-4 h-4"
fill="none"
stroke="currentColor"
viewBox="0 0 24 24">


<path stroke-width="2"
stroke-linecap="round"
stroke-linejoin="round"
d="M6 18L18 6M6 6l12 12"/>


</svg>


Tolak


</button>


</form>


</div>


</td>



</tr>



@empty


<tr>

<td colspan="5" class="py-12 text-center">


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


<p class="text-sm">
Belum ada permintaan perpanjangan.
</p>


</div>


</td>


</tr>


@endforelse



</tbody>


</table>


</div>






<!-- INFO -->

<div class="mt-8 bg-blue-50 border border-blue-100 rounded-xl p-5">


<div class="flex gap-3">


<svg class="w-5 h-5 text-[#1D5D8F]"
fill="none"
stroke="currentColor"
viewBox="0 0 24 24">


<path stroke-width="2"
stroke-linecap="round"
stroke-linejoin="round"
d="M13 16h-1v-4h-1m1-4h.01M12 22a10 10 0 100-20 10 10 0 000 20z"/>


</svg>


<p class="text-xs text-blue-800 leading-relaxed">


<strong>Catatan Petugas:</strong>
Persetujuan perpanjangan akan memperbarui tanggal jatuh tempo peminjaman sesuai kebijakan perpustakaan.


</p>


</div>


</div>



</div>


</div>


</div>


@endsection
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
Riwayat Denda
</h1>


<p class="text-sm text-slate-500 mt-2">
Daftar lengkap denda dan status pembayaran pengguna.
</p>


</div>



<a href="{{ route('denda.export') }}" 
class="flex items-center gap-2 px-5 py-2.5 rounded-xl 
bg-emerald-600 hover:bg-emerald-700 
text-white text-sm font-semibold transition">


<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">

<path stroke-width="2"
stroke-linecap="round"
stroke-linejoin="round"
d="M12 10v6m0 0l-3-3m3 3l3-3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>

</svg>

Export Excel

</a>


</div>





<!-- TABLE -->

<div class="overflow-x-auto">


<table class="w-full">


<thead>


<tr class="border-b border-slate-200 text-xs uppercase tracking-wider text-slate-400">


<th class="px-6 py-4 text-left">
Peminjam
</th>


<th class="px-6 py-4 text-left">
Buku
</th>


<th class="px-6 py-4 text-left">
Tanggal Bayar
</th>


<th class="px-6 py-4 text-left">
Nominal
</th>


<th class="px-6 py-4 text-center">
Status
</th>


</tr>


</thead>



<tbody>



@forelse($riwayatDenda as $denda)


<tr class="border-b border-slate-100 hover:bg-slate-50 transition">



<!-- USER -->

<td class="px-6 py-5">


<div class="flex items-center gap-3">


<div class="w-9 h-9 rounded-full bg-blue-50 flex items-center justify-center">


<svg class="w-5 h-5 text-[#1D5D8F]" 
fill="none" 
stroke="currentColor" 
viewBox="0 0 24 24">


<path stroke-width="2"
stroke-linecap="round"
stroke-linejoin="round"
d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>


</svg>


</div>



<div>

<p class="text-sm font-semibold text-slate-800">
{{ $denda->user->name }}
</p>


<p class="text-xs text-slate-400">
{{ $denda->user->nim ?? '-' }}
</p>


</div>


</div>


</td>





<!-- BUKU -->

<td class="px-6 py-5">


<p class="text-sm font-semibold text-slate-700">
{{ $denda->buku->judul }}
</p>


</td>





<!-- TANGGAL -->

<td class="px-6 py-5 text-sm text-slate-500">


{{ $denda->tgl_bayar 
? \Carbon\Carbon::parse($denda->tgl_bayar)->format('d M Y') 
: '-' }}


</td>






<!-- NOMINAL -->

<td class="px-6 py-5">


<span class="text-sm font-bold text-red-600">

Rp {{ number_format($denda->jumlah_denda,0,',','.') }}

</span>


</td>






<!-- STATUS -->

<td class="px-6 py-5 text-center">


@if($denda->status == 'lunas')


<span class="px-3 py-1 rounded-full text-xs font-semibold 
bg-emerald-50 text-emerald-600 border border-emerald-100">

Lunas

</span>


@else


<span class="px-3 py-1 rounded-full text-xs font-semibold 
bg-amber-50 text-amber-600 border border-amber-100">

Belum Bayar

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
d="M12 8c-2 0-3 1-3 2s1 2 3 2 3 1 3 2-1 2-3 2m0-10v1m0 11v1"/>


</svg>



<p class="text-sm font-medium text-slate-500">
Belum Ada Riwayat Denda
</p>


<p class="text-xs text-slate-400 mt-1">
Data denda akan muncul setelah transaksi pembayaran dilakukan.
</p>


</td>


</tr>



@endforelse



</tbody>


</table>


</div>





<!-- PAGINATION -->

<div class="pt-5 border-t border-slate-100">

{{ $riwayatDenda->links() }}

</div>



</div>


</div>


</div>


@endsection
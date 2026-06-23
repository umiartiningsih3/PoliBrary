@extends('layouts.app')

@section('content')
<div class="bg-gray-50 min-h-screen py-10 px-4 md:px-12">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row gap-8">
        
        <!-- Sidebar Kiri (Konsisten) -->
        <div class="w-full md:w-1/4">
            <div class="flex items-center gap-4 mb-6">
                <img src="/image/staff-avatar.png" alt="Avatar" class="w-16 h-16 rounded-full border-2 border-pink-500">
                <div>
                    <h2 class="font-bold text-lg text-gray-800">Admin Umiarti</h2>
                    <p class="text-xs text-pink-600 font-bold uppercase tracking-wider">Petugas Perpustakaan</p>
                </div>
            </div>

            <nav class="space-y-1 border-t pt-6">
                <a href="#" class="flex items-center gap-3 px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Konfirmasi Perpanjangan
                </a>
                <a href="{{ route('admin.pengembalian') }}" class="flex items-center gap-3 px-4 py-2 text-pink-700 font-bold bg-pink-50 rounded-lg transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    Konfirmasi Pengembalian
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    Manage Mahasiswa
                </a>
            </nav>
        </div>

        <!-- Konten Utama -->
        <div class="flex-1 space-y-6">
            <div class="bg-white p-6 md:p-8 rounded-xl shadow-sm border border-gray-100">
                <div class="mb-8 border-b pb-4">
                    <h1 class="text-2xl font-bold text-gray-800">Konfirmasi Pengembalian Buku</h1>
                    <p class="text-sm text-gray-500">Cari data peminjaman berdasarkan NIM mahasiswa untuk memproses pengembalian.</p>
                </div>

                <!-- Input Pencarian -->
                <form action="#" method="GET" class="flex flex-col md:flex-row gap-4 mb-10">
                    <div class="flex-1">
                        <input type="text" name="search_nim" class="w-full bg-gray-50 border border-gray-200 rounded-xl p-4 text-sm focus:ring-2 focus:ring-pink-500 outline-none" placeholder="Masukkan NIM Mahasiswa...">
                    </div>
                    <button type="submit" class="bg-slate-900 text-white px-8 py-4 rounded-xl font-bold text-sm hover:bg-pink-600 transition shadow-lg">
                        Cek Pinjaman
                    </button>
                </form>

                <!-- Hasil Pencarian (Mockup) -->
                <div class="overflow-x-auto">
                    <h3 class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-4">Daftar Buku yang Sedang Dipinjam</h3>
                    <table class="w-full text-sm">
                        <thead class="bg-gray-50 text-gray-500 text-[10px] uppercase font-bold">
                            <tr>
                                <th class="px-4 py-3 text-left">Judul Buku</th>
                                <th class="px-4 py-3 text-left">Tgl Pinjam</th>
                                <th class="px-4 py-3 text-left">Jatuh Tempo</th>
                                <th class="px-4 py-3 text-right">Denda (Est)</th>
                                <th class="px-4 py-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">

@forelse($peminjaman as $item)

<tr>

<td class="px-4 py-4 font-medium">
    {{ $item->buku->judul }}
</td>


<td class="px-4 py-4 text-gray-500">
    {{ $item->created_at->format('d-m-Y') }}
</td>


<td class="px-4 py-4 text-gray-500">
    {{ \Carbon\Carbon::parse($item->tgl_jatuh_tempo)->format('d-m-Y') }}
</td>


<td class="px-4 py-4 text-right text-red-600 font-bold">

@php

$jatuhTempo = \Carbon\Carbon::parse(
    $item->tgl_jatuh_tempo
);

$hariIni = \Carbon\Carbon::now();

$terlambat = $hariIni->greaterThan($jatuhTempo)
    ? $hariIni->diffInDays($jatuhTempo)
    : 0;

$denda = $terlambat * 2000;

@endphp


Rp {{ number_format($denda,0,',','.') }}

</td>


<td class="px-4 py-4 text-center">

<form action="{{ route('admin.konfirmasi.pengembalian',$item->id) }}" method="POST">

@csrf

<button 
class="bg-green-600 text-white px-4 py-2 rounded-lg text-xs font-bold hover:bg-green-700">

Konfirmasi Kembali

</button>

</form>

</td>


</tr>


@empty

<tr>

<td colspan="5" class="text-center py-8 text-gray-400">

Tidak ada pengajuan pengembalian

</td>

</tr>

@endforelse


</tbody>
                    </table>
                </div>

                <div class="mt-8 p-4 bg-yellow-50 border-l-4 border-yellow-400 rounded-r-lg">
                    <p class="text-xs text-yellow-800 leading-relaxed">
                        <strong>Catatan:</strong> Konfirmasi pengembalian akan secara otomatis memperbarui stok buku di katalog dan mencatat riwayat pengembalian mahasiswa.
                    </p>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
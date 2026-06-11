@extends('layouts.app')

@section('content')
<div class="bg-gray-50 min-h-screen py-10 px-4 md:px-12">
    <div class="max-w-6xl mx-auto">
        
        <div class="flex-1">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 gap-4">
                <div>
                    <h1 class="text-3xl font-extrabold tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-sky-400">Riwayat Peminjaman</h1>
                    <p class="text-gray-500 text-sm">Daftar buku yang pernah Anda pinjam di Perpustakaan Digital.</p>
                </div>
                
                <a href="{{ route('riwayat.pdf') }}" class="flex items-center gap-2 bg-gradient-to-r from-blue-600 to-sky-500 text-white px-5 py-2.5 rounded-xl font-bold hover:from-blue-700 hover:to-sky-600 transition shadow-lg shadow-blue-200 text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Cetak PDF
                </a>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden text-sm">
                <table class="w-full text-left">
                    <thead class="bg-gradient-to-r from-sky-500 to-blue-600 text-white">
                        <tr>
                            <th class="px-6 py-4 font-bold uppercase tracking-wider">Judul Buku</th>
                            <th class="px-6 py-4 font-bold uppercase tracking-wider">Tanggal Pinjam</th>
                            <th class="px-6 py-4 font-bold uppercase tracking-wider">Tanggal Kembali</th>
                            <th class="px-6 py-4 font-bold uppercase tracking-wider">Status</th>
                            <th class="px-6 py-4 font-bold uppercase tracking-wider">Denda</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($riwayat as $item)

@php
    $jatuhTempo = \Carbon\Carbon::parse($item->tgl_jatuh_tempo);
    $tglKembali = $item->updated_at;

    $terlambat = $tglKembali->greaterThan($jatuhTempo)
        ? $tglKembali->diffInDays($jatuhTempo)
        : 0;

    $denda = $terlambat * 2000;
@endphp

<tr class="hover:bg-sky-50/50 transition">
    <td class="px-6 py-4 font-bold text-gray-800">
        {{ $item->buku->judul }}
    </td>

    <td class="px-6 py-4 text-gray-600">
        {{ $item->created_at->format('d-m-Y') }}
    </td>

    <td class="px-6 py-4 text-gray-600">
        {{ $item->updated_at->format('d-m-Y') }}
    </td>

    <td class="px-6 py-4">
        <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase bg-green-100 text-green-700">
            {{ $item->status }}
        </span>
    </td>

    <td class="px-6 py-4 font-bold {{ $denda > 0 ? 'text-red-600' : 'text-gray-400' }}">
        Rp {{ number_format($denda, 0, ',', '.') }}
    </td>
</tr>

@empty
<tr>
    <td colspan="5" class="px-6 py-10 text-center text-gray-500">
        Tidak ada riwayat peminjaman.
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
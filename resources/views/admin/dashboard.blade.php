@extends('layouts.app')

@section('content')
<div class="p-8 bg-slate-50 min-h-screen">
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-sky-950">Selamat datang kembali, {{ Auth::user()->name }}</h1>
        <p class="text-slate-500">Monitor aktivitas perpustakaan hari ini.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        @php
            $cards = [
                ['label' => 'Buku Terpinjam', 'val' => $data['buku_terpinjam'], 'color' => 'sky'],
                ['label' => 'Buku Terlambat', 'val' => $data['buku_terlambat'], 'color' => 'red'],
                ['label' => 'Menunggu Persetujuan', 'val' => $data['menunggu_persetujuan'], 'color' => 'amber'],
                ['label' => 'Menunggu Perpanjangan', 'val' => $data['menunggu_perpanjangan'], 'color' => 'blue'],
                ['label' => 'Konfirmasi Pengembalian', 'val' => $data['konfirmasi_pengembalian'], 'color' => 'indigo'],
                ['label' => 'Total Denda Bulan Ini', 'val' => 'Rp ' . number_format($data['total_denda_bulan_ini']), 'color' => 'emerald'],
            ];
        @endphp

        @foreach($cards as $card)
        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
            <h3 class="text-slate-400 text-xs font-bold uppercase">{{ $card['label'] }}</h3>
            <p class="text-3xl font-black text-{{ $card['color'] }}-600 mt-2">{{ $card['val'] }}</p>
        </div>
        @endforeach
    </div>

    <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
        <h2 class="text-lg font-bold text-slate-800 mb-4">Buku Paling Banyak Dipinjam</h2>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="text-slate-400 uppercase text-xs">
                    <tr>
                        <th class="py-3">Judul Buku</th>
                        <th class="py-3">Penulis</th>
                        <th class="py-3">Total Peminjaman</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @foreach($data['buku_terpopuler'] as $buku)
                    <tr>
                        <td class="py-4 font-semibold text-slate-800">{{ $buku->judul }}</td>
                        <td class="py-4 text-slate-500">{{ $buku->penulis }}</td>
                        <td class="py-4 font-bold text-sky-600">{{ $buku->peminjaman_count }} kali</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')

@php
    use Carbon\Carbon;

    $jatuhTempo = Carbon::parse($pinjaman->tgl_jatuh_tempo);
    $hariIni = Carbon::now();

    $terlambat = $hariIni->greaterThan($jatuhTempo)
        ? $hariIni->diffInDays($jatuhTempo)
        : 0;

    $dendaPerHari = 2000;
    $totalDenda = $terlambat * $dendaPerHari;
@endphp

<div class="bg-gray-50 min-h-screen py-10 px-4 md:px-12">
    <div class="max-w-6xl mx-auto">
        
        <!-- Header & Breadcrumbs -->
        <div class="mb-8">
            <a href="{{ route('pinjaman-saya') }}" class="text-blue-600 hover:text-blue-700 font-semibold flex items-center gap-2 mb-2 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali ke Pinjaman Saya
            </a>
            <h1 class="text-3xl font-extrabold text-gray-800 tracking-tight">Rincian Pinjaman Buku</h1>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Kolom Kiri: Detail Buku & Aksi -->
            <div class="lg:col-span-2 space-y-6">
                
                <!-- Card Utama Detail -->
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 flex flex-col md:flex-row gap-8">
                    <!-- Cover Buku -->
                    <div class="w-full md:w-48 h-64 overflow-hidden rounded-xl border border-gray-200 flex-shrink-0">
    @if($pinjaman->buku->sampul)
        <img
            src="{{ asset('storage/' . $pinjaman->buku->sampul) }}"
            alt="{{ $pinjaman->buku->judul }}"
            class="w-full h-full object-cover">
    @else
        <div class="w-full h-full flex items-center justify-center bg-gray-100">
            Tidak ada sampul
        </div>
    @endif
</div>

                    <!-- Informasi Buku -->
                    <div class="flex-1 space-y-5">
                        <div class="space-y-4 text-sm">
                            <div class="grid grid-cols-[140px_10px_1fr] items-baseline">
                                <span class="text-gray-500 font-semibold uppercase tracking-wider text-[11px]">Judul Buku</span>
                                <span class="text-gray-400">:</span>
                                <span class="font-bold text-gray-800 text-lg leading-tight">{{ $pinjaman->buku->judul }}</span>
                            </div>
                            <div class="grid grid-cols-[140px_10px_1fr]">
                                <span class="text-gray-500 font-semibold uppercase tracking-wider text-[11px]">Penulis</span>
                                <span class="text-gray-400">:</span>
                                <span class="text-gray-700">{{ $pinjaman->buku->penulis }}</span>
                            </div>
                            <div class="grid grid-cols-[140px_10px_1fr]">
                                <span class="text-gray-500 font-semibold uppercase tracking-wider text-[11px]">Kategori</span>
                                <span class="text-gray-400">:</span>
                                <span class="px-2 py-0.5 bg-blue-50 text-blue-600 rounded text-xs font-bold w-fit">{{ $pinjaman->buku->kategori }}</span>
                            </div>
                            <div class="grid grid-cols-[140px_10px_1fr]">
                                <span class="text-gray-500 font-semibold uppercase tracking-wider text-[11px]">No. Inventaris</span>
                                <span class="text-gray-400">:</span>
                                <span class="text-gray-700 font-mono">{{ $pinjaman->buku->no_inventaris }}</span>
                            </div>
                            <div class="grid grid-cols-[140px_10px_1fr]">
                                <span class="text-gray-500 font-semibold uppercase tracking-wider text-[11px]">Status</span>
                                <span class="text-gray-400">:</span>
                                <span class="text-blue-600 font-bold italic">{{ $pinjaman->status }}</span>
                            </div>
                            <div class="grid grid-cols-[140px_10px_1fr]">
                                <span class="text-gray-500 font-semibold uppercase tracking-wider text-[11px]">Tanggal Pinjam</span>
                                <span class="text-gray-400">:</span>
                                <span class="text-gray-700">{{ $pinjaman->created_at->translatedFormat('d F Y') }}</span>
                            </div>
                            <div class="grid grid-cols-[140px_10px_1fr]">
                                <span class="text-gray-500 font-semibold uppercase tracking-wider text-[11px]">Jatuh Tempo</span>
                                <span class="text-gray-400">:</span>
                                <span class="font-bold {{ $terlambat > 0 ? 'text-red-600' : 'text-blue-600' }}">
                                    {{ $jatuhTempo->translatedFormat('d F Y') }}
                                </span>
                            </div>
                        </div>

                        <form action="{{ route('peminjaman.kembalikan', $pinjaman->id) }}" method="POST">
    @csrf
    <button type="submit"
        class="bg-white border-2 border-gray-200 text-gray-700 px-6 py-2.5 rounded-xl font-bold hover:bg-gray-50">
        Kembalikan Buku
    </button>
</form>

<form action="{{ route('peminjaman.perpanjang', $pinjaman->id) }}" method="POST">
    @csrf

    <button type="submit"
        class="bg-blue-600 text-white px-6 py-2.5 rounded-xl font-bold">
        Perpanjang Pinjaman
    </button>
</form>
                    </div>
                </div>

                <!-- Card Riwayat Perpanjangan -->
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                    <h3 class="font-bold text-gray-800 mb-6 flex items-center gap-3">
                        <span class="p-2 bg-blue-100 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </span>
                        Riwayat Perpanjangan
                    </h3>
                    <div class="overflow-hidden border border-gray-100 rounded-xl">
                        <table class="w-full text-sm text-left">
                            <thead class="bg-gray-50 text-gray-500 border-b border-gray-100">
                                <tr>
                                    <th class="px-6 py-4 font-semibold uppercase tracking-wider text-[11px]">Tanggal</th>
                                    <th class="px-6 py-4 font-semibold uppercase tracking-wider text-[11px]">Jatuh Tempo Baru</th>
                                    <th class="px-6 py-4 font-semibold uppercase tracking-wider text-[11px]">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
@if($pinjaman->perpanjangan->count())

    @foreach($pinjaman->perpanjangan as $item)
    <tr>
        <td class="px-6 py-4">
            {{ $item->created_at->format('d/m/Y') }}
        </td>
        <td class="px-6 py-4">
            {{ \Carbon\Carbon::parse($item->jatuh_tempo_baru)->format('d/m/Y') }}
        </td>
        <td class="px-6 py-4">
            {{ $item->status }}
        </td>
    </tr>
    @endforeach

@else

    <tr>
        <td colspan="3" class="text-center py-6 text-gray-500">
            Belum ada riwayat perpanjangan
        </td>
    </tr>

@endif
</tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Kolom Kanan: Status Keuangan & Pembayaran -->
            <div class="space-y-6">
                
                <!-- Card Status Denda -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 relative overflow-hidden">
                    <div class="absolute -right-4 -top-4 w-20 h-20 bg-red-50 rounded-full opacity-50"></div>
                    <h3 class="text-[11px] font-bold text-gray-400 uppercase tracking-widest mb-4">Informasi Denda</h3>
                    <div class="space-y-1">
                        <p class="text-sm text-gray-600">
                            {{ $terlambat }} Hari Terlambat <span class="mx-1">×</span> Rp {{ number_format($dendaPerHari, 0, ',', '.') }}
                        </p>
                        <p class="text-3xl font-black text-red-600">
                            Rp {{ number_format($totalDenda, 0, ',', '.') }}
                        </p>
                    </div>

                    <div class="mt-6 pt-6 border-t border-dashed border-gray-200">
                        <span class="text-xs font-bold text-gray-400 block mb-2 uppercase tracking-wider">Status Saat Ini</span>
                        <div class="flex items-center gap-2">
                            <span class="flex h-3 w-3 relative">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full {{ $terlambat > 0 ? 'bg-red-400' : 'bg-green-400' }} opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-3 w-3 {{ $terlambat > 0 ? 'bg-red-500' : 'bg-green-500' }}"></span>
                            </span>
                            <span class="font-bold text-sm {{ $terlambat > 0 ? 'text-red-700' : 'text-green-700' }}">
                                {{ $terlambat > 0 ? 'Wajib Mengembalikan' : 'Pinjaman Aman' }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Bagian Modul Pembayaran yang diperbaiki -->
<div class="bg-white p-6 rounded-2xl shadow-sm border {{ $totalDenda > 0 ? 'border-red-100' : 'border-gray-100' }}">
    <h3 class="font-bold text-gray-800 mb-4 text-sm flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
        </svg>
        Metode Pembayaran
    </h3>
    
    <div class="space-y-3">
        <!-- Opsi QRIS -->
        <label class="flex items-center justify-between p-4 border border-gray-100 rounded-2xl hover:border-blue-500 hover:bg-blue-50 cursor-pointer transition-all group">
            <div class="flex items-center gap-3">
                <input type="radio" name="payment" value="qris" class="w-4 h-4 text-blue-600 focus:ring-blue-500" {{ $totalDenda > 0 ? 'checked' : '' }}>
                <div>
                    <span class="text-sm font-bold text-gray-700 block">QRIS / E-Wallet</span>
                    <span class="text-[10px] text-gray-400">Gopay, OVO, Dana, LinkAja</span>
                </div>
            </div>
            <img src="https://upload.wikimedia.org/wikipedia/commons/a/a2/Logo_QRIS.svg" alt="QRIS" class="h-5 grayscale group-hover:grayscale-0 transition">
        </label>

        <!-- Opsi Transfer Bank -->
        <label class="flex items-center justify-between p-4 border border-gray-100 rounded-2xl hover:border-blue-500 hover:bg-blue-50 cursor-pointer transition-all group">
            <div class="flex items-center gap-3">
                <input type="radio" name="payment" value="va" class="w-4 h-4 text-blue-600 focus:ring-blue-500">
                <div>
                    <span class="text-sm font-bold text-gray-700 block">Transfer Bank (VA)</span>
                    <span class="text-[10px] text-gray-400">Virtual Account Mandiri, BNI, BRI</span>
                </div>
            </div>
            <div class="flex gap-1 opacity-50 group-hover:opacity-100 transition">
                <div class="w-6 h-4 bg-gray-200 rounded-sm"></div>
                <div class="w-6 h-4 bg-gray-200 rounded-sm"></div>
            </div>
        </label>

        <!-- Opsi Tunai -->
        <label class="flex items-center justify-between p-4 border border-gray-100 rounded-2xl hover:border-blue-500 hover:bg-blue-50 cursor-pointer transition-all group">
            <div class="flex items-center gap-3">
                <input type="radio" name="payment" value="cash" class="w-4 h-4 text-blue-600 focus:ring-blue-500">
                <div>
                    <span class="text-sm font-bold text-gray-700 block">Tunai di Kasir</span>
                    <span class="text-[10px] text-gray-400">Bayar langsung ke petugas perpus</span>
                </div>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400 group-hover:text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
        </label>
    </div>

    <!-- Tombol Bayar -->
    <button class="w-full bg-blue-600 text-white mt-6 py-4 rounded-2xl font-black hover:bg-blue-700 transition shadow-xl shadow-blue-100 text-sm uppercase tracking-widest {{ $totalDenda == 0 ? 'opacity-50 cursor-not-allowed' : '' }}" {{ $totalDenda == 0 ? 'disabled' : '' }}>
        Konfirmasi Pembayaran
    </button>
</div>

<!-- Catatan Kebijakan (Selalu Muncul) -->
<div class="bg-gray-100 p-6 rounded-2xl border border-gray-200 mt-4">
    <h4 class="text-[10px] font-black text-gray-400 mb-3 uppercase tracking-[0.2em]">Ketentuan Denda</h4>
    <ul class="text-[11px] text-gray-500 space-y-3 italic">
        <li class="flex gap-3 leading-relaxed">
            <span class="text-red-500 font-bold">01.</span>
            Denda keterlambatan buku adalah sebesar **Rp 2.000/hari**.
        </li>
        <li class="flex gap-3 leading-relaxed">
            <span class="text-red-500 font-bold">02.</span>
            Akses peminjaman buku baru akan **dibekukan secara otomatis** oleh sistem jika terdapat denda aktif yang belum dilunasi.
        </li>
    </ul>
</div>

                <!-- Card Info Tambahan -->
                <div class="bg-blue-600 p-6 rounded-2xl shadow-sm text-white">
                    <h4 class="font-bold mb-2 text-sm">Butuh bantuan?</h4>
                    <p class="text-xs text-blue-100 leading-relaxed">
                        Jika ada kendala dalam perpanjangan buku atau kesalahan data, silakan hubungi petugas melalui layanan chat.
                    </p>
                    <a href="#" class="mt-4 block text-center bg-blue-500 py-2 rounded-lg text-xs font-bold hover:bg-blue-400 transition">Hubungi Petugas</a>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
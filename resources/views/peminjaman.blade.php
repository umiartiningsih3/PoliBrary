@extends('layouts.app')

@section('content')

@php
    use Carbon\Carbon;

    $jatuhTempo = Carbon::parse('2026-04-19');
    $hariIni = Carbon::now();

    $terlambat = $hariIni->greaterThan($jatuhTempo)
        ? $hariIni->diffInDays($jatuhTempo)
        : 0;

    $dendaPerHari = 2000;
    $totalDenda = $terlambat * $dendaPerHari;
@endphp

<div class="p-8">

    <h2 class="text-2xl font-bold text-gray-800 mb-6">
        Rincian Pinjaman Buku
    </h2>

    <div class="grid grid-cols-3 gap-6">

        <!-- LEFT -->
        <div class="col-span-2 bg-white p-6 rounded-2xl shadow flex gap-6">

            <!-- COVER -->
            <div class="w-32 h-44 bg-gray-200 rounded-lg"></div>

            <!-- DETAIL -->
            <div class="flex-1 text-sm space-y-7">

            <div class="space-y-3 text-sm">

    <div class="grid grid-cols-[160px_10px_1fr]">
        <span class="font-semibold">Judul Buku</span><span>:</span><span>Introduction to Algorithms</span>
    </div>

    <div class="grid grid-cols-[160px_10px_1fr]">
        <span class="font-semibold">Penulis</span><span>:</span><span>Thomas H. Cormen</span>
    </div>

    <div class="grid grid-cols-[160px_10px_1fr]">
        <span class="font-semibold">Kategori</span><span>:</span><span>Algoritma & Struktur Data</span>
    </div>

    <div class="grid grid-cols-[160px_10px_1fr]">
        <span class="font-semibold">Nomor Inventaris</span><span>:</span><span>INV12345</span>
    </div>

    <div class="grid grid-cols-[160px_10px_1fr]">
        <span class="font-semibold">Status Peminjaman</span><span>:</span><span>Dipinjam</span>
    </div>

    <div class="grid grid-cols-[160px_10px_1fr]">
        <span class="font-semibold">Tanggal Pinjam</span><span>:</span><span>12 April 2026</span>
    </div>

    <div class="grid grid-cols-[160px_10px_1fr]">
        <span class="font-semibold">Jatuh Tempo</span><span>:</span>
        <span>{{ $jatuhTempo->format('d F Y') }}</span>
    </div>

</div>
                <!-- BUTTON -->
                <div class="flex justify-center gap-3 mt-12">

                    <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition text-sm">
                        Perpanjang Peminjaman
                    </button>

                    <button class="bg-gray-200 px-4 py-2 rounded-lg hover:bg-gray-300 transition text-sm">
                        Kembalikan Buku
                    </button>

                </div>

            </div>
        </div>

        <!-- RIGHT -->
        <div class="space-y-4">

            <!-- DENDA -->
            <div class="bg-white p-5 rounded-2xl shadow text-sm">

                <p class="font-bold text-gray-800 mb-2">
                    Denda Keterlambatan
                </p>

                <p>{{ $terlambat }} Hari × Rp {{ number_format($dendaPerHari, 0, ',', '.') }}</p>

                <p class="font-bold text-red-500 text-lg mt-1">
                    Rp {{ number_format($totalDenda, 0, ',', '.') }}
                </p>

                <p class="mt-3 font-semibold">Status</p>

                <p class="{{ $terlambat > 0 ? 'text-red-500' : 'text-green-500' }} font-bold">
                    {{ $terlambat > 0 ? 'Telat Dikembalikan' : 'Belum Telat' }}
                </p>

            </div>

            <!-- PEMBAYARAN -->
            <div class="bg-white p-5 rounded-2xl shadow text-sm">

                <p class="font-bold mb-2">
                    Pembayaran Denda
                </p>

                <p>
                    Total:
                    <span class="text-red-500 font-semibold">
                        Rp {{ number_format($totalDenda, 0, ',', '.') }}
                    </span>
                </p>

                <button class="mt-3 w-full bg-red-500 text-white py-2 rounded-lg hover:bg-red-600 transition">
                    Bayar Denda
                </button>

                <p class="text-xs text-gray-500 mt-2 text-center">
                    Konfirmasi otomatis setelah pembayaran
                </p>

            </div>

        </div>

    </div>

    <!-- RIWAYAT -->
    <div class="mt-8 bg-white p-6 rounded-2xl shadow">

        <h3 class="font-bold text-gray-800 mb-4">
            Riwayat Perpanjangan
        </h3>

        <table class="w-full text-sm border rounded-lg overflow-hidden">

            <thead class="bg-blue-50">
                <tr>
                    <th class="p-3 text-left">Tanggal Perpanjangan</th>
                    <th class="p-3 text-left">Jatuh Tempo Baru</th>
                    <th class="p-3 text-left">Keterangan</th>
                </tr>
            </thead>

            <tbody>
                <tr class="border-t">
                    <td class="p-3">12/04/2026</td>
                    <td class="p-3">19/04/2026</td>
                    <td class="p-3 text-green-600">Perpanjangan Disetujui</td>
                </tr>

                <tr class="border-t">
                    <td class="p-3">19/04/2026</td>
                    <td class="p-3">26/04/2026</td>
                    <td class="p-3 text-green-600">Perpanjangan Disetujui</td>
                </tr>
            </tbody>

        </table>

    </div>

</div>

@endsection
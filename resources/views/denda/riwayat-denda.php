@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-10 px-6">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-3xl font-bold text-slate-800">Riwayat Denda</h2>
            <p class="text-slate-500">Monitoring denda keterlambatan buku</p>
        </div>
        
        <a href="{{ route('denda.export') }}" class="flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white px-6 py-2.5 rounded-lg font-semibold transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
            Export Excel
        </a>
    </div>

    <div class="bg-white shadow-sm rounded-2xl border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-slate-50 text-slate-600 uppercase font-semibold">
                    <tr>
                        <th class="px-6 py-4">Nama Mahasiswa</th>
                        <th class="px-6 py-4">Judul Buku</th>
                        <th class="px-6 py-4">Tanggal Jatuh Tempo</th>
                        <th class="px-6 py-4">Keterlambatan</th>
                        <th class="px-6 py-4">Total Denda</th>
                        <th class="px-6 py-4">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($riwayatDenda as $denda)
                    <tr class="hover:bg-slate-50 transition">
                        <td class="px-6 py-4 font-medium">{{ $denda->user->name }}</td>
                        <td class="px-6 py-4">{{ $denda->peminjaman->buku->judul }}</td>
                        <td class="px-6 py-4">{{ $denda->tgl_jatuh_tempo }}</td>
                        <td class="px-6 py-4">{{ $denda->hari_terlambat }} Hari</td>
                        <td class="px-6 py-4 text-red-600 font-bold">Rp {{ number_format($denda->jumlah_denda, 0, ',', '.') }}</td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $denda->status == 'Lunas' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                {{ $denda->status }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
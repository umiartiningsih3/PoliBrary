@extends('layouts.app')

@section('content')
<div class="bg-gray-50 min-h-screen py-8 px-4 md:px-12">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
            <div>
                <h1 class="text-2xl font-black text-gray-800">Monitoring Riwayat Denda</h1>
                <p class="text-sm text-gray-500">Daftar lengkap denda dan status pembayaran pengguna.</p>
            </div>
            
            <a href="{{ route('denda.export') }}" 
               class="flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white px-6 py-2.5 rounded-xl font-bold transition shadow-lg shadow-green-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                Export Excel
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-gray-50 border-b border-gray-100">
                        <tr class="text-gray-400 text-xs uppercase tracking-wider">
                            <th class="px-6 py-4">Peminjam</th>
                            <th class="px-6 py-4">Buku</th>
                            <th class="px-6 py-4">Tanggal Bayar</th>
                            <th class="px-6 py-4">Nominal</th>
                            <th class="px-6 py-4 text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($riwayatDenda as $denda)
                        <tr class="hover:bg-blue-50/30 transition">
                            <td class="px-6 py-4 text-sm font-bold text-gray-800">{{ $denda->user->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $denda->buku->judul }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{ $denda->tgl_bayar ? \Carbon\Carbon::parse($denda->tgl_bayar)->format('d M Y') : '-' }}
                            </td>
                            <td class="px-6 py-4 text-sm font-black text-red-600">
                                Rp {{ number_format($denda->jumlah_denda, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="px-3 py-1 text-[10px] font-black uppercase rounded-full {{ $denda->status == 'lunas' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                    {{ $denda->status }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-10 text-gray-400 italic">Data tidak ditemukan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="p-4 border-t border-gray-100">
                {{ $riwayatDenda->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
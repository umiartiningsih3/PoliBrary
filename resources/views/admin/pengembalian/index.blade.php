@extends('layouts.app')

@section('content')
<div class="bg-gray-50 min-h-screen py-10 px-4 md:px-12">
    <div class="max-w-7xl mx-auto">
        
        <div class="bg-white p-6 md:p-8 rounded-xl shadow-sm border border-gray-100">
            <div class="mb-8 border-b pb-4 flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Konfirmasi Pengembalian</h1>
                    <p class="text-sm text-gray-500">Tinjau dan konfirmasi buku yang telah dikembalikan oleh mahasiswa.</p>
                </div>
                <span class="bg-blue-100 text-blue-700 text-xs font-bold px-3 py-1 rounded-full">
                    {{ $peminjamans->count() }} Peminjaman Aktif
                </span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-gray-50 text-gray-500 text-[10px] uppercase font-bold tracking-wider">
                        <tr>
                            <th class="px-6 py-4 text-left">Mahasiswa</th>
                            <th class="px-6 py-4 text-left">Buku</th>
                            <th class="px-6 py-4 text-left text-red-600">Jatuh Tempo</th>
                            <th class="px-6 py-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($peminjamans as $pinjam)
                        <tr class="hover:bg-gray-50/50 transition">
                            <td class="px-6 py-5">
                                <div class="font-bold text-gray-800">{{ $pinjam->mahasiswa->nama }}</div>
                                <div class="text-[10px] text-gray-400">NIM: {{ $pinjam->mahasiswa->nim }}</div>
                            </td>
                            <td class="px-6 py-5">
                                <div class="text-gray-700">{{ $pinjam->buku->judul }}</div>
                                <div class="text-[10px] text-gray-400 italic">ISBN: {{ $pinjam->buku->isbn }}</div>
                            </td>
                            <td class="px-6 py-5 font-mono text-gray-600">
                                {{ $pinjam->tgl_jatuh_tempo }}
                            </td>
                            <td class="px-6 py-5 text-center">
                                <form action="{{ route('admin.pengembalian.konfirmasi', $pinjam->id) }}" method="POST" 
                                      onsubmit="return confirm('Apakah buku ini sudah diterima dengan kondisi baik?')">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="bg-slate-900 text-white px-4 py-2 rounded-lg text-xs font-bold hover:bg-green-600 shadow-sm transition">
                                        Konfirmasi Kembali
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-6 py-10 text-center text-gray-500">Tidak ada buku yang sedang dipinjam saat ini.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-8 flex gap-4 p-4 bg-blue-50 rounded-xl border border-blue-100">
                <p class="text-xs text-blue-800 leading-relaxed italic">
                    <strong>Catatan Petugas:</strong> Mengonfirmasi pengembalian akan secara otomatis memperbarui status buku di sistem dan mencatat transaksi pengembalian mahasiswa.
                </p>
            </div>
        </div>
        
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="bg-gray-50 min-h-screen py-10 px-4 md:px-12">
    <div class="max-w-7xl mx-auto">
        <div class="bg-white p-6 md:p-8 rounded-xl shadow-sm border border-gray-100">
            
            <div class="mb-8 border-b pb-4 flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Antrean Perpanjangan</h1>
                    <p class="text-sm text-gray-500">Tinjau dan setujui permintaan tambahan waktu pinjam mahasiswa.</p>
                </div>
                <span class="bg-pink-100 text-pink-700 text-xs font-bold px-3 py-1 rounded-full">
                    {{ $perpanjangans->count() }} Permintaan Baru
                </span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-gray-50 text-gray-500 text-[10px] uppercase font-bold tracking-wider">
                        <tr>
                            <th class="px-6 py-4 text-left">Mahasiswa</th>
                            <th class="px-6 py-4 text-left">Buku</th>
                            <th class="px-6 py-4 text-left text-orange-600">Jatuh Tempo</th>
                            <th class="px-6 py-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($perpanjangans as $pinjam)
                        <tr class="hover:bg-gray-50/50 transition">
                            <td class="px-6 py-5">
                                <div class="font-bold text-gray-800">{{ $pinjam->mahasiswa->nama ?? 'N/A' }}</div>
                                <div class="text-[10px] text-gray-400">NIM: {{ $pinjam->mahasiswa->nim ?? '-' }}</div>
                            </td>
                            <td class="px-6 py-5">
                                <div class="text-gray-700">{{ $pinjam->buku->judul ?? 'N/A' }}</div>
                                <div class="text-[10px] text-gray-400 italic">ISBN: {{ $pinjam->buku->isbn ?? '-' }}</div>
                            </td>
                            <td class="px-6 py-5 font-mono text-gray-600">
                                {{ $pinjam->tgl_jatuh_tempo }}
                            </td>
                            <td class="px-6 py-5 text-center">
                                <div class="flex justify-center gap-2">
                                    <form action="{{ route('admin.perpanjangan.approve', $pinjam->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="bg-green-600 text-white px-3 py-1.5 rounded-lg text-[11px] font-bold hover:bg-green-700 transition">Setujui</button>
                                    </form>
                                    <form action="{{ route('admin.perpanjangan.reject', $pinjam->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="border border-red-200 text-red-500 px-3 py-1.5 rounded-lg text-[11px] font-bold hover:bg-red-50 transition">Tolak</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-6 py-10 text-center text-gray-500 italic">Tidak ada permintaan perpanjangan saat ini.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-8 flex gap-4 p-4 bg-blue-50 rounded-xl border border-blue-100">
                <p class="text-xs text-blue-800 leading-relaxed italic">
                    <strong>Catatan:</strong> Menyetujui perpanjangan akan otomatis menambah masa pinjam selama 7 hari dari tanggal jatuh tempo.
                </p>
            </div>
            
        </div>
    </div>
</div>
@endsection
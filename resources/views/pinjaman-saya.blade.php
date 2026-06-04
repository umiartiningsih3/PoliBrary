@extends('layouts.app')

@section('content')
<div class="bg-gray-50 min-h-screen py-10 px-4 md:px-12">
    <div class="max-w-6xl mx-auto">
        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
            
            <div class="mb-8 flex justify-between items-center border-b border-gray-50 pb-6">
                <div>
                    <h1 class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-[#0052cc] to-[#3b82f6]">
                        Pinjaman Saya
                    </h1>
                    <p class="text-sm text-gray-500 mt-1">Daftar buku yang sedang Anda pinjam saat ini</p>
                </div>
                <span class="bg-blue-50 text-[#0052cc] text-xs font-bold px-4 py-2 rounded-full border border-blue-100">
                    {{ $dataPinjaman->count() }} Buku Dipinjam
                </span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-gray-100 text-gray-400 text-xs uppercase tracking-wider">
                            <th class="py-4 px-2 font-medium">Buku</th>
                            <th class="py-4 px-2 font-medium">Tgl Pinjam</th>
                            <th class="py-4 px-2 font-medium">Tgl Kembali</th>
                            <th class="py-4 px-2 font-medium">Status</th>
                            <th class="py-4 px-2 font-medium">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach($dataPinjaman as $pinjaman)
                        <tr class="border-b border-gray-100">
                            <td class="py-4 px-2 flex items-center gap-4">
                                <div class="w-12 h-16 bg-gray-50 rounded shadow-inner flex items-center justify-center overflow-hidden border border-gray-100">
                                    <img src="{{ asset('image/Polibrary-logo.png') }}" alt="Logo" class="w-8 h-8 object-contain grayscale opacity-60">
                                </div>
                                <div>
                                    <h3 class="font-bold text-sm text-gray-800">{{ $pinjaman->judul }}</h3>
                                    <p class="text-xs text-gray-400">{{ $pinjaman->penulis }}</p>
                                </div>
                            </td>
                            <td class="py-4 px-2 text-sm text-gray-600">{{ $pinjaman->tgl_pinjam }}</td>
                            <td class="py-4 px-2 text-sm text-red-500 font-medium">{{ $pinjaman->tgl_kembali }}</td>
                            <td class="py-4 px-2">
                                <span class="bg-yellow-50 text-yellow-700 text-[10px] font-bold px-3 py-1 rounded-full border border-yellow-100 uppercase">
                                    {{ $pinjaman->status }}
                                </span>
                            </td>
                            <td class="py-4 px-2">
                                <a href="{{ route('peminjaman.detail', $pinjaman->id) }}" class="text-[#0052cc] font-bold text-sm hover:underline">Detail</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="bg-gray-50 min-h-screen py-10 px-4 md:px-12">
    <div class="max-w-6xl mx-auto flex flex-col md:flex-row gap-8">
        
        <!-- Sidebar Kiri -->
        <div class="w-full md:w-1/4">
            <!-- Profil Singkat -->
            <div class="flex items-center gap-4 mb-6">
                <img src="/image/user-avatar.png" alt="Avatar" class="w-16 h-16 rounded-full border-2 border-blue-500">
                <div>
                    <h2 class="font-bold text-lg text-gray-800">Umiarti Ningsih</h2>
                    <p class="text-sm text-gray-500">Mahasiswa</p>
                </div>
            </div>

            <!-- Menu Navigasi -->
            <nav class="space-y-1 border-t pt-6 text-sm">
                <a href="#" class="flex items-center gap-3 px-4 py-2.5 text-gray-700 hover:bg-gray-100 rounded-xl transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    Akun Saya
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-2.5 text-gray-700 hover:bg-gray-100 rounded-xl transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    Pinjaman Saya
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-2.5 text-gray-700 hover:bg-gray-100 rounded-xl transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                    Disukai Saya
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-2.5 text-gray-700 hover:bg-gray-100 rounded-xl transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                    Keamanan Saya
                </a>
                <!-- Link Aktif -->
                <a href="{{ route('riwayat.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-blue-700 font-bold bg-blue-50 rounded-xl transition shadow-sm shadow-blue-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Riwayat Peminjaman
                </a>
            </nav>
        </div>

        <!-- Konten Utama -->
        <div class="flex-1">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 gap-4">
                <div>
                    <h1 class="text-3xl font-extrabold text-gray-800 tracking-tight">Riwayat Peminjaman</h1>
                    <p class="text-gray-500 text-sm">Daftar buku yang pernah Anda pinjam di Perpustakaan Digital.</p>
                </div>
                
                <!-- Tombol Cetak PDF -->
                <a href="{{ route('riwayat.pdf') }}" class="flex items-center gap-2 bg-red-600 text-white px-5 py-2.5 rounded-xl font-bold hover:bg-red-700 transition shadow-lg shadow-red-100 text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Cetak PDF
                </a>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden text-sm">
    <table class="w-full text-left">
        <!-- Header dengan warna Slate Blue yang tidak mencolok -->
        <thead class="bg-slate-100 border-b border-slate-200">
            <tr>
                <th class="px-6 py-4 font-bold text-slate-600 uppercase tracking-wider">Judul Buku</th>
                <th class="px-6 py-4 font-bold text-slate-600 uppercase tracking-wider">Tanggal Pinjam</th>
                <th class="px-6 py-4 font-bold text-slate-600 uppercase tracking-wider">Tanggal Kembali</th>
                <th class="px-6 py-4 font-bold text-slate-600 uppercase tracking-wider">Status</th>
                <th class="px-6 py-4 font-bold text-slate-600 uppercase tracking-wider">Denda</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @foreach($riwayat as $item)
            <tr class="hover:bg-gray-50 transition">
                <td class="px-6 py-4 font-bold text-gray-800">{{ $item['judul'] }}</td>
                <td class="px-6 py-4 text-gray-600">{{ $item['tgl_pinjam'] }}</td>
                <td class="px-6 py-4 text-gray-600">{{ $item['tgl_kembali'] }}</td>
                <td class="px-6 py-4">
                    <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase {{ $item['status'] == 'Dikembalikan' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                        {{ $item['status'] }}
                    </span>
                </td>
                <td class="px-6 py-4 font-bold {{ $item['denda'] > 0 ? 'text-red-600' : 'text-gray-400' }}">
                    Rp {{ number_format($item['denda'], 0, ',', '.') }}
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
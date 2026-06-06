@extends('layouts.app')

@section('content')
<div class="bg-gray-50 min-h-screen py-10 px-4 md:px-12">
    <div class="max-w-7xl mx-auto">
        
        <div class="bg-white p-6 md:p-8 rounded-xl shadow-sm border border-gray-100">
            
            <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4 border-b pb-6">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Manajemen Anggota</h1>
                    <p class="text-sm text-gray-500">Kelola informasi akun dan daftar mahasiswa yang terdaftar di sistem.</p>
                </div>
                <a href="{{ route('admin.register') }}" class="inline-flex items-center gap-2 bg-pink-600 text-white px-5 py-2.5 rounded-lg font-bold text-xs hover:bg-pink-700 transition shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    Tambah Anggota
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-gray-50 text-gray-500 text-[10px] uppercase font-bold tracking-wider">
                        <tr>
                            <th class="px-6 py-4 text-left">NIM</th>
                            <th class="px-6 py-4 text-left">Nama Lengkap</th>
                            <th class="px-6 py-4 text-left">Prodi</th>
                            <th class="px-6 py-4 text-left">Terdaftar</th>
                            <th class="px-6 py-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($mahasiswas as $mhs)
                        <tr class="hover:bg-gray-50/50 transition">
                            <td class="px-6 py-5 font-mono text-gray-600">{{ $mhs->nim }}</td>
                            <td class="px-6 py-5 font-bold text-gray-800">{{ $mhs->name }}</td>
                            <td class="px-6 py-5">
                                <span class="px-2 py-1 bg-pink-50 text-pink-700 rounded-md text-[10px] font-bold uppercase tracking-wide">
                                    {{ $mhs->prodi }}
                                </span>
                            </td>
                            <td class="px-6 py-5 text-gray-500 text-xs">
                                {{ $mhs->created_at ? $mhs->created_at->format('d M Y') : '-' }}
                            </td>
                            <td class="px-6 py-5 text-center">
                                <div class="flex justify-center gap-3">
                                    <a href="#" class="text-blue-500 hover:text-blue-700 font-bold text-xs">Edit</a>
                                    <form action="#" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-400 hover:text-red-600 font-bold text-xs">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-10 text-center text-gray-500 italic">Belum ada data mahasiswa terdaftar.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</div>
@endsection
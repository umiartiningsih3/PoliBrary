@extends('layouts.app')

@section('content')
<div class="bg-gray-50 min-h-screen py-10 px-4 md:px-12">
    <div class="max-w-7xl mx-auto">
        
        <div class="bg-white p-6 md:p-8 rounded-xl shadow-sm border border-gray-100">
            <div class="mb-8 border-b pb-4 flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Daftar Mahasiswa</h1>
                    <p class="text-sm text-gray-500">Kelola data anggota mahasiswa yang terdaftar di sistem.</p>
                </div>
                <a href="{{ route('admin.mahasiswa.create') }}" class="bg-pink-600 text-white px-5 py-2 rounded-lg text-sm font-bold hover:bg-pink-700 transition">
                    + Tambah Mahasiswa
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-gray-50 text-gray-500 text-[10px] uppercase font-bold tracking-wider">
                        <tr>
                            <th class="px-6 py-4 text-left">Nama</th>
                            <th class="px-6 py-4 text-left">NIM</th>
                            <th class="px-6 py-4 text-left">Prodi</th>
                            <th class="px-6 py-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($mahasiswas as $mhs)
                        <tr class="hover:bg-gray-50/50 transition">
                            <td class="px-6 py-5 font-bold text-gray-800">{{ $mhs->name }}</td>
                            <td class="px-6 py-5 text-gray-600 font-mono">{{ $mhs->nim }}</td>
                            <td class="px-6 py-5 text-gray-600">{{ $mhs->prodi }}</td>
                            <td class="px-6 py-5 text-center">

                            <td class="px-6 py-5 text-center flex justify-center gap-2">
    <a href="{{ route('admin.mahasiswa.edit', $mhs->id) }}" class="text-blue-600 font-bold">Edit</a>
                                <form action="{{ route('admin.mahasiswa.destroy', $mhs->id) }}" method="POST" 
      onsubmit="return confirm('Yakin ingin menghapus?')">
    @csrf
    @method('DELETE')
    
    <button type="submit" class="text-red-600 font-bold">Hapus</button>
</form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-6 py-10 text-center text-gray-500">Belum ada data mahasiswa.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
</div>
@endsection
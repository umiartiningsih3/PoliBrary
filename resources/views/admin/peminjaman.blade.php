@extends('layouts.app')

@section('content')

<div class="bg-gray-50 min-h-screen py-10 px-4 md:px-12">
    <div class="max-w-7xl mx-auto">

    <div class="bg-white p-6 md:p-8 rounded-xl shadow-sm border border-gray-100">

        <div class="mb-8 border-b pb-4 flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">
                    Antrean Peminjaman
                </h1>
                <p class="text-sm text-gray-500">
                    Tinjau dan setujui permintaan peminjaman buku mahasiswa.
                </p>
            </div>

            <span class="bg-blue-100 text-blue-700 text-xs font-bold px-3 py-1 rounded-full">
                {{ $peminjaman->count() }} Permintaan Baru
            </span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-50 text-gray-500 text-[10px] uppercase font-bold tracking-wider">
                    <tr>
                        <th class="px-6 py-4 text-left">Mahasiswa</th>
                        <th class="px-6 py-4 text-left">Buku</th>
                        <th class="px-6 py-4 text-left">Tanggal Pengajuan</th>
                        <th class="px-6 py-4 text-left">Status</th>
                        <th class="px-6 py-4 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">
                    @forelse($peminjaman as $pinjam)
                    <tr class="hover:bg-gray-50 transition">

                        <td class="px-6 py-5">
                            <div class="font-bold text-gray-800">
                                {{ $pinjam->mahasiswa->nama }}
                            </div>
                            <div class="text-[10px] text-gray-400">
                                NIM: {{ $pinjam->mahasiswa->nim }}
                            </div>
                        </td>

                        <td class="px-6 py-5">
                            <div class="font-medium text-gray-700">
                                {{ $pinjam->buku->judul }}
                            </div>
                            <div class="text-[10px] text-gray-400">
                                {{ $pinjam->buku->penulis }}
                            </div>
                        </td>

                        <td class="px-6 py-5 text-gray-600">
                            {{ $pinjam->created_at->format('d-m-Y H:i') }}
                        </td>

                        <td class="px-6 py-5">
                            <span class="bg-yellow-100 text-yellow-700 text-xs px-3 py-1 rounded-full font-bold">
                                {{ $pinjam->status }}
                            </span>
                        </td>

                        <td class="px-6 py-5">
                            <div class="flex justify-center gap-3">

                                <form action="{{ route('admin.peminjaman.approve', $pinjam->id) }}" method="POST">
                                    @csrf
                                    <button
                                        type="submit"
                                        class="bg-green-600 text-white px-4 py-2 rounded-lg text-xs font-bold hover:bg-green-700 transition">
                                        Setujui
                                    </button>
                                </form>

                                <form action="{{ route('admin.peminjaman.reject', $pinjam->id) }}" method="POST">
                                    @csrf
                                    <button
                                        type="submit"
                                        class="border border-red-200 text-red-500 px-4 py-2 rounded-lg text-xs font-bold hover:bg-red-50 transition">
                                        Tolak
                                    </button>
                                </form>

                            </div>
                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-10 text-center text-gray-500">
                            Tidak ada permintaan peminjaman saat ini.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-8 p-4 bg-blue-50 rounded-xl border border-blue-100">
            <p class="text-xs text-blue-800 italic">
                <strong>Catatan Petugas:</strong>
                Setelah disetujui, status peminjaman akan berubah menjadi
                <b>Dipinjam</b> dan otomatis muncul pada halaman
                <b>Pinjaman Saya</b> milik mahasiswa.
            </p>
        </div>

    </div>

</div>

</div>
@endsection

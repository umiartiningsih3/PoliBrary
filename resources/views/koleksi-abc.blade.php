@extends('layouts.app')

@section('content')
<div class="p-6 space-y-6">

    <!-- TITLE -->
    <div class="text-center">
        <h2 class="text-2xl font-bold">Koleksi Buku</h2>

        <!-- NAVIGATION -->
        <div class="bg-white border-y mt-5">
            <div class="flex justify-center gap-8 text-sm font-medium px-3 py-2">
                <span class="pb-2 border-b-2 border-pink-500 text-pink-600 font-semibold">
                    Daftar ABC
                </span>
                <span class="cursor-pointer text-gray-500 hover:text-black pb-2 border-b-2 border-transparent hover:border-gray-400">
                    Daftar berdasarkan Subjek
                </span>
            </div>
        </div>
    </div>

    <!-- SEARCH BAR -->
    <div class="flex justify-center mt-6">
        <div class="bg-white border rounded px-6 py-4 flex items-center gap-3">
            <label class="font-medium">Kata kunci :</label>
            <select class="border px-2 py-1 text-sm rounded">
                <option value="judul">Judul</option>
                <option value="isbn">ISBN</option>
                <option value="penulis">Penulis</option>
            </select>
            <input type="text" class="border px-2 py-1 w-64 text-sm rounded"
                placeholder="Masukkan istilah penelusuran">
            <button class="bg-pink-500 text-white px-3 py-1 text-sm rounded">Pencarian</button>
        </div>
    </div>

    <!-- ALPHABET FILTER -->
    <div class="bg-white border rounded px-6 py-3 mt-4 flex flex-wrap gap-2 text-xs justify-center">
        <span class="bg-pink-500 text-white px-2 rounded">Semua</span>
        @foreach(range('A','Z') as $huruf)
            <span class="bg-gray-100 px-2 rounded">{{ $huruf }}</span>
        @endforeach
    </div>

    <!-- PAGINATION AT TOP -->
    <div class="bg-white border rounded p-3 mt-4 text-sm flex items-center justify-between flex-wrap">
        <!-- Kiri: Kata Kunci -->
        <span>Kata Kunci : <span class="text-red-500">ABC</span> Semua</span>

        <!-- Kanan: Kontrol Pagination -->
        <div class="flex items-center gap-4">
            <button class="border px-2 rounded">&laquo;</button>
            <span>Halaman <b>1</b> / 700</span>
            <button class="border px-2 rounded">&raquo;</button>

            <select class="border px-2 py-1 text-sm rounded">
                <option>Relevansi</option>
                <option>Terbaru</option>
                <option>Judul A-Z</option>
            </select>

            <select class="border px-2 py-1 text-sm rounded">
                <option>10</option>
                <option>20</option>
                <option>50</option>
            </select>

            <button class="border px-3 py-1 text-sm rounded">Inquiry</button>
        </div>
    </div>

    <!-- CONTENT -->
    <div class="grid grid-cols-4 gap-6 mt-6">

        <!-- LEFT -->
        <div class="col-span-3 space-y-4">

            <!-- Buku 1 (detail terbuka, ikon minus) -->
            <div class="bg-white border rounded p-4 text-sm">
                <div class="flex justify-between items-center">
                    <h3 class="font-bold">Introduction to Algorithms</h3>
                    <span class="text-xl">−</span>
                </div>
                <div class="flex gap-2 mt-2 text-xs">
                    <button class="border px-2">Detail</button>
                    <button class="border px-2">Tandai</button>
                    <span class="text-green-600">Tersedia 2</span>
                </div>
            </div>

            <!-- Buku 2 (detail belum dibuka, ikon panah) -->
            <div class="bg-white border rounded p-4 text-sm">
                <div class="flex justify-between items-center">
                    <h3 class="font-bold">Clean Code: A Handbook of Agile Software Craftsmanship</h3>
                    <span class="text-xl">↓</span>
                </div>
                <div class="flex gap-2 mt-2 text-xs">
                    <button class="border px-2">Detail</button>
                    <button class="border px-2">Tandai</button>
                    <span class="text-green-600">Tersedia 1</span>
                </div>
            </div>

            <!-- NEXT PAGE BUTTON -->
            <div class="mt-4 text-right">
                <button class="bg-pink-500 text-white px-3 py-1 text-sm rounded">
                    Halaman Berikutnya →
                </button>
            </div>

        </div>

        <!-- RIGHT -->
        <div>
            <div class="bg-white border rounded p-4 text-sm">
                <h4 class="font-bold mb-2">Kategori Subjek</h4>
                @php
                    $subjek = [
                        ["nama" => "Fiksi", "jumlah" => 12],
                        ["nama" => "Non-Fiksi", "jumlah" => 8],
                        ["nama" => "Pendidikan", "jumlah" => 15],
                        ["nama" => "Ilmu Pengetahuan", "jumlah" => 20],
                        ["nama" => "Teknologi & Komputer", "jumlah" => 9],
                        ["nama" => "Sosial & Humaniora", "jumlah" => 11],
                        ["nama" => "Bahasa", "jumlah" => 7],
                        ["nama" => "Seni & Budaya", "jumlah" => 6],
                        ["nama" => "Agama", "jumlah" => 10],
                        ["nama" => "Referensi", "jumlah" => 5],
                    ];
                @endphp

                <ul class="space-y-1">
                    @foreach($subjek as $s)
                        <li>{{ $s['nama'] }} ({{ $s['jumlah'] }})</li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>

</div>
@endsection

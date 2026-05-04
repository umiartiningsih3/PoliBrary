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

        <!-- LEFT (List Buku) -->
        <div class="col-span-3 space-y-8">

            <!-- Buku 1 (Detail Terbuka / Expanded) -->
            <div class="flex gap-6 border-t pt-6 relative">
                <!-- Nomor Urut -->
                <div class="text-xl font-bold">1</div>
                
                <!-- Foto & Tombol Kiri -->
                <div class="w-32 flex flex-col gap-1">
                    <div class="w-full h-40 bg-gray-200 rounded"></div>
                    <button class="bg-gray-200 text-black py-1 text-xs font-bold rounded">Detail</button>
                    <button class="bg-gray-200 text-black py-1 text-xs font-bold rounded">Tersedia 2</button>
                    <button class="bg-gray-200 text-black py-1 text-xs font-bold rounded flex items-center justify-center gap-1">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path></svg>
                        Tandai
                    </button>
                </div>

                <!-- Konten Detail (Tabel) -->
                <div class="flex-1">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="text-lg font-bold leading-tight">Introduction to Algorithms</h3>
                        <button class="bg-gray-300 rounded-full w-6 h-6 flex items-center justify-center text-xl font-bold">−</button>
                    </div>
                    
                    <table class="w-full text-xs border-collapse">
                        <tr class="border-y border-gray-800">
                            <td class="py-2 font-bold w-32">ISBN</td>
                            <td class="py-2">978-0262033848</td>
                        </tr>
                        <tr class="border-b border-gray-800">
                            <td class="py-2 font-bold">Subjek Kategori</td>
                            <td class="py-2 text-gray-800 font-medium">Algoritma & Struktur Data</td>
                        </tr>
                        <tr class="border-b border-gray-800">
                            <td class="py-2 font-bold">Penerbit</td>
                            <td class="py-2">MIT Press</td>
                        </tr>
                        <tr class="border-b border-gray-800">
                            <td class="py-2 font-bold">Tahun Terbit</td>
                            <td class="py-2">2009 (Edisi ke-3)</td>
                        </tr>
                        <tr class="border-b border-gray-800">
                            <td class="py-2 font-bold">Penulis</td>
                            <td class="py-2">Thomas H. Cormen, Charles E. Leiserson, Ronald L. Rivest, Clifford Stein</td>
                        </tr>
                    </table>
                </div>
            </div>

            <!-- Buku 2 (Detail Tertutup / Collapsed) -->
            <div class="flex gap-6 border-t pt-6 relative">
                <!-- Nomor Urut -->
                <div class="text-xl font-bold">2</div>
                
                <!-- Foto -->
                <div class="w-32">
                    <div class="w-full h-40 bg-gray-200 rounded"></div>
                </div>

                <!-- Konten Singkat -->
                <div class="flex-1">
                    <p class="text-xs text-gray-400 font-medium mb-1">Rekayasa Perangkat Lunak / Clean Code</p>
                    <div class="flex justify-between items-start">
                        <h3 class="text-lg font-bold leading-tight">Clean Code: A Handbook of Agile Software Craftsmanship</h3>
                        <button class="bg-gray-300 rounded-full w-6 h-6 flex items-center justify-center text-xl font-bold rotate-180">^</button>
                    </div>
                    <p class="text-xs font-bold mt-1 mb-3">Robert C. Martin</p>
                    
                    <!-- Tombol Sejajar -->
                    <div class="flex gap-2">
                        <button class="bg-gray-200 px-6 py-1 text-xs font-bold rounded">Detail</button>
                        <button class="bg-gray-200 px-6 py-1 text-xs font-bold rounded">Tersedia 1</button>
                        <button class="bg-gray-200 px-6 py-1 text-xs font-bold rounded flex items-center gap-1">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path></svg>
                            Tandai
                        </button>
                    </div>
                </div>
            </div>

            <!-- NEXT PAGE BUTTON -->
            <div class="mt-8 text-right border-t pt-4">
                <button class="bg-pink-500 text-white px-4 py-2 text-sm font-bold rounded shadow-sm">
                    Halaman Berikutnya →
                </button>
            </div>

        </div>

        <!-- RIGHT (Sidebar Kategori) -->
        <div class="space-y-4">
            <div class="bg-white border rounded p-4 text-sm shadow-sm">
                <h4 class="font-bold mb-3 text-gray-700 border-b pb-2">Kategori Subjek</h4>
                @php
                    $subjek = [
                        ["nama" => "Fiksi", "jumlah" => 12],
                        ["nama" => "Non-Fiksi", "jumlah" => 8],
                        ["nama" => "Pendidikan", "jumlah" => 15],
                        ["nama" => "Ilmu Pengetahuan", "jumlah" => 20],
                        ["nama" => "Teknologi & Komputer", "jumlah" => 9],
                    ];
                @endphp

                <ul class="space-y-2">
                    @foreach($subjek as $s)
                        <li class="flex justify-between items-center hover:text-pink-500 cursor-pointer transition-colors">
                            <span>{{ $s['nama'] }}</span>
                            <span class="text-gray-400">({{ $s['jumlah'] }})</span>
                        </li>
                    @endforeach
                </ul>
            </div>
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

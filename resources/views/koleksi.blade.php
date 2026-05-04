@extends('layouts.app')

@section('content')
<div class="p-6 space-y-6">

    <!-- TITLE -->
    <div class="text-center">
        <h2 class="text-2xl font-bold">Koleksi Buku</h2>

        <!-- NAVIGATION -->
        <div class="flex justify-center gap-6 mt-3 text-sm font-medium border-b">
            <span class="cursor-pointer text-gray-500 hover:text-black pb-2 border-b-2 border-transparent hover:border-gray-400">
                Daftar ABC
            </span>
            <span class="pb-2 border-b-2 border-pink-500 text-pink-600 font-semibold">
                Daftar berdasarkan Subjek
            </span>
        </div>
    </div>

    <!-- GRID SUBJEK -->
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

        $aktif = $subjek[0]; // kategori pertama aktif
    @endphp

    <div class="grid grid-cols-3 gap-4 mt-6">
        @foreach ($subjek as $item)
            <div class="flex items-center gap-3 px-4 py-3 rounded-lg shadow cursor-pointer transition
                        {{ $item['nama'] === $aktif['nama'] ? 'bg-pink-500 text-white' : 'bg-white hover:bg-pink-50' }}">
                <!-- ANGKA DI KIRI -->
                <div class="flex items-center justify-center w-10 h-10 
                            {{ $item['nama'] === $aktif['nama'] ? 'bg-white text-pink-500' : 'bg-gray-200 text-black' }}
                            text-sm font-bold rounded">
                    {{ $item['jumlah'] }}
                </div>
                <!-- NAMA SUBJEK -->
                <span class="text-sm font-medium">{{ $item['nama'] }}</span>
            </div>
        @endforeach
    </div>

    <!-- DETAIL KATEGORI TERPILIH -->
    <div class="bg-gray-50 border rounded p-5 mt-6">
        <div class="flex justify-between items-center">
            <h3 class="font-bold">
                {{ $aktif['nama'] }}
                <span class="text-red-500 text-sm">{{ $aktif['jumlah'] }} item</span>
            </h3>
            <a href="#" class="text-sm text-red-500 hover:underline">
                Lihat publikasi lainnya >
            </a>
        </div>

        <!-- SUBKATEGORI -->
        @php
            $subkategori = [
                ["nama" => "Novel", "jumlah" => 5],
                ["nama" => "Cerpen", "jumlah" => 3],
                ["nama" => "Drama", "jumlah" => 2],
                ["nama" => "Puisi", "jumlah" => 2],
            ];
            $aktifSub = $subkategori[0]; // subkategori pertama aktif
        @endphp

        <div class="flex flex-wrap gap-2 mt-4 text-xs">
            @foreach ($subkategori as $sub)
                <span class="px-3 py-1 rounded cursor-pointer transition
                             {{ $sub['nama'] === $aktifSub['nama'] ? 'bg-pink-500 text-white font-semibold' : 'bg-white border hover:bg-pink-500 hover:text-white' }}">
                    {{ $sub['nama'] }} ({{ $sub['jumlah'] }})
                </span>
            @endforeach
        </div>

        <!-- DETAIL LIST SUBKATEGORI TERPILIH -->
        <div class="mt-5 border-t pt-4">
            <div class="flex justify-between items-center">
                <h4 class="font-semibold text-sm">
                    {{ $aktifSub['nama'] }}
                    <span class="text-gray-500 text-xs">{{ $aktifSub['jumlah'] }} item</span>
                </h4>
                <a href="#" class="text-xs text-red-500 hover:underline">
                    Lihat publikasi lainnya >
                </a>
            </div>

            <ul class="mt-2 text-sm text-red-500 list-disc ml-6 space-y-1">
                <li>Fantasi (2)</li>
                <li>Romansa (1)</li>
                <li>Misteri (2)</li>
            </ul>
        </div>
    </div>

</div>
@endsection

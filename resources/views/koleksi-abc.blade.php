<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Koleksi Buku</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-200">

<!-- Navbar -->
<div class="bg-white shadow px-6 py-3 flex justify-between items-center">
    <div class="text-xl font-bold text-blue-600">FUDi-gital</div>

    <div class="flex items-center gap-2">
        <input type="text" placeholder="Cari" class="border px-2 py-1">
        <span>🔍</span>
    </div>

    <div class="flex gap-4">
        <a href="#">Informasi</a>
        <a href="#">Jelajahi ▾</a>
        <div class="w-8 h-8 bg-blue-300 rounded-full"></div>
    </div>
</div>

<!-- Title -->
<div class="text-center mt-4">
    <h2 class="text-xl font-bold">Koleksi Buku</h2>

    <div class="flex justify-center gap-4 mt-2">
        <span class="bg-pink-300 px-3 py-1 font-semibold">
            Daftar ABC
        </span>
        <span>Daftar berdasarkan Subjek</span>
    </div>
</div>

<!-- Search -->
<div class="px-6 mt-4 flex items-center gap-2">
    <label>Kata kunci :</label>
    <input type="text" class="border px-2 py-1 w-1/3"
        placeholder="Masukkan istilah penelusuran">
    <button class="bg-gray-300 px-2">Pencarian</button>
</div>

<!-- Alphabet Filter -->
<div class="px-6 mt-3 flex flex-wrap gap-1 text-xs">
    <span class="bg-gray-300 px-2">Semua</span>
    @foreach(range('A','Z') as $huruf)
        <span class="bg-gray-200 px-2">{{ $huruf }}</span>
    @endforeach
</div>

<!-- Content -->
<div class="grid grid-cols-4 gap-6 px-6 mt-6">

    <!-- LEFT -->
    <div class="col-span-3">

        <p class="text-sm mb-2">
            Kata Kunci : <span class="text-red-500">ABC</span> Semua
        </p>

        <!-- Buku 1 -->
        <div class="border-b pb-4 mb-4 flex gap-4">
            <div class="w-20 h-24 bg-gray-300"></div>

            <div class="flex-1 text-sm">
                <h3 class="font-bold">
                    Introduction to Algorithms
                </h3>
                <p class="text-xs">1990–2023</p>

                <p><b>Subjek</b> : Algoritma & Struktur Data</p>
                <p><b>ISBN</b> : 978</p>
                <p><b>Tahun Terbit</b> : 2009 (Edisi ke-3)</p>

                <p class="text-xs mt-1">
                    Thomas H. Cormen, Charles E. Leiserson...
                </p>

                <div class="flex gap-2 mt-2 text-xs">
                    <button class="border px-2">Detail</button>
                    <span class="text-green-600">Tersedia</span>
                    <button class="border px-2">Tambah</button>
                </div>
            </div>
        </div>

        <!-- Buku 2 -->
        <div class="border-b pb-4 mb-4 flex gap-4">
            <div class="w-20 h-24 bg-gray-300"></div>

            <div class="flex-1 text-sm">
                <h3 class="font-bold">
                    Clean Code: A Handbook of Agile Software Craftsmanship
                </h3>

                <div class="flex gap-2 mt-2 text-xs">
                    <button class="border px-2">Detail</button>
                    <span class="text-green-600">Tersedia</span>
                    <button class="border px-2">Tambah</button>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-4 text-sm flex items-center gap-2">
            <button class="border px-2">1</button>
            <span>/ 700 Hal</span>
        </div>

    </div>

    <!-- RIGHT -->
    <div>
        <div class="bg-gray-300 p-3 text-sm">
            <h4 class="font-bold mb-2">Kategori Subjek</h4>
            <p>Karya Umum</p>
            <p>Filsafat & Psikologi</p>
            <p>Agama</p>
            <p>Ilmu Sosial</p>
            <p>Bahasa</p>
        </div>
    </div>

</div>

<!-- Footer -->
<div class="bg-white mt-6 p-4 text-center text-sm">
    <p class="font-bold text-blue-600">FUDi-gital</p>
    <p>Kebijakan Privasi | Hubungi Kami | Jam Operasional</p>
</div>

</body>
</html>
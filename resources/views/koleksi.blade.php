<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Koleksi Buku</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<!-- Navbar -->
<div class="bg-white shadow px-6 py-3 flex justify-between items-center">
    <div class="text-xl font-bold text-blue-600">FUDi-gital</div>

    <div class="flex items-center gap-4">
        <input type="text" placeholder="Cari"
            class="border px-3 py-1 rounded">
    </div>

    <div class="flex items-center gap-4">
        <a href="#">Informasi</a>
        <a href="#">Jelajahi ▾</a>
        <div class="w-8 h-8 bg-blue-300 rounded-full"></div>
    </div>
</div>

<!-- Title -->
<div class="text-center mt-6">
    <h2 class="text-xl font-bold">Koleksi Buku</h2>

    <div class="flex justify-center gap-6 mt-2 text-sm">
        <span class="cursor-pointer">Daftar ABC</span>
        <span class="bg-pink-300 px-2 rounded font-semibold">
            Daftar berdasarkan Subjek
        </span>
    </div>
</div>

<!-- Kategori Box -->
<div class="p-6 grid grid-cols-4 gap-4 text-sm">
    <div class="bg-gray-200 p-2">Karya Umum</div>
    <div class="bg-gray-200 p-2">Ilmu Pengetahuan Alam</div>
    <div class="bg-gray-200 p-2">Filsafat & Psikologi</div>
    <div class="bg-gray-200 p-2">Filsafat & Psikologi</div>

    <div class="bg-gray-200 p-2">Filsafat & Psikologi</div>
    <div class="bg-gray-200 p-2">Teknologi & Ilmu Terapan</div>
    <div class="bg-gray-200 p-2">Filsafat & Psikologi</div>
    <div class="bg-gray-200 p-2">Filsafat & Psikologi</div>

    <div class="bg-gray-200 p-2">Agama</div>
    <div class="bg-gray-200 p-2">Seni, Hiburan & Olahraga</div>
    <div class="bg-gray-200 p-2">Filsafat & Psikologi</div>
    <div class="bg-gray-200 p-2">Filsafat & Psikologi</div>

    <div class="bg-gray-200 p-2">Ilmu-ilmu Sosial</div>
    <div class="bg-gray-200 p-2">Filsafat & Psikologi</div>
    <div class="bg-gray-200 p-2">Filsafat & Psikologi</div>
    <div class="bg-gray-200 p-2">Filsafat & Psikologi</div>

    <div class="bg-gray-200 p-2">Bahasa</div>
    <div class="bg-gray-200 p-2">Filsafat & Psikologi</div>
    <div class="bg-gray-200 p-2">Filsafat & Psikologi</div>
    <div class="bg-gray-200 p-2">Filsafat & Psikologi</div>
</div>

<!-- Detail Subjek -->
<div class="px-6">
    <div class="bg-white p-4 rounded shadow">
        
        <!-- Header -->
        <div class="flex justify-between items-center">
            <h3 class="font-bold">Ilmu Pengetahuan Alam</h3>
            <a href="#" class="text-sm text-red-500">
                Lihat publikasi lainnya >
            </a>
        </div>

        <!-- Sub kategori -->
        <div class="flex flex-wrap gap-2 mt-3 text-xs">
            <span class="bg-pink-300 px-2 rounded">Matematika (8)</span>
            <span class="bg-gray-200 px-2 rounded">Biologi (4)</span>
            <span class="bg-gray-200 px-2 rounded">Kimia (3)</span>
            <span class="bg-gray-200 px-2 rounded">Geologi (4)</span>
            <span class="bg-gray-200 px-2 rounded">Astronomi (3)</span>
        </div>

        <!-- Detail -->
        <div class="mt-4">
            <h4 class="font-semibold text-sm">Astronomi</h4>
            <ul class="text-sm text-red-500 list-disc ml-6">
                <li>Astrofisika (1)</li>
                <li>Geodesi (1)</li>
            </ul>
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
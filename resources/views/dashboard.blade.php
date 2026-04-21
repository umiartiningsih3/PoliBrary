<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-200">

<!-- Navbar -->
<div class="bg-white shadow px-6 py-3 flex justify-between items-center">
    <div class="text-xl font-bold text-blue-600">FUDi-gital</div>
    <div class="space-x-6">
        <a href="#" class="font-semibold">Beranda</a>
        <a href="#">Informasi</a>
    </div>
    <div>Jelajahi ▾</div>
</div>

<!-- Content -->
<div class="p-6">

    <!-- Greeting -->
    <h2 class="text-xl font-bold mb-6">
        Selamat Datang, Umiarti Ningsih!
    </h2>

    <!-- Statistik -->
    <div class="grid grid-cols-4 gap-4 mb-6 text-center text-sm">
        <div class="bg-gray-300 p-4">Buku Terpinjam</div>
        <div class="bg-gray-300 p-4">Terlambat Dikembalikan</div>
        <div class="bg-gray-300 p-4">Total Denda Saat ini</div>
        <div class="bg-gray-300 p-4">Jumlah Koleksi Buku</div>
    </div>

    <!-- Rekomendasi -->
    <h3 class="font-bold mb-3">Rekomendasi Buku</h3>
    <div class="grid grid-cols-2 gap-6 mb-6">

        <!-- Card -->
        <div class="bg-gray-300 p-4 flex gap-4">
            <div class="w-20 h-24 bg-gray-200"></div>

            <div>
                <h4 class="font-bold">Budidaya Lele</h4>
                <p class="text-sm">Umi Cantik</p>
                <p class="text-green-600 text-sm">Tersedia</p>

                <div class="flex gap-2 mt-2 text-xs">
                    <button class="bg-white px-2 py-1 border">
                        Detail
                    </button>
                    <button class="bg-white px-2 py-1 border">
                        Tambah ke Keranjang
                    </button>
                </div>
            </div>
        </div>

        <!-- Card -->
        <div class="bg-gray-300 p-4 flex gap-4">
            <div class="w-20 h-24 bg-gray-200"></div>

            <div>
                <h4 class="font-bold">Budidaya Ayam</h4>
                <p class="text-sm">Umi Cantik</p>
                <p class="text-green-600 text-sm">Tersedia</p>

                <div class="flex gap-2 mt-2 text-xs">
                    <button class="bg-white px-2 py-1 border">
                        Detail
                    </button>
                    <button class="bg-white px-2 py-1 border">
                        Tambah ke Keranjang
                    </button>
                </div>
            </div>
        </div>

    </div>

    <!-- Buku Terbaru -->
    <h3 class="font-bold mb-3">Buku Terbaru</h3>
    <div class="grid grid-cols-2 gap-6">

        <!-- Card -->
        <div class="bg-gray-300 p-4 flex gap-4">
            <div class="w-20 h-24 bg-gray-200"></div>

            <div>
                <h4 class="font-bold">Budidaya Lele</h4>
                <p class="text-sm">Umi Cantik</p>
                <p class="text-green-600 text-sm">Tersedia</p>

                <div class="flex gap-2 mt-2 text-xs">
                    <button class="bg-white px-2 py-1 border">
                        Detail
                    </button>
                    <button class="bg-white px-2 py-1 border">
                        Tambah ke Keranjang
                    </button>
                </div>
            </div>
        </div>

        <!-- Card -->
        <div class="bg-gray-300 p-4 flex gap-4">
            <div class="w-20 h-24 bg-gray-200"></div>

            <div>
                <h4 class="font-bold">Budidaya Ayam</h4>
                <p class="text-sm">Umi Cantik</p>
                <p class="text-green-600 text-sm">Tersedia</p>

                <div class="flex gap-2 mt-2 text-xs">
                    <button class="bg-white px-2 py-1 border">
                        Detail
                    </button>
                    <button class="bg-white px-2 py-1 border">
                        Tambah ke Keranjang
                    </button>
                </div>
            </div>
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
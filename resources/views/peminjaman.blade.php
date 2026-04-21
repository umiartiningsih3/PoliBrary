<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rincian Pinjaman Buku</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

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
    <h2 class="text-xl font-bold mb-4">Rincian Pinjaman Buku</h2>

    <div class="grid grid-cols-3 gap-6">
        
        <!-- Left -->
        <div class="col-span-2 bg-white p-4 shadow rounded flex gap-4">
            
            <!-- Cover -->
            <div class="w-32 h-40 bg-gray-300"></div>

            <!-- Detail -->
            <div class="flex-1 text-sm">
                <p><b>Judul Buku</b> : Introduction to Algorithms</p>
                <p><b>Penulis</b> : Thomas H. Cormen</p>
                <p><b>Kategori</b> : Algoritma & Struktur Data</p>
                <p><b>Nomor Inventaris</b> : INV12345</p>
                <p><b>Tanggal Pinjam</b> : 12 April 2026</p>
                <p><b>Tanggal Jatuh Tempo</b> : 19 April 2026</p>
                <p><b>Status Peminjaman</b> : Dipinjam</p>

                <!-- Button -->
                <div class="mt-4 space-x-2">
                    <button class="bg-gray-300 px-3 py-1 rounded">
                        Perpanjang Pinjaman
                    </button>
                    <button class="bg-gray-400 px-3 py-1 rounded">
                        Kembalikan Buku
                    </button>
                </div>
            </div>
        </div>

        <!-- Right -->
        <div class="space-y-4">
            
            <!-- Denda -->
            <div class="bg-white p-4 shadow rounded text-sm">
                <p class="font-bold">Denda Keterlambatan</p>
                <p>6 Hari x Rp 2.000</p>
                <p class="font-bold">Rp 12.000</p>

                <p class="mt-2 font-bold">Status Peminjaman</p>
                <p class="text-red-500">Telat Dikembalikan</p>
            </div>

            <!-- Pembayaran -->
            <div class="bg-white p-4 shadow rounded text-sm">
                <p class="font-bold">Pembayaran Denda</p>
                <p>Total Denda: <span class="text-red-500">Rp 12.000</span></p>

                <button class="mt-2 bg-gray-300 px-3 py-1 rounded w-full">
                    Bayar Denda
                </button>

                <p class="text-xs text-gray-500 mt-2">
                    Konfirmasi Pembayaran
                </p>
            </div>

        </div>
    </div>

    <!-- Riwayat -->
    <div class="mt-6 bg-white p-4 shadow rounded">
        <h3 class="font-bold mb-2">Riwayat Perpanjangan</h3>

        <table class="w-full text-sm border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border p-2">Tanggal Perpanjangan</th>
                    <th class="border p-2">Tanggal Jatuh Tempo</th>
                    <th class="border p-2">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="border p-2">DD/MM/YYYY</td>
                    <td class="border p-2">DD/MM/YYYY</td>
                    <td class="border p-2">Perpanjangan Disetujui</td>
                </tr>
                <tr>
                    <td class="border p-2">DD/MM/YYYY</td>
                    <td class="border p-2">DD/MM/YYYY</td>
                    <td class="border p-2">Perpanjangan Disetujui</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Footer -->
<div class="bg-white mt-6 p-4 text-center text-sm">
    <p class="font-bold text-blue-600">FUDi-gital</p>
    <p>Kebijakan Privasi | Hubungi Kami | Jam Operasional</p>
</div>

</body>
</html>
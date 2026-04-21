<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Keranjang Buku</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black">

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
<div class="p-10 space-y-6">

    <!-- Item 1 -->
    <div class="flex items-center gap-4">
        
        <!-- Checkbox -->
        <input type="checkbox" class="w-5 h-5">

        <!-- Card -->
        <div class="flex bg-gray-300 w-full p-4 items-center gap-4">
            
            <!-- Cover -->
            <div class="w-20 h-24 bg-gray-200"></div>

            <!-- Info -->
            <div class="flex-1">
                <h3 class="font-bold">Budidaya Ikan Bandeng</h3>
                <p class="text-sm">Umiarti Ningsih</p>

                <button class="mt-2 bg-gray-500 px-3 py-1 text-sm rounded">
                    Hapus
                </button>
            </div>

            <!-- Status -->
            <div class="text-green-600 font-semibold">
                Tersedia
            </div>
        </div>
    </div>

    <!-- Item 2 -->
    <div class="flex items-center gap-4">
        <input type="checkbox" class="w-5 h-5">

        <div class="flex bg-gray-300 w-full p-4 items-center gap-4">
            <div class="w-20 h-24 bg-gray-200"></div>

            <div class="flex-1">
                <h3 class="font-bold">Budidaya Ikan Bandeng</h3>
                <p class="text-sm">Umiarti Ningsih</p>

                <button class="mt-2 bg-gray-500 px-3 py-1 text-sm rounded">
                    Hapus
                </button>
            </div>

            <div class="text-green-600 font-semibold">
                Tersedia
            </div>
        </div>
    </div>

    <!-- Button -->
    <div class="flex justify-end">
        <button class="bg-gray-300 px-6 py-2 rounded">
            Pinjam Sekarang
        </button>
    </div>

</div>

<!-- Footer -->
<div class="bg-white mt-10 p-4 text-center text-sm">
    <p class="font-bold text-blue-600">FUDi-gital</p>
    <p>Kebijakan Privasi | Hubungi Kami | Jam Operasional</p>
</div>

</body>
</html>
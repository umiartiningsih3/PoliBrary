<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Koleksi Buku</title>
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
    <h2 class="text-xl font-bold mb-4">Tambah Koleksi Buku</h2>

    <div class="bg-white p-6 shadow rounded border">

        <form action="#" method="POST" enctype="multipart/form-data">
            <!-- @csrf -->

            <div class="grid grid-cols-3 gap-6">

                <!-- Upload Cover -->
                <div class="flex flex-col items-center">
                    <div class="w-40 h-48 bg-gray-300 mb-2"></div>
                    <input type="file" class="text-sm">
                    <button type="button" class="bg-gray-300 px-3 py-1 mt-2 rounded">
                        Unggah Sampul
                    </button>
                </div>

                <!-- Form Input -->
                <div class="col-span-2 grid grid-cols-2 gap-4 text-sm">

                    <div>
                        <label>Judul Buku</label>
                        <input type="text" class="w-full border p-1">
                    </div>

                    <div>
                        <label>ISBN</label>
                        <input type="text" class="w-full border p-1">
                    </div>

                    <div>
                        <label>Penulis</label>
                        <input type="text" class="w-full border p-1">
                    </div>

                    <div>
                        <label>Kategori Buku</label>
                        <select class="w-full border p-1">
                            <option>Pilih Kategori</option>
                            <option>Teknologi</option>
                            <option>Novel</option>
                        </select>
                    </div>

                    <div>
                        <label>Nomor Inventaris</label>
                        <input type="text" class="w-full border p-1">
                    </div>

                    <div>
                        <label>Penerbit</label>
                        <input type="text" class="w-full border p-1">
                    </div>

                    <div>
                        <label>Tahun Terbit</label>
                        <input type="text" class="w-full border p-1">
                    </div>

                    <div class="col-span-2">
                        <label>Deskripsi Buku</label>
                        <textarea class="w-full border p-1 h-20"></textarea>
                    </div>

                    <div class="col-span-2 flex items-center gap-2">
                        <label>Jumlah Eksemplar</label>
                        <input type="number" class="w-20 border p-1">
                        <button type="button" class="bg-gray-300 px-2 rounded">+</button>
                    </div>

                </div>
            </div>

            <!-- Buttons -->
            <div class="mt-6 flex gap-4">
                <button class="bg-gray-400 px-4 py-2 rounded">
                    Tambah Buku
                </button>
                <button type="reset" class="bg-gray-300 px-4 py-2 rounded">
                    Batal
                </button>
            </div>

        </form>
    </div>
</div>

<!-- Footer -->
<div class="bg-white mt-6 p-4 text-center text-sm">
    <p class="font-bold text-blue-600">FUDi-gital</p>
    <p>Kebijakan Privasi | Hubungi Kami | Jam Operasional</p>
</div>

</body>
</html>
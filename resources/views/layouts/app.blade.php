<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <!-- WAJIB untuk responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>FUDi-gital</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- CSS tambahan -->
    <link rel="stylesheet" href="{{ asset('css/loginpage.css') }}">
</head>

<div id="infoModal"
        class="fixed inset-0 bg-black/40 backdrop-blur-sm hidden items-center justify-center z-50">

        <div onclick="event.stopPropagation()"
            class="bg-white w-[550px] rounded-2xl shadow-xl overflow-hidden">

            <div class="bg-pink-500 text-white p-5 flex justify-between items-center">
                <div>
                    <h2 class="font-bold text-lg">Pertama kali berkunjung?</h2>
                    <p class="text-sm">Selamat datang di FUDi-gital.</p>
                </div>

                <!-- TAMBAH ID DI SINI -->
                <button id="closeModal" class="text-xl font-bold">&times;</button>
            </div>

        <!-- CONTENT -->
        <div class="grid grid-cols-2 gap-8 p-6 text-center">

            <div>
                <div class="text-pink-500 text-4xl">🕒</div>
                <p class="font-semibold mt-2">Jam Operasional</p>
            </div>

            <div>
                <div class="text-pink-500 text-4xl">👤</div>
                <p class="font-semibold mt-2">Panduan Pengguna</p>
            </div>

            <div>
                <div class="text-pink-500 text-4xl">💬</div>
                <p class="font-semibold mt-2">FAQ</p>
            </div>

            <div>
                <div class="text-pink-500 text-4xl">🔍</div>
                <p class="font-semibold mt-2">Cari - Pinjam - Kembalikan</p>
            </div>

        </div>
    </div>
</div>

<body class="bg-gray-100 @yield('body-class')">

    <!-- NAVBAR -->
    <nav class="flex items-center justify-between px-6 py-3 bg-white shadow-md">

        <!-- Logo (klik kembali ke home) -->
        <a href="{{ url('/') }}" class="text-blue-600 font-bold text-xl">
            FUDi-gital
        </a>

        <!-- Menu -->
        <div class="flex items-center gap-3">

            <!-- Search -->
            <input type="text" placeholder="Cari"
                class="border rounded-lg px-3 py-1 focus:outline-none focus:ring-2 focus:ring-blue-400">

            <!-- Menu Links -->
            <button id="btnInfo"
    class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300 transition">
    Informasi
</button>

            <a href="{{ url('/login') }}"
               class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300 transition">
                Masuk
            </a>

            <a href="{{ url('/register') }}"
               class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 transition">
                Daftar
            </a>
        </div>
    </nav>

    <!-- CONTENT -->
    <main>
        @yield('content')
    </main>

    <!-- Script tambahan -->
    < <script>
    document.addEventListener("DOMContentLoaded", function () {

        const btn = document.getElementById("btnInfo");
        const modal = document.getElementById("infoModal");
        const close = document.getElementById("closeModal");

        btn.addEventListener("click", function () {
            modal.classList.remove("hidden");
            modal.classList.add("flex");
        });

        close.addEventListener("click", function () {
            modal.classList.add("hidden");
        });

        modal.addEventListener("click", function () {
            modal.classList.add("hidden");
        });

    });
    </script>

</body>
</html>
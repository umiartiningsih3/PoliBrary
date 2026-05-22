<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Polibrary - Sistem Perpustakaan Digital</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com"></script> {{-- Backup jika Vite belum di-build --}}
</head>
<body class="bg-gray-50 font-sans antialiased">

    <!-- ================= NAVBAR ================= -->
     @if(!Route::is('login') && !Route::is('register'))
    <header class="fixed top-0 left-0 w-full z-50 px-3 md:px-6 py-3">
        <div class="bg-white/85 backdrop-blur-md rounded-2xl shadow-md px-4 md:px-5 py-3 flex items-center justify-between border border-gray-200 gap-3">

            <!-- Logo -->
            <a href="/" class="flex items-center shrink-0">
                <img src="{{ url('image/Polibrary-logo.png') }}"
                     alt="Logo Polibrary"
                     class="h-13 md:h-12 w-auto">
            </a>

            <!-- Search -->
            <div class="hidden md:block flex-1 mx-6 max-w-xl">
                <div class="relative">
                    <input type="text"
                           placeholder="Cari buku..."
                           class="w-full rounded-xl border border-gray-300 bg-white px-4 py-2 pr-10 focus:outline-none focus:ring-2 focus:ring-blue-300">
                    <span class="absolute right-3 top-2.5 text-gray-400">🔍</span>
                </div>
            </div>

            <!-- Menu -->
            <div class="flex items-center gap-3 text-sm font-semibold">
                <button onclick="openPopup()"
                    class="text-gray-700 hover:text-blue-500 transition">
                    Informasi
                </button>
            </div>

        </div>
    </header>
    @endif

    <!-- Spacer agar konten tidak tertutup Navbar fixed -->
    <div class="h-24"></div>

    <!-- Konten Utama -->
    <main class="flex-1 flex flex-col">
    @yield('content')
</main>

     <!-- FOOTER -->
      @if(!Route::is('login') && !Route::is('register'))
    <footer class="bg-white border-t px-6 py-4 flex items-center justify-between text-sm text-gray-600">

        <!-- kiri -->
        <img src="{{ asset('image/footer-logo.png') }}" class="h-12">

        <!-- tengah -->
        <div class="text-center">
            <div class="flex gap-6 justify-center font-semibold">
                <span class="hover:text-blue-600 cursor-pointer">Kebijakan Privasi</span>
                <span class="hover:text-blue-600 cursor-pointer">Hubungi Kami</span>
                <span class="hover:text-blue-600 cursor-pointer">Jam Operasional</span>
            </div>

            <p class="text-xs mt-1 text-gray-500">
                Politeknik Negeri Batam, Jalan Ahmad Yani Batam Kota
            </p>
        </div>

        <div class="flex gap-4">

    <!-- Facebook (BIRU) -->
    <a href="#" class="transition hover:scale-110">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
             fill="#1877F2" viewBox="0 0 24 24">
            <path d="M22 12.07C22 6.48 17.52 2 12 2S2 6.48 2 12.07c0 5.03 3.66 9.18 8.44 9.93v-7.02H7.9v-2.91h2.54V9.41c0-2.5 1.5-3.88 3.8-3.88 1.1 0 2.25.2 2.25.2v2.48h-1.27c-1.25 0-1.64.78-1.64 1.58v1.9h2.8l-.45 2.91h-2.35V22c4.78-.75 8.44-4.9 8.44-9.93z"/>
        </svg>
    </a>

    <!-- Instagram (GRADIENT) -->
    <a href="#" class="transition hover:scale-110">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24">
            <defs>
                <linearGradient id="ig-gradient" x1="0%" y1="0%" x2="100%" y2="100%">
                    <stop offset="0%" stop-color="#feda75"/>
                    <stop offset="25%" stop-color="#fa7e1e"/>
                    <stop offset="50%" stop-color="#d62976"/>
                    <stop offset="75%" stop-color="#962fbf"/>
                    <stop offset="100%" stop-color="#4f5bd5"/>
                </linearGradient>
            </defs>
            <path fill="url(#ig-gradient)" d="M7.75 2C4.57 2 2 4.57 2 7.75v8.5C2 19.43 4.57 22 7.75 22h8.5C19.43 22 22 19.43 22 16.25v-8.5C22 4.57 19.43 2 16.25 2h-8.5zm0 2h8.5A3.75 3.75 0 0120 7.75v8.5A3.75 3.75 0 0116.25 20h-8.5A3.75 3.75 0 014 16.25v-8.5A3.75 3.75 0 017.75 4zm8.75 1.5a.75.75 0 100 1.5.75.75 0 000-1.5zM12 7a5 5 0 100 10 5 5 0 000-10zm0 2a3 3 0 110 6 3 3 0 010-6z"/>
        </svg>
    </a>

    <!-- YouTube (MERAH) -->
    <a href="#" class="transition hover:scale-110">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
             fill="#FF0000" viewBox="0 0 24 24">
            <path d="M21.8 8s-.2-1.4-.8-2c-.8-.8-1.7-.8-2.1-.9C15.9 5 12 5 12 5h0s-3.9 0-6.9.1c-.4 0-1.3.1-2.1.9-.6.6-.8 2-.8 2S2 9.6 2 11.2v1.6C2 14.4 2.2 16 2.2 16s.2 1.4.8 2c.8.8 1.9.8 2.4.9 1.7.2 6.6.2 6.6.2s3.9 0 6.9-.1c.4 0 1.3-.1 2.1-.9.6-.6.8-2 .8-2s.2-1.6.2-3.2v-1.6C22 9.6 21.8 8 21.8 8zM10 14.5v-5l5 2.5-5 2.5z"/>
        </svg>
    </a>

</div>

    </footer>
    @endif


    @stack('scripts')
</body>
</html>
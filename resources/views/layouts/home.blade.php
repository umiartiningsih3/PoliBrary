<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PoliBrary - Sistem Perpustakaan Digital</title>

    @vite('resources/css/app.css')

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Smooth Scroll -->
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body class="bg-gray-50 font-sans antialiased">

<!-- ================= NAVBAR ================= -->
@if(!Route::is('login') && !Route::is('register'))

<header class="fixed top-0 left-0 w-full z-50 px-3 md:px-6 py-3">

    <div class="bg-white/85 backdrop-blur-xl rounded-2xl shadow-md border border-gray-200
                px-4 md:px-6 py-3 flex items-center justify-between">

        <!-- ================= LOGO ================= -->
        <a href="/" class="flex items-center shrink-0">
            <img src="{{ asset('image/Polibrary-logo.png') }}"
                 alt="Logo PoliBrary"
                 class="h-12 w-auto">
        </a>

        <!-- ================= MENU ================= -->
        <div class="hidden md:flex items-center gap-8 font-semibold text-sm">

            <!-- Beranda -->
            <a href="/"
               class="text-gray-700 hover:text-blue-500 transition duration-300">
                Beranda
            </a>

            <!-- Fitur -->
            <a href="#fitur"
               class="text-gray-700 hover:text-blue-500 transition duration-300">
                Fitur
            </a>

            <!-- Pengumuman -->
            <a href="#pengumuman"
               class="text-gray-700 hover:text-blue-500 transition duration-300">
                Pengumuman
            </a>

            <!-- Informasi -->
            <button onclick="openPopup()"
                    type="button"
                    class="text-gray-700 hover:text-blue-500 transition duration-300">
                Informasi
            </button>

        </div>

        <!-- ================= MOBILE BUTTON ================= -->
        <div class="md:hidden">

            <button type="button"
                    class="text-2xl text-gray-700">
                ☰
            </button>

        </div>

    </div>

</header>

@endif

<!-- ================= SPACER ================= -->
<div class="h-24"></div>

<!-- ================= CONTENT ================= -->
<main class="flex-1 flex flex-col">
    @yield('content')
</main>

<!-- FOOTER -->
 @if(!Route::is('login') && !Route::is('register'))
    <footer class="bg-gradient-to-r from-[#12376B] via-[#1D4E89] to-[#47B8F2] 
text-white px-6 py-5 flex items-center justify-between 
border-t border-white/10 shadow-inner">

        <!-- kiri -->
        <img src="{{ asset('image/footer-logo.png') }}" class="h-12">

        <!-- tengah -->
        <div class="text-center">
            <div class="flex gap-6 justify-center font-semibold">
                <span class="hover:text-cyan-200 transition cursor-pointer">Kebijakan Privasi</span>
                <span class="hover:text-cyan-200 transition cursor-pointer">Hubungi Kami</span>
                <span class="hover:text-cyan-200 transition cursor-pointer">Jam Operasional</span>
            </div>

            <p class="text-xs mt-1 text-white/70">
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

<!-- ================= SCRIPTS ================= -->
@stack('scripts')

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Polibrary</title>

<!-- Tailwind -->
<script src="https://cdn.tailwindcss.com"></script>

<!-- Font -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<!-- Setting Tailwind -->
<script>
    tailwind.config = {
        theme: {
            extend: {
                fontFamily: {
                    poppins: ['Poppins', 'sans-serif'],
                }
            }
        }
    }
</script>

<style>
    body {
        font-family: 'Poppins', sans-serif;
    }

.scrollbar-hide::-webkit-scrollbar {
    display: none;
}
.scrollbar-hide {
    -ms-overflow-style: none;
    scrollbar-width: none;
}

/* tombol panah */
.btn-nav {
    background: white;
    border: 1px solid #ddd;
    padding: 6px 10px;
    border-radius: 8px;
    font-size: 12px;
    transition: 0.2s;
}
.btn-nav:hover {
    background: #3b82f6;
    color: white;
}
</style>

</head>

<body class="bg-gray-100 font-poppins flex flex-col min-h-screen">
    <!-- NAVBAR -->
@if(!Route::is('login') && !Route::is('register'))
<nav class="bg-white shadow-sm px-6 h-[60px] flex items-center justify-between">

    <div class="flex items-center gap-10">
        <a href="/">
            <img src="{{ asset('image/Polibrary-logo.png') }}" class="h-10">
        </a>

        <div class="flex gap-6 text-sm font-semibold text-gray-700">
            <a href="{{ route('dashboard') }}" class="hover:text-blue-600">Beranda</a>
            <a href="#" class="hover:text-blue-600">Informasi</a>
        </div>
    </div>

    <!-- 🔥 FIX UTAMA: tambahkan ml-auto -->
    <div class="flex items-center gap-4 text-sm font-semibold ml-auto">

        <!-- WRAPPER DROPDOWN -->
        <div class="relative">
            <button onclick="toggleMenu()" class="flex items-center gap-2 text-gray-700 hover:text-blue-600">
                Jelajahi

                <svg class="w-4 h-4 shrink-0"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M6 9l6 6 6-6"></path>
                </svg>
            </button>

            <!-- Dropdown -->
            <div id="menuDropdown"
                class="hidden absolute right-0 mt-3 w-52 bg-white rounded-xl shadow-lg border z-20 overflow-hidden">

                <a href="koleksi" class="flex items-center gap-3 px-4 py-3 hover:bg-blue-50 text-sm">
                    <svg class="w-5 h-5 text-blue-500 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M4 19.5V6a2 2 0 012-2h12a2 2 0 012 2v13.5"/>
                        <path d="M8 6v13"/>
                    </svg>
                    Koleksi Buku
                </a>

                <a href="{{ route('keranjang') }}" class="flex items-center gap-3 px-4 py-3 hover:bg-blue-50 text-sm">
                    <svg class="w-5 h-5 text-green-500 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M6 6h15l-1.5 9H7z"/>
                        <circle cx="9" cy="20" r="1"/>
                        <circle cx="18" cy="20" r="1"/>
                    </svg>
                    Keranjang Saya
                </a>

                <a href="#" class="flex items-center gap-3 px-4 py-3 hover:bg-blue-50 text-sm">
                    <svg class="w-5 h-5 text-yellow-500 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M15 17h5l-1.5-1.5A2 2 0 0118 14V11a6 6 0 10-12 0v3a2 2 0 01-.5 1.5L4 17h5"/>
                        <path d="M9 21h6"/>
                    </svg>
                    Notifikasi
                </a>

                <a href="{{ route('tambah-buku') }}" class="flex items-center gap-3 px-4 py-3 hover:bg-blue-50 text-sm">
                    <svg class="w-5 h-5 text-purple-500 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 5v14M5 12h14"/>
                    </svg>
                    Tambah Koleksi
                </a>

            </div>
        </div>

        <!-- PROFILE -->
<div class="relative">

    <!-- Button profile -->
    <button onclick="toggleProfile()" class="w-9 h-9 rounded-full bg-blue-500 flex items-center justify-center">
        <svg class="w-5 h-5 text-white shrink-0"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round">
            <path d="M12 12a3 3 0 100-6 3 3 0 000 6z"/>
            <path d="M4 20a8 8 0 0116 0"/>
        </svg>
    </button>

    <!-- Dropdown profile -->
    <div id="profileDropdown"
        class="hidden absolute right-0 mt-3 w-56 bg-white rounded-xl shadow-lg border z-50 overflow-hidden">

        <!-- Nama user -->
        <div class="px-4 py-3 border-b">
            <p class="font-semibold text-gray-800">
                {{ auth()->user()->name ?? 'User' }}
            </p>
        </div>

        <!-- Akun saya -->
        <a href="{{ route('profile') }}"
           class="flex items-center gap-3 px-4 py-3 hover:bg-blue-50 text-sm">

            <svg class="w-5 h-5 text-blue-500 shrink-0"
                 viewBox="0 0 24 24"
                 fill="none"
                 stroke="currentColor"
                 stroke-width="2"
                 stroke-linecap="round"
                 stroke-linejoin="round">
                <path d="M12 12a3 3 0 100-6 3 3 0 000 6z"/>
                <path d="M4 20a8 8 0 0116 0"/>
            </svg>

            Akun Saya
        </a>

        <!-- Logout -->
        <a href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
           class="flex items-center gap-3 px-4 py-3 hover:bg-red-50 text-sm text-red-500">

            <svg class="w-5 h-5 shrink-0"
                 viewBox="0 0 24 24"
                 fill="none"
                 stroke="currentColor"
                 stroke-width="2"
                 stroke-linecap="round"
                 stroke-linejoin="round">
                <path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4"/>
                <path d="M16 17l5-5-5-5"/>
                <path d="M21 12H9"/>
            </svg>

            Keluar
        </a>

        <!-- form logout laravel -->
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
        </form>

    </div>
</div>
</nav>
@endif

    <!-- CONTENT -->
<main class="flex-1">
    @yield('content')
</main>

<!-- FOOTER -->
 @if(!Route::is('login') && !Route::is('register'))
    <footer class="bg-white border-t px-6 py-4 flex items-center justify-between text-sm text-gray-600">

        <!-- kiri -->
        <img src="{{ asset('image/footer-logo.png') }}" class="h-8">

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

<script>
function toggleMenu() {
    const menu = document.getElementById('menuDropdown');
    const profile = document.getElementById('profileDropdown');

    // tutup profile kalau ada
    if (profile) profile.classList.add('hidden');

    menu.classList.toggle('hidden');
}

function toggleProfile() {
    const menu = document.getElementById('menuDropdown');
    const profile = document.getElementById('profileDropdown');

    // tutup menu jelajah kalau ada
    if (menu) menu.classList.add('hidden');

    profile.classList.toggle('hidden');
}

// klik luar → tutup semua dropdown
window.addEventListener('click', function(e) {
    const menu = document.getElementById('menuDropdown');
    const profile = document.getElementById('profileDropdown');

    const isButton = e.target.closest('button');

    if (!isButton) {
        if (menu) menu.classList.add('hidden');
        if (profile) profile.classList.add('hidden');
    }
});
</script>

@stack('scripts')
</body>
</html>
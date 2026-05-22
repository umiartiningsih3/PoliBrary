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

<!-- ================= FOOTER ================= -->

<div class="text-center text-xs text-gray-500 mt-5 border-t pt-4 pb-4">

    © {{ date('Y') }} PoliBrary — Digital Library Polibatam

</div>

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
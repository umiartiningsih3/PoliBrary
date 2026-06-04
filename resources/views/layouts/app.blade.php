<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Polibrary</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

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

        /* Menyembunyikan Scrollbar jika diperlukan */
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        /* Tombol Navigasi Custom bawaan Anda */
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

<body class="bg-gray-100 font-poppins flex flex-col min-h-screen relative overflow-x-hidden">

    @if(!Route::is('login') && !Route::is('register'))
    <div id="sidebarBackdrop" class="fixed inset-0 bg-slate-900/40 z-50 hidden transition-opacity duration-300 opacity-0"></div>
    
    <aside id="sidebarMenu" class="fixed top-0 left-0 bottom-0 w-72 bg-white z-50 shadow-2xl transform -translate-x-full transition-transform duration-300 ease-in-out flex flex-col border-r border-slate-200">
        <div class="px-6 h-[60px] border-b border-slate-100 flex items-center justify-between bg-slate-50">
            <div class="flex items-center gap-2">
                <img src="{{ asset('image/Polibrary-logo.png') }}" class="h-8 w-auto" alt="Logo">
                <span class="font-bold text-slate-800 text-sm tracking-wider uppercase">Polibrary</span>
            </div>
            <button id="sidebarClose" class="p-1.5 hover:bg-slate-200 text-slate-500 rounded-lg transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <nav class="flex-1 p-4 flex flex-col gap-1">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-semibold {{ Route::is('dashboard') ? 'text-blue-600 bg-blue-50' : 'text-gray-700 hover:bg-gray-50' }} rounded-xl transition">
                <span class="text-base">🏠 Beranda</span>
            </a>
            <a href="/koleksi" class="flex items-center gap-3 px-4 py-3 text-sm font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-xl transition">
                <span class="text-base">📚 Koleksi Buku</span>
            </a>
            <a href="{{ route('keranjang') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-xl transition">
                <span class="text-base">🛒 Keranjang Saya</span>
            </a>
            <a href="{{ route('tambah-buku') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-xl transition">
                <span class="text-base">➕ Tambah Koleksi</span>
            </a>
            <a href="#" class="flex items-center gap-3 px-4 py-3 text-sm font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-xl transition">
                <span class="text-base">💳 Status Denda</span>
            </a>
            
            <div class="border-t border-slate-100 my-4"></div>
            
            <a href="{{ route('logout') }}" 
               onclick="event.preventDefault(); document.getElementById('sidebar-logout-form').submit();"
               class="flex items-center gap-3 px-4 py-3 text-sm font-medium text-red-500 hover:bg-red-50 rounded-xl transition mt-auto">
                <span class="text-base">🚪 Keluar Sesi</span>
            </a>
            <form id="sidebar-logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                @csrf
            </form>
        </nav>
    </aside>
    @endif


    @if(!Route::is('login') && !Route::is('register'))
    <nav class="bg-white shadow-sm px-6 h-[60px] flex items-center justify-between sticky top-0 z-40 select-none">

        <div class="flex items-center gap-4">
            <button id="sidebarToggle" class="p-1.5 text-gray-500 hover:bg-gray-100 rounded-lg transition" aria-label="Open Menu">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            <a href="/" class="flex items-center gap-2">
                <img src="{{ asset('image/Polibrary-logo.png') }}" class="h-9 w-auto" alt="Logo">
                <span class="font-bold text-[#1e293b] text-base tracking-wider uppercase hidden sm:block">POLIBRARY</span>
            </a>
        </div>

        <div class="flex-1 max-w-xl mx-8 hidden md:block">
            <div class="relative flex items-center shadow-sm rounded-lg border border-gray-200 bg-gray-50">
                <input type="text" 
                       placeholder="Cari judul buku, penulis, atau kategori di platform..." 
                       class="w-full bg-transparent px-4 py-2 text-xs text-gray-600 placeholder-gray-400 focus:outline-none transition rounded-l-lg">
                <button class="bg-[#10b981] hover:bg-[#059669] text-white px-5 h-[34px] rounded-r-lg transition flex items-center justify-center">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
            </div>
        </div>

        <div class="flex items-center gap-4">
            
            <button onclick="toggleMenu()" class="p-1.5 text-gray-500 hover:bg-gray-100 rounded-full relative transition">
                <span class="absolute top-1 right-1 w-2 h-2 bg-[#ef4444] rounded-full"></span>
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                </svg>
            </button>

            <div id="menuDropdown" class="hidden absolute right-16 top-[55px] w-52 bg-white rounded-xl shadow-lg border z-50 overflow-hidden">
                <div class="px-4 py-2 border-b bg-slate-50 text-xs font-semibold text-gray-500">Pilihan Jelajahi</div>
                <a href="koleksi" class="flex items-center gap-3 px-4 py-3 hover:bg-blue-50 text-sm text-gray-700">Koleksi Buku</a>
                <a href="{{ route('keranjang') }}" class="flex items-center gap-3 px-4 py-3 hover:bg-blue-50 text-sm text-gray-700">Keranjang Saya</a>
                <a href="{{ route('tambah-buku') }}" class="flex items-center gap-3 px-4 py-3 hover:bg-blue-50 text-sm text-gray-700">Tambah Koleksi</a>
            </div>

            <div class="relative">
                <button onclick="toggleProfile()" class="w-9 h-9 rounded-full bg-[#bae6fd] flex items-center justify-center font-bold text-[#0369a1] text-xs shadow-sm cursor-pointer hover:opacity-90 transition">
                    {{ isset(auth()->user()->name) ? strtoupper(substr(auth()->user()->name, 0, 2)) : 'UN' }}
                </button>

                <div id="profileDropdown" class="hidden absolute right-0 top-[45px] w-56 bg-white rounded-xl shadow-lg border z-50 overflow-hidden">
                    <div class="px-4 py-3 border-b bg-slate-50">
                        <p class="text-xs text-slate-400 font-medium">Masuk Sebagai:</p>
                        <p class="font-semibold text-gray-800 truncate">
                            {{ auth()->user()->name ?? 'Umiarti Ningsih' }}
                        </p>
                    </div>
                    <a href="{{ route('profile') }}" class="flex items-center gap-3 px-4 py-3 hover:bg-blue-50 text-sm text-gray-700">
                        Akun Saya
                    </a>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                       class="flex items-center gap-3 px-4 py-3 hover:bg-red-50 text-sm text-red-500 font-medium border-t">
                        Keluar Sesi
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                </div>
            </div>
            
        </div>
    </nav>
    @endif

    <main class="flex-1 flex flex-col">
        @yield('content')
    </main>

    @if (!request()->routeIs('login', 'register'))
    <div class="text-center text-xs text-gray-500 mt-auto border-t pt-4 pb-4 bg-white">
        © {{ date('Y') }} PoliBrary — Digital Library Polibatam
    </div>
    @endif

    <script>
        // Logika Dropdown Navbar Atas
        function toggleMenu() {
            const menu = document.getElementById('menuDropdown');
            const profile = document.getElementById('profileDropdown');
            if (profile) profile.classList.add('hidden');
            if (menu) menu.classList.toggle('hidden');
        }

        function toggleProfile() {
            const menu = document.getElementById('menuDropdown');
            const profile = document.getElementById('profileDropdown');
            if (menu) menu.classList.add('hidden');
            if (profile) profile.classList.toggle('hidden');
        }

        // Logika Interaktif Animasi Sidebar (Menu Samping)
        const sidebarMenu = document.getElementById('sidebarMenu');
        const sidebarBackdrop = document.getElementById('sidebarBackdrop');
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebarClose = document.getElementById('sidebarClose');

        function openSidebar() {
            if(!sidebarMenu || !sidebarBackdrop) return;
            sidebarBackdrop.classList.remove('hidden');
            setTimeout(() => {
                sidebarMenu.classList.remove('-translate-x-full');
                sidebarBackdrop.classList.add('opacity-100');
            }, 20); // memberikan sedikit delay mikro agar transisi CSS terpancing
        }

        function closeSidebar() {
            if(!sidebarMenu || !sidebarBackdrop) return;
            sidebarMenu.classList.add('-translate-x-full');
            sidebarBackdrop.classList.remove('opacity-100');
            setTimeout(() => {
                sidebarBackdrop.classList.add('hidden');
            }, 300); // Durasi diatur 300ms sesuai class duration-300 Tailwind
        }

        // Memasang Event Listener Klik ke Elemen Sidebar
        if(sidebarToggle) sidebarToggle.addEventListener('click', openSidebar);
        if(sidebarClose) sidebarClose.addEventListener('click', closeSidebar);
        if(sidebarBackdrop) sidebarBackdrop.addEventListener('click', closeSidebar);

        // Menutup Dropdown atau Menu saat klik di area kosong manapun
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
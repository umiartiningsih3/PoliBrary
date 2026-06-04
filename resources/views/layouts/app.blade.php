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

        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

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
    <div class="px-6 h-[60px] flex items-center justify-between">
        <button id="sidebarClose" class="p-1 text-slate-500 hover:bg-slate-100 rounded-full">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
        <img src="{{ asset('image/Polibrary-logo.png') }}" class="h-8 w-auto" alt="Logo">
    </div>

    <div class="bg-gradient-to-br from-[#0052cc] to-[#3b82f6] p-6 text-white shadow-md">
        <div class="flex items-center justify-between mb-4">
            <div class="w-14 h-14 rounded-full bg-white/20 backdrop-blur-sm flex items-center justify-center font-bold text-xl shadow-inner border border-white/30">
                {{ isset(auth()->user()->name) ? strtoupper(substr(auth()->user()->name, 0, 2)) : 'UN' }}
            </div>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('sidebar-logout-form').submit();" class="text-xs font-semibold hover:text-white transition opacity-90">
                Sign out ⟳
            </a>
        </div>
        <p class="font-semibold text-sm truncate">{{ auth()->user()->name ?? 'Umiarti Ningsih' }}</p>
        <div class="flex justify-between items-center">
            <p class="text-xs text-blue-50 truncate">{{ auth()->user()->email ?? 'umiarti.ningsih@polibatam.ac.id' }}</p>
            <a href="{{ route('profile') }}" class="hover:text-white transition p-1">✎</a>
        </div>
    </div>

    <nav class="flex-1 p-2 flex flex-col gap-1 overflow-y-auto">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-4 px-4 py-3 text-sm font-medium {{ Route::is('dashboard') ? 'bg-slate-100 text-[#0052cc]' : 'text-[#0052cc] hover:bg-slate-50' }} rounded-lg transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
            Home
        </a>
        <a href="{{ route('koleksi.index') }}" class="flex items-center gap-4 px-4 py-3 text-sm font-medium {{ Route::is('koleksi.index') ? 'bg-slate-100 text-[#0052cc]' : 'text-[#0052cc] hover:bg-slate-50' }} rounded-lg transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
            Koleksi Buku
        </a>
        <a href="{{ route('keranjang') }}" class="flex items-center gap-4 px-4 py-3 text-sm font-medium {{ Route::is('keranjang') ? 'bg-slate-100 text-[#0052cc]' : 'text-[#0052cc] hover:bg-slate-50' }} rounded-lg transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
            Keranjang Saya
        </a>
        <a href="{{ route('tambah-buku') }}" class="flex items-center gap-4 px-4 py-3 text-sm font-medium {{ Route::is('tambah-buku') ? 'bg-slate-100 text-[#0052cc]' : 'text-[#0052cc] hover:bg-slate-50' }} rounded-lg transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            Tambah Koleksi
        </a>
        <a href="{{ route('denda') }}" class="flex items-center gap-4 px-4 py-3 text-sm font-medium {{ Route::is('denda') ? 'bg-slate-100 text-[#0052cc]' : 'text-[#0052cc] hover:bg-slate-50' }} rounded-lg transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
            Status Denda
        </a>
        <a href="{{ route('pinjaman-saya') }}" class="flex items-center gap-4 px-4 py-3 text-sm font-medium {{ Route::is('peminjaman.index') ? 'bg-slate-100 text-[#0052cc]' : 'text-[#0052cc] hover:bg-slate-50' }} rounded-lg transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
            Pinjaman Saya
        </a>
        <a href="{{ route('disukai-saya') }}" class="flex items-center gap-4 px-4 py-3 text-sm font-medium text-[#0052cc] hover:bg-slate-50 rounded-lg transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
            Disukai Saya
        </a>
        <a href="{{ route('keamanan-saya') }}" class="flex items-center gap-4 px-4 py-3 text-sm font-medium text-[#0052cc] hover:bg-slate-50 rounded-lg transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
            Keamanan Saya
        </a>
        <a href="{{ route('riwayat.index') }}" class="flex items-center gap-4 px-4 py-3 text-sm font-medium {{ Route::is('riwayat.index') ? 'bg-slate-100 text-[#0052cc]' : 'text-[#0052cc] hover:bg-slate-50' }} rounded-lg transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            Riwayat Peminjaman
        </a>
        <a href="{{ route('mahasiswa.index') }}" class="flex items-center gap-4 px-4 py-3 text-sm font-medium {{ Route::is('mahasiswa.index') ? 'bg-slate-100 text-[#0052cc]' : 'text-[#0052cc] hover:bg-slate-50' }} rounded-lg transition">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
    Kelola Mahasiswa
</a>

<a href="{{ route('peminjaman.admin') }}" class="flex items-center gap-4 px-4 py-3 text-sm font-medium {{ Route::is('peminjaman.admin') ? 'bg-slate-100 text-[#0052cc]' : 'text-[#0052cc] hover:bg-slate-50' }} rounded-lg transition">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
    Kelola Peminjaman
</a>

<a href="{{ route('perpanjangan.index') }}" class="flex items-center gap-4 px-4 py-3 text-sm font-medium {{ Route::is('perpanjangan.index') ? 'bg-slate-100 text-[#0052cc]' : 'text-[#0052cc] hover:bg-slate-50' }} rounded-lg transition">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
    Kelola Perpanjangan
</a>

<a href="{{ route('pengembalian.index') }}" class="flex items-center gap-4 px-4 py-3 text-sm font-medium {{ Route::is('pengembalian.index') ? 'bg-slate-100 text-[#0052cc]' : 'text-[#0052cc] hover:bg-slate-50' }} rounded-lg transition">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
    Kelola Pengembalian
</a>
<a href="{{ route('denda.riwayat') }}" class="flex items-center gap-4 px-4 py-3 text-sm font-medium {{ Route::is('denda.riwayat') ? 'bg-slate-100 text-[#0052cc]' : 'text-[#0052cc] hover:bg-slate-50' }} rounded-lg transition">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13C9.683 8.354 8 10.976 8 14c0 3.917 1.513 7 4 7s4-3.083 4-7c0-3.024-1.683-5.646-4-6.354z"/></svg>
    Riwayat Denda
</a>
    </nav>
    <form id="sidebar-logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
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

        <form action="{{ route('global.search') }}" method="GET" class="flex-1 max-w-xl mx-8 hidden md:block">
            <div class="relative flex items-center shadow-sm rounded-lg border border-gray-200 bg-gray-50">
                <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari judul buku, penulis, atau kategori..." class="w-full bg-transparent px-4 py-2 text-xs text-gray-600 placeholder-gray-400 focus:outline-none transition rounded-l-lg">
                <button type="submit" class="bg-[#10b981] hover:bg-[#059669] text-white px-5 h-[34px] rounded-r-lg transition flex items-center justify-center">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
            </div>
        </form>

        <div class="flex items-center gap-4">
            <button onclick="toggleMenu()" class="p-1.5 text-gray-500 hover:bg-gray-100 rounded-full relative transition">
                <span class="absolute top-1 right-1 w-2 h-2 bg-[#ef4444] rounded-full"></span>
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                </svg>
            </button>

            <div id="menuDropdown" class="hidden absolute right-16 top-[55px] w-52 bg-white rounded-xl shadow-lg border z-50 overflow-hidden">
                <div class="px-4 py-2 border-b bg-slate-50 text-xs font-semibold text-gray-500">Pilihan Jelajahi</div>
                <a href="{{ route('koleksi.index') }}" class="flex items-center gap-3 px-4 py-3 hover:bg-blue-50 text-sm text-gray-700">Koleksi Buku</a>
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
                        <p class="font-semibold text-gray-800 truncate">{{ auth()->user()->name ?? 'Umiarti Ningsih' }}</p>
                    </div>
                    <a href="{{ route('profile') }}" class="flex items-center gap-3 px-4 py-3 hover:bg-blue-50 text-sm text-gray-700">Akun Saya</a>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="flex items-center gap-3 px-4 py-3 hover:bg-red-50 text-sm text-red-500 font-medium border-t">Keluar Sesi</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
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
            }, 20);
        }
        function closeSidebar() {
            if(!sidebarMenu || !sidebarBackdrop) return;
            sidebarMenu.classList.add('-translate-x-full');
            sidebarBackdrop.classList.remove('opacity-100');
            setTimeout(() => {
                sidebarBackdrop.classList.add('hidden');
            }, 300);
        }
        if(sidebarToggle) sidebarToggle.addEventListener('click', openSidebar);
        if(sidebarClose) sidebarClose.addEventListener('click', closeSidebar);
        if(sidebarBackdrop) sidebarBackdrop.addEventListener('click', closeSidebar);
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
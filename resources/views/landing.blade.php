@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-cover bg-center bg-fixed bg-no-repeat relative"
     style="background-image:url('/image/library-bg.png')">

    <!-- Overlay -->
    <div class="absolute inset-0 bg-white/40"></div>

    <!-- Navbar Sticky -->
    <div class="fixed top-0 left-0 w-full z-50 px-6 py-3">
        <div class="bg-white/85 backdrop-blur-md rounded-2xl shadow-md px-5 py-3 flex items-center justify-between border border-gray-200">

            <!-- Logo -->
            <div class="flex items-center">
                <img src="{{ url('image/fudi-gital.png') }}"
                     alt="Logo FUDi-gital"
                     class="h-12 w-auto">
            </div>

            <!-- Search -->
            <div class="flex-1 mx-8 max-w-xl">
                <div class="relative">
                    <input type="text"
                           placeholder="Cari"
                           class="w-full rounded-xl border border-gray-300 bg-white px-4 py-2 pr-10 focus:outline-none focus:ring-2 focus:ring-blue-300">
                    <span class="absolute right-3 top-2.5 text-gray-400">🔍</span>
                </div>
            </div>

            <!-- Menu -->
            <div class="flex items-center gap-3 text-sm font-semibold">
                <button onclick="openPopup()" class="text-gray-700 hover:text-blue-500">
                    Informasi
                </button>

                <a href="/login"
                   class="px-4 py-2 rounded-full bg-gray-200 hover:bg-gray-300 text-gray-700">
                    MASUK
                </a>

                <a href="/register"
                   class="px-4 py-2 rounded-full bg-blue-400 hover:bg-blue-500 text-white">
                    DAFTAR
                </a>
            </div>
        </div>
    </div>

    <!-- Spacer Navbar -->
    <div class="h-24"></div>

    <!-- Hero -->
    <div class="relative z-10 h-[85vh] flex items-center justify-center px-6">
        <div class="text-center bg-white/30 backdrop-blur-sm px-8 py-6 rounded-3xl shadow-lg max-w-2xl">
            <h1 class="text-4xl font-bold text-gray-800">
                Selamat Datang di FUDi-gital
            </h1>

            <p class="mt-3 text-gray-700">
                Sistem perpustakaan digital modern untuk membaca dan meminjam buku dengan mudah.
            </p>
        </div>
    </div>

    <!-- Pengumuman -->
    <section class="relative z-10 bg-white/85 backdrop-blur-md py-16 px-6">
        <div class="max-w-5xl mx-auto">

            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-gray-800">
                    Pengumuman Terbaru
                </h2>

                <p class="text-gray-500 mt-2">
                    Informasi dan pemberitahuan terbaru dari perpustakaan
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-6">

                <div class="bg-blue-50 rounded-2xl p-6 shadow">
                    <h3 class="font-bold text-lg text-blue-700">
                        Jadwal Libur Nasional
                    </h3>
                    <p class="text-gray-600 mt-3 text-sm">
                        Perpustakaan tutup pada tanggal 17 Agustus dalam rangka Hari Kemerdekaan.
                    </p>
                    <span class="text-xs text-gray-400 mt-4 block">
                        10 Agustus 2026
                    </span>
                </div>

                <div class="bg-green-50 rounded-2xl p-6 shadow">
                    <h3 class="font-bold text-lg text-green-700">
                        Buku Baru Tersedia
                    </h3>
                    <p class="text-gray-600 mt-3 text-sm">
                        Koleksi buku Teknik Informatika terbaru telah ditambahkan.
                    </p>
                    <span class="text-xs text-gray-400 mt-4 block">
                        8 Agustus 2026
                    </span>
                </div>

                <div class="bg-yellow-50 rounded-2xl p-6 shadow">
                    <h3 class="font-bold text-lg text-yellow-700">
                        Perpanjangan Peminjaman
                    </h3>
                    <p class="text-gray-600 mt-3 text-sm">
                        Kini masa pinjam buku dapat diperpanjang langsung melalui sistem.
                    </p>
                    <span class="text-xs text-gray-400 mt-4 block">
                        5 Agustus 2026
                    </span>
                </div>

            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="relative z-10 bg-white py-4 px-6 border-t border-gray-300">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between gap-4">

            <!-- Logo -->
            <div>
                <img src="{{ url('image/fudi-gital.png') }}"
                     class="h-10 w-auto">
            </div>

            <!-- Info -->
            <div class="text-center text-xs text-gray-700">
                <div class="flex gap-8 font-semibold justify-center">
                    <span>Kebijakan Privasi</span>
                    <span>Hubungi Kami</span>
                    <span>Jam Operasional</span>
                </div>

                <p class="mt-1 text-gray-500">
                    lantai 1 di Gedung Utama Politeknik Negeri Batam,
                    Jalan Ahmad Yani, Batam Kota. 29461
                </p>
            </div>

            <!-- Sosmed -->
            <div class="flex gap-3 text-xl text-gray-700">
                <span>🟢</span>
                <span>📘</span>
                <span>📷</span>
                <span>▶️</span>
            </div>

        </div>
    </footer>

    <!-- Popup -->
    <x-popup-informasi />
</div>
@endsection


@push('scripts')
<script>
function openPopup() {
    let popup = document.getElementById('popup');
    let box = document.getElementById('popupBox');

    popup.classList.remove('hidden');

    setTimeout(() => {
        box.classList.remove('scale-95','opacity-0');
        box.classList.add('scale-100','opacity-100');
    }, 10);
}

function closePopup() {
    let popup = document.getElementById('popup');
    let box = document.getElementById('popupBox');

    box.classList.add('scale-95','opacity-0');

    setTimeout(() => {
        popup.classList.add('hidden');
    }, 200);

    localStorage.setItem('popupShown', 'true');
}

window.onload = function () {
    if (!localStorage.getItem('popupShown')) {
        openPopup();
    }
}
</script>
@endpush
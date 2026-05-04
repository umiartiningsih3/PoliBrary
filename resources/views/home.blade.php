@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-cover bg-center bg-fixed bg-no-repeat relative"
     style="background-image:url('/image/library-bg.png')">

    <!-- Overlay -->
    <div class="absolute inset-0 bg-white/40"></div>

    <!-- ================= NAVBAR ================= -->
    <header class="fixed top-0 left-0 w-full z-50 px-3 md:px-6 py-3">
        <div class="bg-white/85 backdrop-blur-md rounded-2xl shadow-md px-4 md:px-5 py-3 flex items-center justify-between border border-gray-200 gap-3">

            <!-- Logo -->
            <a href="/" class="flex items-center shrink-0">
                <img src="{{ url('image/fudi-gital.png') }}"
                     alt="Logo FUDi-gital"
                     class="h-10 md:h-12 w-auto">
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

    <!-- Spacer -->
    <div class="h-24"></div>

    <!-- ================= HERO ================= -->
    <section class="relative z-10 min-h-[85vh] flex items-center justify-center px-4 md:px-6">

        <div class="text-center bg-white/30 backdrop-blur-sm px-6 md:px-8 py-6 rounded-3xl shadow-lg max-w-2xl">

            <p class="text-blue-600 font-semibold tracking-wide uppercase text-sm">
                Selamat Datang
            </p>

            <h1 class="text-3xl md:text-5xl font-bold text-gray-800 mt-2 leading-tight">
                FUDi-gital
            </h1>

            <p class="mt-4 text-gray-700 text-sm md:text-lg">
                Sistem perpustakaan digital modern untuk membaca,
                meminjam, dan mengelola buku dengan mudah.
            </p>

            <div class="mt-6 flex flex-col sm:flex-row justify-center gap-3">
                <a href="/register"
                   class="px-6 py-3 rounded-full bg-blue-500 hover:bg-blue-600 text-white font-semibold transition">
                    Mulai Sekarang
                </a>

                <a href="/login"
                   class="px-6 py-3 rounded-full bg-white hover:bg-gray-100 text-gray-700 font-semibold transition">
                    Login
                </a>
            </div>

        </div>
    </section>

    <!-- ================= FITUR ================= -->
    <section class="relative z-10 py-14 px-4 md:px-6 bg-white/85 backdrop-blur-md">
        <div class="max-w-6xl mx-auto">

            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-gray-800">
                    Fitur Unggulan
                </h2>
                <p class="text-gray-500 mt-2">
                    Nikmati kemudahan layanan perpustakaan digital
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-6">

                <div class="bg-white rounded-2xl p-6 shadow text-center">
                    <div class="text-4xl mb-3">📚</div>
                    <h3 class="font-bold text-lg">Katalog Buku</h3>
                    <p class="text-sm text-gray-500 mt-2">
                        Cari berbagai koleksi buku dengan cepat.
                    </p>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow text-center">
                    <div class="text-4xl mb-3">🛒</div>
                    <h3 class="font-bold text-lg">Keranjang Pinjam</h3>
                    <p class="text-sm text-gray-500 mt-2">
                        Tambahkan buku ke keranjang pinjaman.
                    </p>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow text-center">
                    <div class="text-4xl mb-3">⏰</div>
                    <h3 class="font-bold text-lg">Riwayat Pinjam</h3>
                    <p class="text-sm text-gray-500 mt-2">
                        Pantau tanggal pinjam dan pengembalian.
                    </p>
                </div>

            </div>
        </div>
    </section>

    <!-- ================= PENGUMUMAN ================= -->
    <section class="relative z-10 bg-white py-16 px-4 md:px-6">
        <div class="max-w-5xl mx-auto">

            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-gray-800">
                    Pengumuman Terbaru
                </h2>

                <p class="text-gray-500 mt-2">
                    Informasi dan pemberitahuan terbaru
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-6">

                <div class="bg-blue-50 rounded-2xl p-6 shadow">
                    <h3 class="font-bold text-blue-700">
                        Jadwal Libur Nasional
                    </h3>
                    <p class="text-sm text-gray-600 mt-3">
                        Perpustakaan tutup pada tanggal 17 Agustus.
                    </p>
                </div>

                <div class="bg-green-50 rounded-2xl p-6 shadow">
                    <h3 class="font-bold text-green-700">
                        Buku Baru Tersedia
                    </h3>
                    <p class="text-sm text-gray-600 mt-3">
                        Koleksi terbaru telah ditambahkan.
                    </p>
                </div>

                <div class="bg-yellow-50 rounded-2xl p-6 shadow">
                    <h3 class="font-bold text-yellow-700">
                        Perpanjangan Peminjaman
                    </h3>
                    <p class="text-sm text-gray-600 mt-3">
                        Kini bisa diperpanjang lewat sistem.
                    </p>
                </div>

            </div>
        </div>
    </section>

    <!-- ================= FOOTER ================= -->
    <footer class="relative z-10 bg-white border-t border-gray-300 py-6 px-4 md:px-6">

        <div class="max-w-7xl mx-auto grid md:grid-cols-3 gap-6 items-center">

            <div class="text-center md:text-left">
                <img src="{{ url('image/fudi-gital.png') }}"
                     class="h-10 w-auto mx-auto md:mx-0">
            </div>

            <div class="text-center text-sm text-gray-600">
                <p class="font-semibold text-gray-700">
                    Politeknik Negeri Batam
                </p>

                <p class="mt-1">
                    Jalan Ahmad Yani, Batam Kota
                </p>

                <p>
                    Gedung Utama Lantai 1
                </p>
            </div>

            <div class="text-center md:text-right text-2xl space-x-2">
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
}

window.onload = function () {
    if (!localStorage.getItem('popupShown')) {
        openPopup();
    }
}
</script>
@endpush
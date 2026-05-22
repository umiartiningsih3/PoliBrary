@extends('layouts.home')

@section('content')

<div class="min-h-screen bg-[#eef7ff] overflow-hidden relative">

    <!-- ================= HERO ================= -->
    <section class="relative min-h-screen flex items-center px-6 lg:px-16 py-10">

        <!-- Background -->
        <div class="absolute inset-0">
            <img src="{{ asset('image/library-bg.png') }}"
                 class="w-full h-full object-cover"
                 alt="background">

            <!-- Overlay -->
            <div class="absolute inset-0 bg-gradient-to-r from-[#eef7ff] via-[#eef7ff]/90 to-transparent"></div>
        </div>

        <!-- ================= CONTENT ================= -->
        <div class="relative z-10 max-w-7xl mx-auto w-full grid lg:grid-cols-2 items-center gap-10">

            <!-- ================= LEFT CONTENT ================= -->
            <div class="space-y-7">

                <!-- Welcome -->
                <div>

                    <h1 class="text-4xl md:text-5xl font-extrabold text-[#12376B] leading-none">
                        Selamat
                        <span class="text-[#47B8F2]">
                            Datang
                        </span>
                    </h1>

                    <p class="text-[#12376B] font-medium mt-3">
                        Di Digital Library Polibatam
                    </p>

                </div>

                <!-- Heading -->
                <div>

                    <h2 class="text-5xl md:text-6xl font-extrabold text-[#12376B] leading-tight">

                        Akses Ilmu, <br>
                        Raih Masa Depan

                    </h2>

                    <p class="mt-6 text-lg text-gray-700 leading-relaxed max-w-xl">

                        PoliBrary adalah perpustakaan digital Polibatam
                        yang menyediakan koleksi buku, jurnal, dan sumber
                        belajar kapan saja dan di mana saja.

                    </p>

                </div>

                <!-- Button -->
                <div class="pt-2">

                    @auth

                    <a href="{{ route('dashboard') }}"
                       class="inline-flex items-center gap-3 bg-[#47B8F2]
                              hover:bg-[#2ca7e7] transition duration-300
                              text-white font-bold px-8 py-4 rounded-full
                              shadow-xl shadow-blue-200 hover:scale-105">

                        Ke Dashboard
                        <span class="text-xl">➜</span>

                    </a>

                    @else

                    <a href="{{ route('login') }}"
                       class="inline-flex items-center gap-3 bg-[#47B8F2]
                              hover:bg-[#2ca7e7] transition duration-300
                              text-white font-bold px-8 py-4 rounded-full
                              shadow-xl shadow-blue-200 hover:scale-105">

                        Mulai Sekarang
                        <span class="text-xl">➜</span>

                    </a>

                    @endauth

                </div>

            </div>

            <!-- ================= RIGHT EMPTY ================= -->
            <div></div>

        </div>


    </section>

    <!-- ================= FITUR ================= -->
    <section id="fitur"
             class="relative z-10 py-20 px-4 md:px-6 bg-white/90 backdrop-blur-md">

        <div class="max-w-6xl mx-auto">

            <!-- Title -->
            <div class="text-center mb-16">

                <h2 class="text-3xl md:text-4xl font-bold text-gray-800">
                    Fitur Unggulan yang Tersedia
                </h2>

                <div class="w-20 h-1 bg-blue-500 mx-auto mt-4 rounded-full"></div>

            </div>

            <!-- Cards -->
            <div class="grid md:grid-cols-3 gap-8">

                <!-- Card 1 -->
                <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100
                            text-center hover:shadow-xl hover:-translate-y-2
                            transition duration-300">

                    <div class="text-5xl mb-4">
                        📚
                    </div>

                    <h3 class="font-bold text-xl text-gray-800">
                        Katalog Buku
                    </h3>

                    <p class="text-sm text-gray-500 mt-3 leading-relaxed">

                        Cari berbagai koleksi buku fisik dan digital
                        dengan cepat dan mudah.

                    </p>

                </div>

                <!-- Card 2 -->
                <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100
                            text-center hover:shadow-xl hover:-translate-y-2
                            transition duration-300">

                    <div class="text-5xl mb-4">
                        🛒
                    </div>

                    <h3 class="font-bold text-xl text-gray-800">
                        Keranjang Pinjam
                    </h3>

                    <p class="text-sm text-gray-500 mt-3 leading-relaxed">

                        Kelola daftar buku yang ingin dipinjam
                        dalam satu tempat.

                    </p>

                </div>

                <!-- Card 3 -->
                <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100
                            text-center hover:shadow-xl hover:-translate-y-2
                            transition duration-300">

                    <div class="text-5xl mb-4">
                        ⏰
                    </div>

                    <h3 class="font-bold text-xl text-gray-800">
                        Riwayat Pinjam
                    </h3>

                    <p class="text-sm text-gray-500 mt-3 leading-relaxed">

                        Pantau batas waktu dan riwayat
                        pengembalian buku Anda.

                    </p>

                </div>

            </div>

        </div>

    </section>

    <!-- ================= PENGUMUMAN ================= -->
    <section id="pengumuman"
             class="relative z-10 bg-white py-20 px-4 md:px-6 border-t border-gray-50">

        <div class="max-w-5xl mx-auto text-center">

            <!-- Title -->
            <h2 class="text-3xl font-bold text-gray-800 mb-12">
                Pengumuman Terbaru
            </h2>

            <!-- Cards -->
            <div class="grid md:grid-cols-3 gap-6 text-left">

                <!-- Card 1 -->
                <div class="bg-blue-50/50 rounded-2xl p-6 border border-blue-100
                            shadow-sm hover:shadow-lg transition duration-300">

                    <h3 class="font-bold text-blue-700">
                        Jadwal Libur Nasional
                    </h3>

                    <p class="text-sm text-gray-600 mt-3 italic">

                        Perpustakaan tutup pada tanggal 17 Agustus.

                    </p>

                </div>

                <!-- Card 2 -->
                <div class="bg-green-50/50 rounded-2xl p-6 border border-green-100
                            shadow-sm hover:shadow-lg transition duration-300">

                    <h3 class="font-bold text-green-700">
                        Buku Baru Tersedia
                    </h3>

                    <p class="text-sm text-gray-600 mt-3">

                        Koleksi referensi IT terbaru telah
                        ditambahkan ke sistem.

                    </p>

                </div>

                <!-- Card 3 -->
                <div class="bg-yellow-50/50 rounded-2xl p-6 border border-yellow-100
                            shadow-sm hover:shadow-lg transition duration-300">

                    <h3 class="font-bold text-yellow-700">
                        Perpanjangan Mandiri
                    </h3>

                    <p class="text-sm text-gray-600 mt-3">

                        Kini peminjaman dapat diperpanjang online maksimal 1x.

                    </p>

                </div>

            </div>

        </div>

    </section>

    <!-- ================= POPUP ================= -->
    <x-popup-informasi />

</div>

@endsection


<script>

    function openPopup() {

        const popup = document.getElementById('popup');
        const box = document.getElementById('popupBox');

        if (!popup || !box) return;

        popup.classList.remove('hidden');

        setTimeout(() => {
            box.classList.remove('scale-95', 'opacity-0');
            box.classList.add('scale-100', 'opacity-100');
        }, 10);
    }

    function closePopup() {

        const popup = document.getElementById('popup');
        const box = document.getElementById('popupBox');

        if (!popup || !box) return;

        box.classList.remove('scale-100', 'opacity-100');
        box.classList.add('scale-95', 'opacity-0');

        setTimeout(() => {
            popup.classList.add('hidden');
        }, 300);
    }

</script>
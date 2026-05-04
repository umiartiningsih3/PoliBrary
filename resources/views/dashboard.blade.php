@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-[#efefef] flex flex-col">

    <!-- NAVBAR -->
    <nav class="bg-[#d9eef8] border-b border-gray-400 h-[48px] px-3 flex items-center justify-between">

        <!-- kiri -->
        <div class="flex items-center gap-8">

            <!-- logo -->
            <a href="/" class="flex items-center">
                <img src="{{ asset('image/fudi-gital.png') }}"
                     alt="Logo"
                     class="h-8 object-contain">
            </a>

            <!-- menu -->
            <div class="flex items-center gap-6 text-[13px] font-bold text-black">
                <a href="#">Beranda</a>
                <a href="#">Informasi</a>
            </div>

        </div>

        <!-- kanan -->
        <div class="flex items-center gap-4 text-[13px] font-bold text-black">

            <button class="flex items-center gap-1">
                Jelajahi <span>▼</span>
            </button>

            <div class="w-7 h-7 rounded-full bg-blue-500 text-white flex items-center justify-center text-xs">
                👤
            </div>

        </div>

    </nav>


    <!-- CONTENT -->
    <main class="flex-1 px-4 py-3">

        <!-- sapaan -->
        <h1 class="text-[18px] font-bold mb-5">
            Selamat Datang, Umiarti Ningsih!
        </h1>


        <!-- statistik -->
        <div class="grid grid-cols-4 gap-8 mb-5">

            <div class="bg-[#d0d0d0] h-[72px] flex items-center justify-center text-center text-[12px] font-bold px-2">
                Buku Terpinjam
            </div>

            <div class="bg-[#d0d0d0] h-[72px] flex items-center justify-center text-center text-[12px] font-bold px-2">
                Terlambat Dikembalikan
            </div>

            <div class="bg-[#d0d0d0] h-[72px] flex items-center justify-center text-center text-[12px] font-bold px-2">
                Total Denda<br>Saat ini
            </div>

            <div class="bg-[#d0d0d0] h-[72px] flex items-center justify-center text-center text-[12px] font-bold px-2">
                Jumlah Koleksi<br>Buku
            </div>

        </div>


        <!-- rekomendasi -->
        <h2 class="font-bold text-[16px] mb-3">
            Rekomendasi Buku
        </h2>

        <div class="grid grid-cols-2 gap-10 mb-5">

            <!-- card -->
            <div class="bg-[#d0d0d0] p-4 flex gap-4">

                <div class="w-[54px] h-[66px] bg-[#ececec]"></div>

                <div class="flex-1">
                    <h3 class="font-bold text-[14px]">Budidaya Lele</h3>
                    <p class="text-[12px] font-bold">Umi Cantik</p>

                    <div class="border-b border-gray-500 my-2"></div>

                    <p class="text-green-600 text-[12px] font-bold">
                        Tersedia
                    </p>

                    <div class="flex gap-1 mt-1">
                        <button class="bg-white border text-[9px] px-1 py-[2px]">
                            📄 Tandai
                        </button>

                        <button class="bg-white border text-[9px] px-1 py-[2px]">
                            ⊕ Tambah ke Keranjang
                        </button>
                    </div>
                </div>

            </div>


            <!-- card -->
            <div class="bg-[#d0d0d0] p-4 flex gap-4">

                <div class="w-[54px] h-[66px] bg-[#ececec]"></div>

                <div class="flex-1">
                    <h3 class="font-bold text-[14px]">Budidaya Ayam</h3>
                    <p class="text-[12px] font-bold">Umi Cantik</p>

                    <div class="border-b border-gray-500 my-2"></div>

                    <p class="text-green-600 text-[12px] font-bold">
                        Tersedia
                    </p>

                    <div class="flex gap-1 mt-1">
                        <button class="bg-white border text-[9px] px-1 py-[2px]">
                            📄 Tandai
                        </button>

                        <button class="bg-white border text-[9px] px-1 py-[2px]">
                            ⊕ Tambah ke Keranjang
                        </button>
                    </div>
                </div>

            </div>

        </div>


        <!-- buku terbaru -->
        <h2 class="font-bold text-[16px] mb-3">
            Buku Terbaru
        </h2>

        <div class="grid grid-cols-2 gap-10">

            <!-- card -->
            <div class="bg-[#d0d0d0] p-4 flex gap-4">

                <div class="w-[54px] h-[66px] bg-[#ececec]"></div>

                <div class="flex-1">
                    <h3 class="font-bold text-[14px]">Budidaya Lele</h3>
                    <p class="text-[12px] font-bold">Umi Cantik</p>

                    <div class="border-b border-gray-500 my-2"></div>

                    <p class="text-green-600 text-[12px] font-bold">
                        Tersedia
                    </p>

                    <div class="flex gap-1 mt-1">
                        <button class="bg-white border text-[9px] px-1 py-[2px]">
                            📄 Tandai
                        </button>

                        <button class="bg-white border text-[9px] px-1 py-[2px]">
                            ⊕ Tambah ke Keranjang
                        </button>
                    </div>
                </div>

            </div>


            <!-- card -->
            <div class="bg-[#d0d0d0] p-4 flex gap-4">

                <div class="w-[54px] h-[66px] bg-[#ececec]"></div>

                <div class="flex-1">
                    <h3 class="font-bold text-[14px]">Budidaya Ayam</h3>
                    <p class="text-[12px] font-bold">Umi Cantik</p>

                    <div class="border-b border-gray-500 my-2"></div>

                    <p class="text-green-600 text-[12px] font-bold">
                        Tersedia
                    </p>

                    <div class="flex gap-1 mt-1">
                        <button class="bg-white border text-[9px] px-1 py-[2px]">
                            📄 Tandai
                        </button>

                        <button class="bg-white border text-[9px] px-1 py-[2px]">
                            ⊕ Tambah ke Keranjang
                        </button>
                    </div>
                </div>

            </div>

        </div>

    </main>



    <!-- FOOTER -->
    <footer class="bg-[#d9d9d9] border-t border-gray-400 h-[52px] px-3 flex items-center justify-between">

        <!-- logo -->
        <img src="{{ asset('image/fudi-gital.png') }}"
             class="h-8 object-contain">

        <!-- tengah -->
        <div class="text-[10px] text-center leading-4">
            <div class="flex gap-10 font-bold justify-center">
                <span>Kebijakan Privasi</span>
                <span>Hubungi Kami</span>
                <span>Jam Operasional</span>
            </div>

            <p class="text-[9px] mt-1">
                lantai 1 di Gedung Utama Politeknik Negeri Batam, Jalan Ahmad Yani Batam Kota, 29461
            </p>
        </div>

        <!-- kanan -->
        <div class="flex gap-2 text-[15px]">
            <span>🟢</span>
            <span>📘</span>
            <span>📷</span>
            <span>▶</span>
        </div>

    </footer>

</div>

@endsection
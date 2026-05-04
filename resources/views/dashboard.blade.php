@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-gradient-to-br from-blue-50 to-gray-100 flex flex-col">

    <!-- NAVBAR -->
    <nav class="bg-white shadow-sm px-6 h-[60px] flex items-center justify-between">

        <div class="flex items-center gap-10">
            <a href="/">
                <img src="{{ asset('image/fudi-gital.png') }}" class="h-10">
            </a>

            <div class="flex gap-6 text-sm font-semibold text-gray-700">
                <a href="#" class="hover:text-blue-600">Beranda</a>
                <a href="#" class="hover:text-blue-600">Informasi</a>
            </div>
        </div>

        <div class="flex items-center gap-4 text-sm font-semibold">

            <button class="flex items-center gap-1 text-gray-700 hover:text-blue-600">
                Jelajahi
                <!-- icon dropdown -->
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M19 9l-7 7-7-7"/>
                </svg>
            </button>

            <!-- user icon -->
            <div class="w-9 h-9 rounded-full bg-blue-500 flex items-center justify-center">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M5.121 17.804A9 9 0 1118.879 17.804M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
            </div>

        </div>

    </nav>


    <!-- CONTENT -->
    <main class="flex-1 px-8 py-6">

        <h1 class="text-xl font-bold text-gray-800 mb-6">
            Selamat Datang, Umiarti Ningsih
        </h1>

        <!-- STATISTIK -->
        <div class="grid grid-cols-4 gap-6 mb-10">

            <div class="bg-white rounded-xl shadow p-4 flex items-center gap-3">
                <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M12 6v6l4 2"/>
                    <circle cx="12" cy="12" r="10"/>
                </svg>
                <div>
                    <p class="text-sm text-gray-500">Buku Terpinjam</p>
                    <p class="font-bold text-lg">5</p>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow p-4 flex items-center gap-3">
                <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M12 8v4l3 3"/>
                    <circle cx="12" cy="12" r="10"/>
                </svg>
                <div>
                    <p class="text-sm text-gray-500">Terlambat</p>
                    <p class="font-bold text-lg">1</p>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow p-4 flex items-center gap-3">
                <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M12 8c-3 0-5 2-5 4s2 4 5 4 5-2 5-4-2-4-5-4z"/>
                    <path d="M12 2v4M12 18v4"/>
                </svg>
                <div>
                    <p class="text-sm text-gray-500">Total Denda</p>
                    <p class="font-bold text-lg">Rp 10.000</p>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow p-4 flex items-center gap-3">
                <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M4 19.5V6a2 2 0 012-2h12a2 2 0 012 2v13.5"/>
                    <path d="M8 6v13"/>
                </svg>
                <div>
                    <p class="text-sm text-gray-500">Koleksi Buku</p>
                    <p class="font-bold text-lg">120</p>
                </div>
            </div>

        </div>


        <!-- REKOMENDASI -->
        <div class="mb-10">

            <div class="flex justify-between items-center mb-3">
                <h2 class="font-bold text-lg text-gray-800">Rekomendasi Buku</h2>

                <div class="flex gap-2">
                    <button onclick="scrollLeft('rekomendasi')" class="btn-nav">◀</button>
                    <button onclick="scrollRight('rekomendasi')" class="btn-nav">▶</button>
                </div>
            </div>

            <div id="rekomendasi"
                 class="flex gap-6 overflow-x-auto scroll-smooth pb-3 scrollbar-hide">

                @for ($i = 1; $i <= 6; $i++)
                <div class="min-w-[260px] bg-white rounded-xl shadow p-4 flex gap-4 hover:shadow-md transition">

                    <div class="w-[60px] h-[80px] bg-gray-200 rounded"></div>

                    <div>
                        <h3 class="font-bold text-gray-800">Buku {{ $i }}</h3>
                        <p class="text-sm text-gray-500">Penulis {{ $i }}</p>

                        <div class="border-b my-2"></div>

                        <p class="text-green-500 text-sm font-semibold">Tersedia</p>

                        <div class="flex gap-2 mt-2">
                            <button class="bg-gray-100 px-2 py-1 rounded text-xs">Tandai</button>
                            <button class="bg-blue-500 text-white px-2 py-1 rounded text-xs">Tambah</button>
                        </div>
                    </div>

                </div>
                @endfor

            </div>
        </div>


        <!-- TERBARU -->
        <div>

            <div class="flex justify-between items-center mb-3">
                <h2 class="font-bold text-lg text-gray-800">Buku Terbaru</h2>

                <div class="flex gap-2">
                    <button onclick="scrollLeft('terbaru')" class="btn-nav">◀</button>
                    <button onclick="scrollRight('terbaru')" class="btn-nav">▶</button>
                </div>
            </div>

            <div id="terbaru"
                 class="flex gap-6 overflow-x-auto scroll-smooth pb-3 scrollbar-hide">

                @for ($i = 1; $i <= 6; $i++)
                <div class="min-w-[260px] bg-white rounded-xl shadow p-4 flex gap-4 hover:shadow-md transition">

                    <div class="w-[60px] h-[80px] bg-gray-200 rounded"></div>

                    <div>
                        <h3 class="font-bold text-gray-800">Buku Baru {{ $i }}</h3>
                        <p class="text-sm text-gray-500">Penulis {{ $i }}</p>

                        <div class="border-b my-2"></div>

                        <p class="text-green-500 text-sm font-semibold">Tersedia</p>
                    </div>

                </div>
                @endfor

            </div>
        </div>
</main>


    <!-- FOOTER -->
    <footer class="bg-white border-t px-6 py-4 flex items-center justify-between text-sm text-gray-600">

        <!-- kiri -->
        <img src="{{ asset('image/fudi-gital.png') }}" class="h-8">

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

        <!-- kanan (ikon SVG) -->
        <div class="flex gap-4">

            <!-- Facebook -->
            <a href="#" class="hover:text-blue-600 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M22 12.07C22 6.48 17.52 2 12 2S2 6.48 2 12.07c0 5.03 3.66 9.18 8.44 9.93v-7.02H7.9v-2.91h2.54V9.41c0-2.5 1.5-3.88 3.8-3.88 1.1 0 2.25.2 2.25.2v2.48h-1.27c-1.25 0-1.64.78-1.64 1.58v1.9h2.8l-.45 2.91h-2.35V22c4.78-.75 8.44-4.9 8.44-9.93z"/>
                </svg>
            </a>

            <!-- Instagram -->
            <a href="#" class="hover:text-pink-500 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M7.75 2C4.57 2 2 4.57 2 7.75v8.5C2 19.43 4.57 22 7.75 22h8.5C19.43 22 22 19.43 22 16.25v-8.5C22 4.57 19.43 2 16.25 2h-8.5zm0 2h8.5A3.75 3.75 0 0120 7.75v8.5A3.75 3.75 0 0116.25 20h-8.5A3.75 3.75 0 014 16.25v-8.5A3.75 3.75 0 017.75 4zm8.75 1.5a.75.75 0 100 1.5.75.75 0 000-1.5zM12 7a5 5 0 100 10 5 5 0 000-10zm0 2a3 3 0 110 6 3 3 0 010-6z"/>
                </svg>
            </a>

            <!-- YouTube -->
            <a href="#" class="hover:text-red-500 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M21.8 8s-.2-1.4-.8-2c-.8-.8-1.7-.8-2.1-.9C15.9 5 12 5 12 5h0s-3.9 0-6.9.1c-.4 0-1.3.1-2.1.9-.6.6-.8 2-.8 2S2 9.6 2 11.2v1.6C2 14.4 2.2 16 2.2 16s.2 1.4.8 2c.8.8 1.9.8 2.4.9 1.7.2 6.6.2 6.6.2s3.9 0 6.9-.1c.4 0 1.3-.1 2.1-.9.6-.6.8-2 .8-2s.2-1.6.2-3.2v-1.6C22 9.6 21.8 8 21.8 8zM10 14.5v-5l5 2.5-5 2.5z"/>
                </svg>
            </a>

        </div>

    </footer>

</div>

@endsection


@push('scripts')
<script>
function scrollLeft(id) {
    document.getElementById(id).scrollBy({
        left: -300,
        behavior: 'smooth'
    });
}

function scrollRight(id) {
    document.getElementById(id).scrollBy({
        left: 300,
        behavior: 'smooth'
    });
}
</script>
@endpush
@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-gradient-to-br from-blue-50 to-gray-100 flex flex-col">

    <main class="flex-1 px-8 py-6">

        <h1 class="text-xl font-bold text-gray-800 mb-6">
            Selamat Datang, Umiarti Ningsih
        </h1>

        <!-- ================= STATISTIK ================= -->
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


        <!-- ================= REKOMENDASI ================= -->
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

                    <!-- COVER (DEFAULT LOGO JIKA TIDAK ADA GAMBAR) -->
                    <div class="w-[60px] h-[80px] rounded bg-gray-100 flex items-center justify-center overflow-hidden">

                        @if(false)
                            {{-- nanti diganti: $book->cover --}}
                            <img src="" class="w-full h-full object-cover">
                        @else
                            <img src="{{ asset('image/Polibrary-logo.png') }}"
                                 class="w-6 h-6 opacity-30 grayscale">
                        @endif

                    </div>

                    <!-- INFO -->
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


        <!-- ================= TERBARU ================= -->
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

                    <!-- COVER (DEFAULT LOGO JIKA TIDAK ADA GAMBAR) -->
                    <div class="w-[60px] h-[80px] rounded bg-gray-100 flex items-center justify-center overflow-hidden">

                        @if(false)
                            {{-- nanti diganti: $book->cover --}}
                            <img src="" class="w-full h-full object-cover">
                        @else
                            <img src="{{ asset('image/Polibrary-logo.png') }}"
                                 class="w-6 h-6 opacity-30 grayscale">
                        @endif

                    </div>

                    <!-- INFO -->
                    <div>
                        <h3 class="font-bold text-gray-800">Buku Baru {{ $i }}</h3>
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

    </main>

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
@extends('layouts.home')

@section('content')
<div class="min-h-screen bg-cover bg-center bg-fixed bg-no-repeat relative"
     style="background-image:url('{{ asset('image/library-bg.png') }}')">

    <!-- Overlay -->
    <div class="absolute inset-0 bg-white/40"></div>

    <!-- ================= HERO ================= -->
    <section class="relative z-10 min-h-[85vh] flex items-center justify-center px-4 md:px-6">
        <div class="text-center bg-white/30 backdrop-blur-sm px-6 md:px-12 py-10 rounded-[2.5rem] shadow-2xl border border-white/50 max-w-2xl">
            <p class="text-blue-600 font-bold tracking-widest uppercase text-xs mb-3">
                Selamat Datang
            </p>
            <h1 class="text-4xl md:text-6xl font-extrabold text-gray-800 leading-tight">
                FUDi-<span class="text-blue-600">gital</span>
            </h1>
            <p class="mt-4 text-gray-700 text-base md:text-lg leading-relaxed">
                Sistem perpustakaan digital modern untuk membaca,
                meminjam, dan mengelola buku dengan mudah.
            </p>
            <div class="mt-8">
                <a href="/login"
                   class="inline-block px-8 py-4 rounded-full bg-blue-500 hover:bg-blue-600 text-white font-bold shadow-lg shadow-blue-200 transition transform hover:-translate-y-1">
                    Mulai Sekarang
                </a>
            </div>
        </div>
    </section>

    <!-- ================= FITUR ================= -->
    <section class="relative z-10 py-20 px-4 md:px-6 bg-white/90 backdrop-blur-md">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800">Fitur Unggulan</h2>
                <div class="w-20 h-1 bg-blue-500 mx-auto mt-4 rounded-full"></div>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100 text-center hover:shadow-xl transition duration-300">
                    <div class="text-5xl mb-4">📚</div>
                    <h3 class="font-bold text-xl text-gray-800">Katalog Buku</h3>
                    <p class="text-sm text-gray-500 mt-3 leading-relaxed">Cari berbagai koleksi buku fisik dan digital dengan cepat.</p>
                </div>
                <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100 text-center hover:shadow-xl transition duration-300">
                    <div class="text-5xl mb-4">🛒</div>
                    <h3 class="font-bold text-xl text-gray-800">Keranjang Pinjam</h3>
                    <p class="text-sm text-gray-500 mt-3 leading-relaxed">Kelola daftar buku yang ingin Anda pinjam dalam satu tempat.</p>
                </div>
                <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100 text-center hover:shadow-xl transition duration-300">
                    <div class="text-5xl mb-4">⏰</div>
                    <h3 class="font-bold text-xl text-gray-800">Riwayat Pinjam</h3>
                    <p class="text-sm text-gray-500 mt-3 leading-relaxed">Pantau batas waktu dan riwayat pengembalian buku Anda.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= PENGUMUMAN ================= -->
    <section class="relative z-10 bg-white py-20 px-4 md:px-6 border-t border-gray-50">
        <div class="max-w-5xl mx-auto text-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-12">Pengumuman Terbaru</h2>
            <div class="grid md:grid-cols-3 gap-6 text-left">
                <div class="bg-blue-50/50 rounded-2xl p-6 border border-blue-100 shadow-sm">
                    <h3 class="font-bold text-blue-700">Jadwal Libur Nasional</h3>
                    <p class="text-sm text-gray-600 mt-3 italic">Perpustakaan tutup pada tanggal 17 Agustus.</p>
                </div>
                <div class="bg-green-50/50 rounded-2xl p-6 border border-green-100 shadow-sm">
                    <h3 class="font-bold text-green-700">Buku Baru Tersedia</h3>
                    <p class="text-sm text-gray-600 mt-3">Koleksi referensi IT terbaru telah ditambahkan ke sistem.</p>
                </div>
                <div class="bg-yellow-50/50 rounded-2xl p-6 border border-yellow-100 shadow-sm">
                    <h3 class="font-bold text-yellow-700">Perpanjangan Mandiri</h3>
                    <p class="text-sm text-gray-600 mt-3">Kini peminjaman bisa diperpanjang online maksimal 1x.</p>
                </div>
            </div>
        </div>
    </section>

    <x-popup-informasi />

</div>
@endsection

@push('scripts')
<script>
    function openPopup() {
        const popup = document.getElementById('popup');
        const box = document.getElementById('popupBox');
        if(!popup || !box) return;

        popup.classList.remove('hidden');
        setTimeout(() => {
            box.classList.remove('scale-95','opacity-0');
            box.classList.add('scale-100','opacity-100');
        }, 10);
    }

    function closePopup() {
        const popup = document.getElementById('popup');
        const box = document.getElementById('popupBox');
        
        box.classList.add('scale-95','opacity-0');
        box.classList.remove('scale-100','opacity-100');

        setTimeout(() => {
            popup.classList.add('hidden');
        }, 300);
        
        // Simpan status agar popup tidak muncul setiap refresh
        localStorage.setItem('popupShown', 'true');
    }

    window.onload = function () {
        if (!localStorage.getItem('popupShown')) {
            openPopup();
        }
    }
</script>
@endpush
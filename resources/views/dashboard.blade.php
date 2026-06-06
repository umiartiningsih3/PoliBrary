@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-slate-50 flex flex-col font-sans relative overflow-x-hidden">
    
    <!-- BANNER ATAS (Biru Muda sesuai dengan tema Polibrary) -->
    <div class="bg-gradient-to-r from-sky-100 to-blue-100 text-slate-800 py-12 px-12 relative overflow-hidden shadow-sm border-b border-sky-200">
        @if(true)
        <div class="absolute top-0 left-0 right-0 bg-amber-400 text-center py-2 text-xs font-semibold text-slate-900 shadow-sm">
            Pengingat: Anda memiliki denda yang belum dibayar sebesar <span class="font-bold">Rp 10.000</span>. Mohon segera lunasi di ruang pustakawan.
        </div>
        @endif

        <div class="max-w-7xl mx-auto mt-4 text-center">
            <h1 class="text-4xl font-light tracking-wide mb-2 text-slate-800">
    Selamat Datang, <span class="font-semibold text-sky-900">{{ Auth::user()->name }}</span>
</h1>
            <p class="text-slate-600 text-sm tracking-wide font-medium">
                Membaca adalah jendela dunia. Lanjutkan petualangan literasimu hari ini.
            </p>
        </div>
    </div>

    <!-- KONTEN UTAMA (Sistem Dua Kolom) -->
    <main class="max-w-7xl w-full mx-auto px-6 py-10 flex-1">
        <div class="grid grid-cols-12 gap-8">
            
            <!-- ================= KOLOM KIRI: STATUS & STATISTIK ================= -->
            <div class="col-span-12 lg:col-span-4 flex flex-col gap-6">
                
                <!-- Status Peminjaman -->
                <div class="bg-emerald-500 text-white rounded-2xl p-6 shadow-sm flex items-center justify-between transition-transform hover:scale-[1.01]">
                    <div>
                        <h2 class="text-xl font-semibold tracking-wide">Status Aman</h2>
                        <p class="text-emerald-100 text-xs mt-1">Semua buku wajib sudah dikembalikan!</p>
                    </div>
                    <div class="bg-white text-emerald-500 p-2 rounded-full shadow-inner">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                </div>

                <!-- Detail Ringkasan Akun -->
                <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm flex flex-col gap-4">
                    <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider">Aktivitas Perpustakaan</h3>
                    
                    <div class="flex items-center justify-between p-3 bg-sky-50/50 rounded-xl border border-sky-100">
                        <div class="flex items-center gap-3">
                            <span class="text-sky-600 bg-white p-2 rounded-lg text-lg shadow-sm">📚</span>
                            <span class="text-sm font-medium text-slate-700">Buku Terpinjam</span>
                        </div>
                        <span class="font-bold text-slate-900 text-lg">5</span>
                    </div>

                    <div class="flex items-center justify-between p-3 bg-red-50 rounded-xl border border-red-100">
                        <div class="flex items-center gap-3">
                            <span class="text-red-600 bg-white p-2 rounded-lg text-lg shadow-sm">⚠️</span>
                            <span class="text-sm font-medium text-slate-700">Terlambat</span>
                        </div>
                        <span class="font-bold text-red-600 text-lg">1</span>
                    </div>

                    <div class="flex items-center justify-between p-3 bg-emerald-50/50 rounded-xl border border-emerald-100">
                        <div class="flex items-center gap-3">
                            <span class="text-emerald-600 bg-white p-2 rounded-lg text-lg shadow-sm">🏛️</span>
                            <span class="text-sm font-medium text-slate-700">Total Koleksi</span>
                        </div>
                        <span class="font-bold text-slate-900 text-lg">120</span>
                    </div>
                </div>

                <!-- Banner Download Aplikasi Mobile -->
                <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm relative overflow-hidden flex flex-col justify-between min-h-[200px]">
                    <div class="absolute -right-10 -bottom-10 w-32 h-32 bg-sky-50 rounded-full opacity-60 pointer-events-none"></div>
                    <div>
                        <h3 class="text-lg font-bold text-sky-950 tracking-tight">Baca Buku di Mana Saja?</h3>
                        <p class="text-slate-500 text-[11px] mt-2 leading-relaxed">
                            Unduh aplikasi <strong class="text-sky-900">Polibrary Mobile</strong> untuk membaca e-book secara offline dan lacak pinjamanmu kapan saja.
                        </p>
                    </div>
                    <div class="flex flex-col gap-1.5 mt-4 relative z-10">
                        <a href="#" class="border border-sky-300 text-sky-800 font-semibold text-[11px] py-1.5 px-4 rounded-full text-center bg-sky-50 hover:bg-sky-100 transition shadow-sm">
                            Download iOS
                        </a>
                        <a href="#" class="border border-sky-300 text-sky-800 font-semibold text-[11px] py-1.5 px-4 rounded-full text-center bg-sky-50 hover:bg-sky-100 transition shadow-sm">
                            Download Play Store
                        </a>
                    </div>
                </div>

            </div>

            <!-- ================= KOLOM KANAN: KATALOG BUKU DENGAN TAB NAVIGASI ================= -->
            <div class="col-span-12 lg:col-span-8 bg-white border border-slate-200 rounded-2xl p-6 shadow-sm flex flex-col justify-between">
                
                <div>
                    <h2 class="text-xl font-bold text-sky-950 mb-4">E-Library Explorer</h2>
                    
                    <!-- Tab Navigasi Kategori Buku -->
                    <div class="flex border-b border-slate-200 text-xs font-semibold text-slate-500 mb-6 overflow-x-auto">
                        <button onclick="switchTab('rekomendasi-section')" id="tab-rekomendasi" class="tab-btn border-b-2 border-sky-500 text-sky-600 pb-3 px-4 flex items-center gap-1.5 whitespace-nowrap">
                            Rekomendasi Buku 
                            <span class="bg-sky-500 text-white text-[10px] px-1.5 py-0.5 rounded-full font-bold">6</span>
                        </button>
                        <button onclick="switchTab('terbaru-section')" id="tab-terbaru" class="tab-btn pb-3 px-4 text-slate-400 hover:text-slate-600 flex items-center gap-1.5 whitespace-nowrap">
                            Buku Terbaru 
                            <span class="bg-red-500 text-white text-[10px] px-1.5 py-0.5 rounded-full font-bold">Baru</span>
                        </button>
                    </div>

                    <!-- KONTEN TAB 1: REKOMENDASI BUKU -->
                    <div id="rekomendasi-section" class="tab-content flex flex-col gap-3">
                        @for ($i = 1; $i <= 4; $i++)
                        <div class="bg-sky-50/60 hover:bg-sky-50 transition rounded-xl p-4 flex items-center justify-between border border-sky-100/70">
                            <div class="flex items-center gap-4 min-w-0">
                                <div class="w-[45px] h-[60px] rounded bg-white border border-slate-200 flex items-center justify-center flex-shrink-0 shadow-sm overflow-hidden">
                                    <img src="{{ asset('image/Polibrary-logo.png') }}" class="w-5 h-5 opacity-20 grayscale">
                                </div>
                                <div class="min-w-0">
                                    <h4 class="font-bold text-slate-800 text-sm truncate">Buku Rekomendasi {{ $i }}</h4>
                                    <p class="text-[11px] text-slate-500 font-medium">Penulis {{ $i }} • Rak A-{{ $i }}</p>
                                    <span class="inline-block bg-green-100 text-green-700 text-[10px] font-bold px-2 py-0.5 rounded-md mt-1">Tersedia</span>
                                </div>
                            </div>
                            <div class="flex gap-2">
                                <button class="border border-sky-400 text-sky-800 font-medium text-xs px-4 py-1 rounded-full bg-white hover:bg-sky-50 transition shadow-sm">Pinjam</button>
                            </div>
                        </div>
                        @endfor
                    </div>

                    <!-- KONTEN TAB 2: BUKU TERBARU -->
                    <div id="terbaru-section" class="tab-content flex flex-col gap-3 hidden">
                        @for ($i = 1; $i <= 4; $i++)
                        <div class="bg-sky-50/60 hover:bg-sky-50 transition rounded-xl p-4 flex items-center justify-between border border-sky-100/70">
                            <div class="flex items-center gap-4 min-w-0">
                                <div class="w-[45px] h-[60px] rounded bg-white border border-slate-200 flex items-center justify-center flex-shrink-0 shadow-sm overflow-hidden">
                                    <img src="{{ asset('image/Polibrary-logo.png') }}" class="w-5 h-5 opacity-20 grayscale">
                                </div>
                                <div class="min-w-0">
                                    <h4 class="font-bold text-slate-800 text-sm truncate">Buku Rilisan Terbaru {{ $i }}</h4>
                                    <p class="text-[11px] text-slate-500 font-medium">Penulis Novel {{ $i }} • Tahun 2026</p>
                                    <span class="inline-block bg-green-100 text-green-700 text-[10px] font-bold px-2 py-0.5 rounded-md mt-1">Tersedia</span>
                                </div>
                            </div>
                            <div class="flex gap-2">
                                <button class="border border-sky-400 text-sky-800 font-medium text-xs px-4 py-1 rounded-full bg-white hover:bg-sky-50 transition shadow-sm">Pinjam</button>
                            </div>
                        </div>
                        @endfor
                    </div>

                </div>

                <div class="mt-8">
                    <button class="border border-sky-500 text-sky-800 font-semibold text-xs py-2 px-6 rounded-full hover:bg-sky-50 transition shadow-sm">
                        Lihat Semua Koleksi Buku
                    </button>
                </div>

            </div>

        </div>
    </main>
</div>
@endsection

@push('scripts')
<script>
// Fungsi Switch Tab Buku (Hanya logika tab internal halaman dashboard)
function switchTab(tabId) {
    document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));
    document.getElementById(tabId).classList.remove('hidden');

    document.querySelectorAll('.tab-btn').forEach(btn => {
        btn.classList.remove('border-b-2', 'border-sky-500', 'text-sky-600');
        btn.classList.add('text-gray-400');
    });

    const activeTab = event.currentTarget;
    activeTab.classList.add('border-b-2', 'border-sky-500', 'text-sky-600');
    activeTab.classList.remove('text-gray-400');
}
</script>
@endpush
@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-slate-50 flex flex-col font-['Poppins'] relative overflow-x-hidden">
    
    <!-- BANNER ATAS (Biru Muda sesuai dengan tema Polibrary) -->
    <div class="bg-gradient-to-r from-sky-100 to-blue-100 text-slate-800 py-6 px-10 relative overflow-hidden shadow-sm border-b border-sky-200">
        @if($total_denda > 0)
<div class="absolute top-0 left-0 right-0 bg-amber-400 text-center py-2 text-sm font-semibold text-slate-900 shadow-sm">
    Pengingat: Anda memiliki denda yang belum dibayar sebesar
    <span class="font-bold">
        Rp {{ number_format($total_denda, 0, ',', '.') }}
    </span>.
    Mohon segera lunasi di perpustakaan.
</div>
@endif
<br>
        <div class="max-w-7xl mx-auto mt-1 text-center">
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
                        @if($jumlah_terlambat == 0)

<h2 class="text-xl font-semibold tracking-wide">
    Status Aman
</h2>

<p class="text-emerald-100 text-xs mt-1">
    Tidak ada keterlambatan pengembalian buku.
</p>

@else

<h2 class="text-xl font-semibold tracking-wide">
    Ada Keterlambatan
</h2>

<p class="text-emerald-100 text-xs mt-1">
    Anda masih memiliki buku yang terlambat dikembalikan.
</p>

@endif
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
                            <span class="bg-white p-2 rounded-lg shadow-sm">
    <svg xmlns="http://www.w3.org/2000/svg"
         class="w-5 h-5 text-sky-600"
         fill="none"
         viewBox="0 0 24 24"
         stroke="currentColor"
         stroke-width="2">
        <path stroke-linecap="round"
              stroke-linejoin="round"
              d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1 5h12m-9 3a1 1 0 100-2 1 1 0 000 2zm8 0a1 1 0 100-2 1 1 0 000 2"/>
    </svg>
</span>
                            <span class="text-sm font-medium text-slate-700">Buku Terpinjam</span>
                        </div>
                        <span class="font-bold text-slate-900 text-lg">
    {{ $jumlah_peminjaman }}
</span>
                    </div>

                    <div class="flex items-center justify-between p-3 bg-red-50 rounded-xl border border-red-100">
                        <div class="flex items-center gap-3">
                            <span class="bg-white p-2 rounded-lg shadow-sm">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round"
            d="M12 9v4m0 4h.01M10.29 3.86 1.82 18A2 2 0 0 0 3.53 21h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0Z"/>
    </svg>
</span>
                            <span class="text-sm font-medium text-slate-700">Terlambat</span>
                        </div>
                        <span class="font-bold text-red-600 text-lg">
    {{ $jumlah_terlambat }}
</span>
                    </div>

                    <div class="flex items-center justify-between p-3 bg-emerald-50/50 rounded-xl border border-emerald-100">
                        <div class="flex items-center gap-3">
                            <span class="bg-white p-2 rounded-lg shadow-sm flex items-center justify-center">
    <svg xmlns="http://www.w3.org/2000/svg"
         class="w-5 h-5 text-emerald-600"
         fill="none"
         viewBox="0 0 24 24"
         stroke="currentColor"
         stroke-width="2">
        <path stroke-linecap="round"
              stroke-linejoin="round"
              d="M12 6.253v13m0-13C10.832 5.483 9.246 5 7.5 5S4.168 5.483 3 6.253v13C4.168 18.483 5.754 18 7.5 18c1.746 0 3.332.483 4.5 1.253m0-13C13.168 5.483 14.754 5 16.5 5s3.332.483 4.5 1.253v13C19.832 18.483 18.246 18 16.5 18c-1.746 0-3.332.483-4.5 1.253"/>
    </svg>
</span>
                            <span class="text-sm font-medium text-slate-700">Total Koleksi</span>
                        </div>
                        <span class="font-bold text-slate-900 text-lg">
    {{ $total_koleksi }}
</span>
                    </div>
                </div>
                <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">

    <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400">
        Progress Target Membaca
    </h3>

    <div class="flex justify-between mt-4 text-sm">
        <span>{{ $selesai }} dari {{ $target }} buku</span>
        <span>{{ $progress }}%</span>
    </div>

    <div class="w-full h-2 bg-slate-200 rounded-full mt-3">
        <div
            class="h-2 rounded-full bg-sky-500"
            style="width:{{ $progress }}%">
        </div>
    </div>

</div>

<div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">

    <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400">
        Jatuh Tempo Terdekat
</h3>

    @if($jatuh_tempo)

        @php
            $sisaHari = (int) now()->startOfDay()->diffInDays(
                \Carbon\Carbon::parse($jatuh_tempo->tgl_jatuh_tempo)->startOfDay(),
                false
            );
        @endphp

        <div class="mt-4">

            <h4 class="font-semibold text-slate-800">
                {{ $jatuh_tempo->buku->judul }}
            </h4>

            <p class="text-sm text-slate-500 mt-1">
                Tanggal Jatuh Tempo:
                <span class="font-medium">
                    {{ \Carbon\Carbon::parse($jatuh_tempo->tgl_jatuh_tempo)->translatedFormat('d F Y') }}
                </span>
            </p>

            @if($sisaHari > 0)
                <span class="inline-flex items-center mt-3 px-3 py-1 rounded-full bg-amber-100 text-amber-700 text-xs font-semibold">
                    ⏳ Sisa {{ $sisaHari }} hari
                </span>
            @elseif($sisaHari == 0)
                <span class="inline-flex items-center mt-3 px-3 py-1 rounded-full bg-red-100 text-red-700 text-xs font-semibold">
                    🔴 Jatuh tempo hari ini
                </span>
            @else
                <span class="inline-flex items-center mt-3 px-3 py-1 rounded-full bg-red-100 text-red-700 text-xs font-semibold">
                    ⚠️ Terlambat {{ abs($sisaHari) }} hari
                </span>
            @endif

        </div>

    @else

        <div class="mt-4 text-center py-4">
            <p class="text-sm text-slate-500">
                Tidak ada buku yang sedang dipinjam.
            </p>
        </div>

    @endif

</div>
</div>

            

            <!-- ================= KOLOM KANAN: KATALOG BUKU DENGAN TAB NAVIGASI ================= -->
            <div class="col-span-12 lg:col-span-8 bg-white border border-slate-200 rounded-2xl p-6 shadow-sm flex flex-col justify-between">
                
                <div>
                    <h2 class="text-2xl font-bold text-sky-950 mb-4">Pojok Literasi</h2>
                    
                    <!-- Tab Navigasi Kategori Buku -->
                    <div class="flex border-b border-slate-200 text-xs font-semibold text-slate-500 mb-6 overflow-x-auto">
                        <button
    onclick="switchTab('rekomendasi-section', this)"
    id="tab-rekomendasi"
    class="tab-btn border-b-2 border-sky-500 text-sky-600 pb-3 px-4 flex items-center gap-1.5 whitespace-nowrap">
    Rekomendasi Buku
                            <span class="bg-sky-500 text-white text-[10px] px-1.5 py-0.5 rounded-full font-bold">
    {{ $rekomendasi->count() }}
</span>
                        </button>
                        <button
    onclick="switchTab('terbaru-section', this)"
    id="tab-terbaru"
    class="tab-btn pb-3 px-4 text-slate-400 hover:text-slate-600 flex items-center gap-1.5 whitespace-nowrap">
    Buku Terbaru
                        @if($jumlah_buku_baru > 0)
<span class="bg-red-500 text-white text-[10px] px-1.5 py-0.5 rounded-full font-bold">
    {{ $jumlah_buku_baru }} Baru
</span>
@endif
                        </button>
                    </div>

                    <!-- KONTEN TAB 1: REKOMENDASI BUKU -->
                    <div id="rekomendasi-section" class="tab-content flex flex-col gap-3">
                        @foreach($rekomendasi as $buku)
                        <div class="bg-sky-50/60 hover:bg-sky-50 transition rounded-xl p-4 flex items-center justify-between border border-sky-100/70">
                            <div class="flex items-center gap-4 min-w-0">
                                <div class="w-[45px] h-[60px] rounded bg-white border border-slate-200 flex items-center justify-center flex-shrink-0 shadow-sm overflow-hidden">
                                    <img src="{{ asset('image/Polibrary-logo.png') }}" class="w-5 h-5 opacity-20 grayscale">
                                </div>
                                <div class="min-w-0">
                                    <h4 class="font-bold text-slate-800 text-sm truncate">
    {{ $buku->judul }}
</h4>
                                    <p class="text-[11px] text-slate-500 font-medium">{{ $buku->penulis }}
<br>
<span class="text-xs text-slate-500">
    Dipinjam {{ $buku->total_pinjam }} kali
</span></p>
                                    @if($buku->jumlah_eksemplar > 0)
    <span class="inline-block bg-green-100 text-green-700 text-[10px] font-bold px-2 py-0.5 rounded-md mt-1">
        Tersedia
    </span>
@else
    <span class="inline-block bg-red-100 text-red-700 text-[10px] font-bold px-2 py-0.5 rounded-md mt-1">
        Tidak Tersedia
    </span>
@endif
                                </div>
                            </div>
                            <div class="flex gap-2">
                                <div class="flex gap-2">

    @if($buku->jumlah_eksemplar > 0)

        <form action="{{ route('keranjang.tambah') }}" method="POST">
            @csrf
            <input type="hidden" name="buku_id" value="{{ $buku->id }}">

            <button type="submit"
                class="border border-sky-400 text-sky-800 font-medium text-xs px-4 py-1 rounded-full bg-white hover:bg-sky-50 transition shadow-sm">
                Pinjam
            </button>
        </form>

    @else

        <button
            disabled
            class="border border-gray-300 bg-gray-100 text-gray-400 font-medium text-xs px-4 py-1 rounded-full cursor-not-allowed">
            Tidak Tersedia
        </button>

    @endif

</div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- KONTEN TAB 2: BUKU TERBARU -->
                    <div id="terbaru-section" class="tab-content flex flex-col gap-3 hidden">
                        @foreach($terbaru as $buku)
                        <div class="bg-sky-50/60 hover:bg-sky-50 transition rounded-xl p-4 flex items-center justify-between border border-sky-100/70">
                            <div class="flex items-center gap-4 min-w-0">
                                <div class="w-[45px] h-[60px] rounded bg-white border border-slate-200 flex items-center justify-center flex-shrink-0 shadow-sm overflow-hidden">
                                    <img src="{{ asset('image/Polibrary-logo.png') }}" class="w-5 h-5 opacity-20 grayscale">
                                </div>
                                <div class="min-w-0">
                                    <h4 class="font-bold text-slate-800 text-sm truncate">{{ $buku->judul }}</h4>
                                    <p class="text-[11px] text-slate-500 font-medium">{{ $buku->penulis }} • {{ $buku->tahun_terbit }}</p>
                                    @if($buku->jumlah_eksemplar > 0)
    <span class="inline-block bg-green-100 text-green-700 text-[10px] font-bold px-2 py-0.5 rounded-md mt-1">
        Tersedia
    </span>
@else
    <span class="inline-block bg-red-100 text-red-700 text-[10px] font-bold px-2 py-0.5 rounded-md mt-1">
        Tidak Tersedia
    </span>
@endif
                                </div>
                            </div>
                            <div class="flex gap-2">
                                <div class="flex gap-2">

    @if($buku->jumlah_eksemplar > 0)

        <form action="{{ route('keranjang.tambah') }}" method="POST">
            @csrf
            <input type="hidden" name="buku_id" value="{{ $buku->id }}">

            <button type="submit"
                class="border border-sky-400 text-sky-800 font-medium text-xs px-4 py-1 rounded-full bg-white hover:bg-sky-50 transition shadow-sm">
                Pinjam
            </button>
        </form>

    @else

        <button
            disabled
            class="border border-gray-300 bg-gray-100 text-gray-400 font-medium text-xs px-4 py-1 rounded-full cursor-not-allowed">
            Tidak Tersedia
        </button>

    @endif

</div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>

                <div class="mt-8">
                    <a href="{{ route('koleksi.abc') }}"
   class="inline-block border border-sky-500 text-sky-800 font-semibold text-xs py-2 px-6 rounded-full hover:bg-sky-50 transition shadow-sm">
    Lihat Semua Koleksi Buku
</a>
                </div>

            </div>

        </div>
        <div class="mt-8">

<div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-6 mt-8">

    <div class="flex items-center justify-between mb-6">

        <div>
            <h3 class="text-lg font-semibold text-slate-800">
                Riwayat Aktivitas
            </h3>

            <p class="text-xs text-slate-500">
                Aktivitas peminjaman selama 7 hari terakhir
            </p>
        </div>

        <span
            class="bg-sky-100 text-sky-700 text-xs font-semibold px-3 py-1 rounded-full">
            {{ $aktivitas->count() }} Aktivitas
        </span>

    </div>

    @forelse($aktivitas as $item)

    <div class="flex items-start gap-4 py-5 border-b last:border-none">

        {{-- Icon --}}
        <div>

            @switch($item->status)

                @case('dipinjam')

                    <div class="w-12 h-12 rounded-full bg-sky-100 flex items-center justify-center">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-6 h-6 text-sky-600"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M3 3h2l.4 2M7 13h10l4-8H5.4"/>

                        </svg>

                    </div>

                @break

                @case('dikembalikan')

                    <div class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-6 h-6 text-green-600"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M5 13l4 4L19 7"/>

                        </svg>

                    </div>

                @break

                @case('terlambat')

                    <div class="w-12 h-12 rounded-full bg-red-100 flex items-center justify-center">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-6 h-6 text-red-600"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M12 9v2m0 4h.01"/>

                        </svg>

                    </div>

                @break

                @default

                    <div class="w-12 h-12 rounded-full bg-yellow-100 flex items-center justify-center">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-6 h-6 text-yellow-600"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M12 8v4l3 3"/>

                        </svg>

                    </div>

            @endswitch

        </div>

        {{-- Isi --}}
        <div class="flex-1">

            <div class="flex justify-between">

                <div>

                    <h4 class="font-semibold text-slate-800">

                        {{ ucfirst(str_replace('_',' ',$item->status)) }}

                    </h4>

                    <p class="text-sm text-slate-500">

                        {{ $item->buku->judul }}

                    </p>

                </div>

                <span
                    class="text-xs text-slate-400">

                    {{ $item->updated_at->locale('id')->diffForHumans() }}

                </span>

            </div>

        </div>

    </div>

    @empty

    <div class="text-center py-10">

        <svg xmlns="http://www.w3.org/2000/svg"
             class="w-16 h-16 mx-auto text-slate-300"
             fill="none"
             viewBox="0 0 24 24"
             stroke="currentColor">

            <path stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="1.5"
                  d="M9 17v-2a4 4 0 014-4h7"/>

        </svg>

        <p class="mt-4 text-slate-500">

            Belum ada aktivitas selama 7 hari terakhir.

        </p>

    </div>

    @endforelse

</div>

</div>

</div>
    </main>
</div>
@endsection

@push('scripts')
<script>
function switchTab(tabId, element) {

    // Sembunyikan semua isi tab
    document.querySelectorAll('.tab-content').forEach(content => {
        content.classList.add('hidden');
    });

    // Tampilkan tab yang dipilih
    document.getElementById(tabId).classList.remove('hidden');

    // Reset semua tombol
    document.querySelectorAll('.tab-btn').forEach(btn => {
        btn.classList.remove(
            'border-b-2',
            'border-sky-500',
            'text-sky-600',
            'font-semibold'
        );

        btn.classList.add('text-slate-400');
    });

    // Aktifkan tombol yang diklik
    element.classList.remove('text-slate-400');

    element.classList.add(
        'border-b-2',
        'border-sky-500',
        'text-sky-600',
        'font-semibold'
    );
}
</script>
@endpush
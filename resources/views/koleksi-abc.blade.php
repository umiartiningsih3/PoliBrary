@extends('layouts.app')

@section('content')
<div class="p-8 space-y-6 bg-slate-50 min-h-screen" 
     x-data="{ 
        bukuTerbuka: null,
        halamanSekarang: 1,
        urutBerdasarkan: 'relevansi',
        jumlahPerHalaman: 10,
        kataKunciKategori: 'judul',
        pencarianTeks: '',
        filterAlfabet: 'SEMUA',
        
        // Data dari Database
        semuaBuku: {{ json_encode($semuaBuku) }},

        get totalHalaman() {
            let dataDifilter = this.semuaBuku.filter(buku => {
                if (this.filterAlfabet === 'SEMUA') return true;
                return buku.judul.toUpperCase().startsWith(this.filterAlfabet);
            });
            return Math.ceil(dataDifilter.length / this.jumlahPerHalaman) || 1;
        },

        get bukuTampil() {
            let produkDisortir = this.semuaBuku.filter(buku => {
                if (this.filterAlfabet === 'SEMUA') return true;
                return buku.judul.toUpperCase().startsWith(this.filterAlfabet);
            });

            if (this.urutBerdasarkan === 'az') {
                produkDisortir.sort((a, b) => a.judul.localeCompare(b.judul));
            } else if (this.urutBerdasarkan === 'terbaru') {
                // Asumsi database memiliki kolom 'tahun' atau 'created_at'
                produkDisortir.sort((a, b) => b.tahun - a.tahun);
            } else if (this.urutBerdasarkan === 'relevansi') {
                produkDisortir.sort((a, b) => a.id - b.id);
            }

            let start = (this.halamanSekarang - 1) * this.jumlahPerHalaman;
            let end = start + parseInt(this.jumlahPerHalaman);
            return produkDisortir.slice(start, end);
        }
     }"
     x-init="$watch('jumlahPerHalaman', value => halamanSekarang = 1); 
             $watch('urutBerdasarkan', value => halamanSekarang = 1);
             $watch('filterAlfabet', value => halamanSekarang = 1)">

    <div class="text-center max-w-4xl mx-auto">
        <h2 class="text-3xl font-extrabold tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-sky-400">Koleksi Buku</h2>
        <p class="text-slate-500 text-sm mt-1">Gunakan fitur filter alfabet atau pencarian kata kunci untuk mempercepat pangkat materi kuliah Anda.</p>

        <div class="bg-white border border-slate-200 rounded-xl mt-6 shadow-sm overflow-hidden">
            <div class="flex justify-center text-sm font-medium">
                <span class="w-1/2 py-3 bg-gradient-to-r from-blue-50 to-indigo-50 text-blue-700 font-semibold text-center border-b-2 border-blue-600 select-none">
                    🔤 Daftar A - Z
                </span>
                <a href="{{ route('koleksi.subjek') }}" 
   class="w-1/2 py-3 {{ request()->routeIs('koleksi.subjek') ? 'bg-gradient-to-r from-blue-50 to-indigo-50 text-blue-700 border-b-2 border-blue-600' : 'text-slate-500 hover:bg-slate-50' }} font-semibold text-center transition select-none">
    📂 Daftar berdasarkan Subjek
</a>
            </div>
        </div>
    </div>

    <div class="flex justify-center mt-6">
        <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm flex flex-wrap items-center justify-center gap-4 max-w-4xl w-full">
            <div class="flex items-center gap-2">
                <label class="font-semibold text-slate-700 text-sm tracking-wide">Kata kunci :</label>
                <select x-model="kataKunciKategori" class="border border-slate-200 px-3 py-1.5 text-sm rounded-lg bg-slate-50 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 text-slate-700 font-medium cursor-pointer">
                    <option value="judul">📖 Judul Buku</option>
                    <option value="isbn">🔢 Nomor ISBN</option>
                    <option value="penulis">✍️ Nama Penulis</option>
                </select>
            </div>
            
            <div class="flex-1 min-w-[260px]">
                <input type="text" x-model="pencarianTeks" class="border border-slate-200 px-4 py-1.5 w-full text-sm rounded-lg focus:border-blue-500 focus:ring-1 focus:ring-blue-500 text-slate-800 placeholder-slate-400"
                    placeholder="Masukkan istilah penelusuran...">
            </div>

            <button @click="alert('Mencari ' + kataKunciKategori + ': ' + pencarianTeks)" class="bg-[#00b26a] hover:bg-[#00985a] text-white font-semibold px-6 py-1.5 text-sm rounded-lg shadow-sm transition duration-150 flex items-center gap-1.5">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                Pencarian
            </button>
        </div>
    </div>

    <div class="bg-white border border-slate-200 rounded-xl p-4 shadow-sm max-w-5xl mx-auto flex flex-wrap gap-1.5 text-xs font-bold justify-center items-center">
        <span @click="filterAlfabet = 'SEMUA'" 
              :class="filterAlfabet === 'SEMUA' ? 'bg-[#0f4c81] text-white shadow-sm' : 'bg-slate-50 text-slate-700 border border-slate-200 hover:bg-sky-100 hover:text-blue-700'"
              class="px-3 py-1.5 rounded-md cursor-pointer transition select-none">SEMUA</span>
              
        @foreach(range('A','Z') as $huruf)
            <span @click="filterAlfabet = '{{ $huruf }}'"
                  :class="filterAlfabet === '{{ $huruf }}' ? 'bg-[#0f4c81] text-white shadow-sm' : 'bg-slate-50 text-slate-700 border border-slate-200 hover:bg-sky-100 hover:text-blue-700'"
                  class="px-2.5 py-1.5 rounded-md cursor-pointer transition select-none">
                {{ $huruf }}
            </span>
        @endforeach
    </div>

    <div class="bg-white border border-slate-200 rounded-xl p-4 text-sm flex items-center justify-between flex-wrap gap-4 shadow-sm max-w-7xl mx-auto">
        <div class="text-slate-600 font-medium">
            🔍 Hasil Filter : <span class="bg-blue-50 text-blue-700 px-2 py-0.5 rounded border border-blue-200 font-bold ml-1" 
                                   x-text="(filterAlfabet === 'SEMUA' ? semuaBuku.length : semuaBuku.filter(b => b.judul.toUpperCase().startsWith(filterAlfabet)).length) + ' Buku'"></span>
        </div>

        <div class="flex items-center flex-wrap gap-3 text-xs font-semibold text-slate-700">
            <div class="flex items-center gap-1 bg-slate-100 rounded-lg p-0.5 border">
                <button @click="if(halamanSekarang > 1) { halamanSekarang--; bukuTerbuka = null; }" 
                        :disabled="halamanSekarang === 1"
                        :class="halamanSekarang === 1 ? 'opacity-40 cursor-not-allowed' : 'hover:bg-white text-slate-800'"
                        class="px-2 py-1 rounded transition text-sm font-bold">&laquo;</button>
                
                <span class="px-2 text-slate-600 select-none">
                    Halaman <b class="text-blue-600 font-bold text-sm" x-text="halamanSekarang">1</b> dari <span x-text="totalHalaman">4</span>
                </span>
                
                <button @click="if(halamanSekarang < totalHalaman) { halamanSekarang++; bukuTerbuka = null; }" 
                        :disabled="halamanSekarang === totalHalaman"
                        :class="halamanSekarang === totalHalaman ? 'opacity-40 cursor-not-allowed' : 'hover:bg-white text-slate-800'"
                        class="px-2 py-1 rounded transition text-sm font-bold">&raquo;</button>
            </div>

            <select x-model="urutBerdasarkan" class="border border-slate-200 px-2 py-1.5 rounded-lg bg-white cursor-pointer hover:border-slate-300">
                <option value="relevansi">🎯 Relevansi Teratas</option>
                <option value="terbaru">📅 Rilisan Terbaru</option>
                <option value="az">🔤 Judul Berurutan A-Z</option>
            </select>

            <select x-model="jumlahPerHalaman" class="border border-slate-200 px-2 py-1.5 rounded-lg bg-white cursor-pointer hover:border-slate-300">
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="50">50</option>
            </select>
        </div>
    </div>

    <div class="max-w-7xl mx-auto mt-6">

    <div x-show="bukuTampil.length === 0"
         class="bg-white border border-slate-200 rounded-2xl p-12 text-center text-slate-500 shadow-sm font-medium">
        📭 Tidak ada koleksi buku yang berawalan huruf
        "<span class="font-bold text-blue-600" x-text="filterAlfabet"></span>".
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-5">

        <template x-for="(buku, index) in bukuTampil" :key="buku.id">

            <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden flex flex-col">

                <!-- Cover -->
                <div class="relative">

    <img :src="'{{ asset('storage/') }}/' + buku.sampul"
         alt="Sampul Buku"
         class="w-full h-64 object-cover"
         onerror="this.src='{{ asset('image/Polibrary-logo.png') }}'">

    <!-- Nomor -->
    <div class="absolute top-2 left-2 bg-blue-600 text-white text-[10px] px-2 py-1 rounded">
        #<span x-text="((halamanSekarang - 1) * jumlahPerHalaman) + index + 1"></span>
    </div>

    <!-- STOK HABIS -->
    <div x-show="buku.tersedia <= 0"
         class="absolute -right-10 top-5 rotate-45 bg-red-600 text-white text-[10px] font-bold px-10 py-1 shadow-lg">
        STOK HABIS
    </div>

</div>

                <!-- Isi Card -->
                <div class="p-4 flex flex-col flex-1">

                    <span class="text-[10px] font-bold text-blue-600 bg-blue-50 px-2 py-1 rounded w-fit">
                        <span x-text="buku.kategori"></span>
                    </span>

                    <h3 class="font-bold text-slate-800 mt-2 min-h-[50px] line-clamp-2"
                        x-text="buku.judul">
                    </h3>

                    <p class="text-xs text-slate-500 mt-1"
                       x-text="buku.penulis">
                    </p>

                    <div class="mt-3 text-xs text-slate-600">
                        ISBN :
                        <span class="font-semibold" x-text="buku.isbn"></span>
                    </div>

                    <div class="text-xs text-slate-600 mt-1">
                        Tahun :
                        <span class="font-semibold" x-text="buku.tahun_terbit"></span>
                    </div>

                    <!-- Spacer -->
                    <div class="flex-1"></div>

                    <!-- Tersedia -->
                    <div class="mt-5 text-center">

    <template x-if="buku.tersedia > 0">
        <span class="text-sm font-bold text-emerald-600">
            Tersedia
            <span x-text="buku.tersedia"></span>
        </span>
    </template>

    <template x-if="buku.tersedia <= 0">
        <span class="text-sm font-bold text-red-600">
            Buku Kosong
        </span>
    </template>

</div>

<div class="mt-4 flex justify-center gap-2">

<form method="POST" action="{{ route('keranjang.tambah') }}">
    @csrf

    <input type="hidden" name="buku_id" :value="buku.id">

    <button
        type="submit"
        :disabled="buku.tersedia <= 0"

        :class="buku.tersedia <= 0
            ? 'bg-gray-400 cursor-not-allowed'
            : 'bg-green-600 hover:bg-green-700'"

        class="text-white px-4 py-2 rounded-lg text-xs font-semibold transition">

        <span x-show="buku.tersedia > 0">
            Pinjam
        </span>

        <span x-show="buku.tersedia <= 0">
            Pinjam
        </span>

    </button>

</form>

                        <form method="POST" action="{{ route('disukai.tambah') }}">
                            @csrf
                            <input type="hidden" name="buku_id" :value="buku.id">

                            <button type="submit"
                                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-xs font-semibold">
                                Sukai
                            </button>
                        </form>

                    </div>

                </div>

            </div>

        </template>

    </div>

    <div class="mt-8 border-t border-slate-200 pt-6 flex justify-center"
     x-show="bukuTampil.length > 0">

    <button
        @click="if(halamanSekarang < totalHalaman) halamanSekarang++"
        :disabled="halamanSekarang === totalHalaman"
        :class="halamanSekarang === totalHalaman
            ? 'opacity-50 cursor-not-allowed'
            : 'hover:opacity-90'"
        class="bg-gradient-to-r from-[#0f4c81] to-[#1d3557]
               text-white px-8 py-3 rounded-xl
               font-semibold shadow-md transition">

        Halaman Berikutnya →
    </button>

</div> </div> @endsection
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
        
        // MOCKUP DATA: Array 40 buku untuk simulasi sorting & pagination dinamis
        semuaBuku: Array.from({ length: 40 }, (_, i) => ({
            id: i + 1,
            judul: [
                'Algorithms and Data Structures', 
                'Clean Code', 
                'Design Patterns', 
                'The Pragmatic Programmer'
            ][i % 4] + ' (Vol. ' + (i + 1) + ')',
            penulis: [
                'Thomas H. Cormen', 
                'Robert C. Martin', 
                'Erich Gamma', 
                'Andrew Hunt'
            ][i % 4],
            isbn: '978-026203' + (3848 + i),
            subjek: ['Algoritma', 'Rekayasa Perangkat Lunak', 'Object-Oriented Design', 'Praktik Pemrograman'][i % 4],
            penerbit: ['MIT Press', 'Prentice Hall', 'Addison-Wesley', 'Pragmatic Bookshelf'][i % 4],
            tahun: 2000 + (i * 2) % 27, 
            tersedia: (i % 3) + 1
        })),

        // Helper hitung total halaman berdasarkan data yang sudah difilter
        get totalHalaman() {
            let dataDifilter = this.semuaBuku.filter(buku => {
                if (this.filterAlfabet === 'SEMUA') return true;
                return buku.judul.toUpperCase().startsWith(this.filterAlfabet);
            });
            return Math.ceil(dataDifilter.length / this.jumlahPerHalaman) || 1;
        },

        // Helper fungsi filter, sorting & pagination slice
        get bukuTampil() {
            let produkDisortir = this.semuaBuku.filter(buku => {
                if (this.filterAlfabet === 'SEMUA') return true;
                return buku.judul.toUpperCase().startsWith(this.filterAlfabet);
            });

            if (this.urutBerdasarkan === 'az') {
                produkDisortir.sort((a, b) => a.judul.localeCompare(b.judul));
            } else if (this.urutBerdasarkan === 'terbaru') {
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

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 max-w-7xl mx-auto mt-6">

        <div class="lg:col-span-3 space-y-4">

            <div x-show="bukuTampil.length === 0" class="bg-white border border-slate-200 rounded-2xl p-12 text-center text-slate-500 shadow-sm font-medium">
                📭 Tidak ada koleksi buku yang berawalan huruf "<span class="font-bold text-blue-600" x-text="filterAlfabet"></span>".
            </div>

            <template x-for="(buku, index) in bukuTampil" :key="buku.id">
                <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm flex flex-col sm:flex-row gap-6 relative overflow-hidden transition-all duration-300">
                    
                    <div x-show="bukuTerbuka === buku.id" x-collapse.duration.200ms class="absolute right-0 top-0 bg-[#00b26a] text-white text-[10px] font-bold px-3 py-1 uppercase tracking-wider rounded-bl-xl shadow-sm">
                        Tersedia Untuk Dipinjam
                    </div>

                    <div class="text-xl font-extrabold text-slate-300 w-6 select-none" 
                         x-text="((halamanSekarang - 1) * jumlahPerHalaman) + index + 1"></div>
                    
                    <div class="w-full sm:w-32 flex flex-col gap-2">
                        <div @click="bukuTerbuka = (bukuTerbuka === buku.id ? null : buku.id)" 
                             class="w-full h-40 bg-slate-100 border border-slate-200 rounded-xl flex flex-col items-center justify-center text-center cursor-pointer hover:bg-slate-200 transition shadow-inner select-none p-3 gap-1">
                            <svg class="w-8 h-8 text-slate-400 mb-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                            </svg>
                            <div class="text-[11px] font-black tracking-wide uppercase select-none">
                                <span class="text-slate-500">Poli</span><span class="text-slate-400">brary</span>
                            </div>
                        </div>
                        
                        <div x-show="bukuTerbuka === buku.id" x-collapse class="text-center space-y-2 pt-1">
                            <p class="text-xs font-bold text-emerald-600">Tersedia <span x-text="buku.tersedia"></span></p>
                            <button @click="alert(buku.judul + ' ditandai!')" class="w-full bg-slate-50 hover:bg-slate-100 text-slate-600 py-1.5 text-xs font-bold rounded-lg border border-slate-200 transition flex items-center justify-center gap-1 shadow-sm">
                                <svg class="w-3 h-3 text-slate-500" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path></svg>
                                Tandai
                            </button>
                        </div>
                    </div>

                    <div class="flex-1">
                        <div class="flex justify-between items-start">
                            <div>
                                <span x-show="bukuTerbuka !== buku.id" class="text-[10px] font-bold text-blue-600 bg-blue-50 px-2 py-0.5 rounded uppercase tracking-wider mb-1.5 inline-block" x-text="buku.subjek"></span>
                                <h3 @click="bukuTerbuka = (bukuTerbuka === buku.id ? null : buku.id)" class="text-xl font-bold text-slate-800 leading-tight hover:text-blue-600 cursor-pointer transition select-none" x-text="buku.judul"></h3>
                                <p x-show="bukuTerbuka !== buku.id" class="text-xs text-slate-500 mt-1 font-medium" x-text="buku.penulis"></p>
                            </div>

                            <button @click="bukuTerbuka = (bukuTerbuka === buku.id ? null : buku.id)" class="bg-slate-50 hover:bg-slate-100 rounded-full w-7 h-7 flex items-center justify-center text-slate-500 hover:text-slate-800 font-bold transition shadow-sm border border-slate-200 flex-shrink-0">
                                <span class="text-xs" x-text="bukuTerbuka === buku.id ? '−' : '▲'"></span>
                            </button>
                        </div>
                        
                        <div x-show="bukuTerbuka !== buku.id" class="flex items-center gap-4 mt-3">
                            <span class="text-xs font-bold text-emerald-600">Tersedia <span x-text="buku.tersedia"></span></span>
                            <button @click="alert(buku.judul + ' ditandai!')" class="bg-slate-50 hover:bg-slate-100 text-slate-600 px-4 py-1.5 text-xs font-bold rounded-lg border border-slate-200 transition flex items-center gap-1 shadow-sm">
                                <svg class="w-3 h-3 text-slate-500" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path></svg>
                                Tandai
                            </button>
                        </div>
                        
                        <div x-show="bukuTerbuka === buku.id" x-collapse class="mt-4 pt-2">
                            <table class="w-full text-xs text-slate-600">
                                <tbody>
                                    <tr class="border-b border-slate-100">
                                        <td class="py-2.5 font-bold text-slate-400 w-32 uppercase tracking-wider">ISBN</td>
                                        <td class="py-2.5 text-slate-800 font-mono font-semibold" x-text="buku.isbn"></td>
                                    </tr>
                                    <tr class="border-b border-slate-100">
                                        <td class="py-2.5 font-bold text-slate-400 uppercase tracking-wider">Subjek Kategori</td>
                                        <td class="py-2.5 text-slate-800 font-semibold text-blue-700" x-text="buku.subjek"></td>
                                    </tr>
                                    <tr class="border-b border-slate-100">
                                        <td class="py-2.5 font-bold text-slate-400 uppercase tracking-wider">Penerbit</td>
                                        <td class="py-2.5 text-slate-800 font-medium" x-text="buku.penerbit"></td>
                                    </tr>
                                    <tr class="border-b border-slate-100">
                                        <td class="py-2.5 font-bold text-slate-400 uppercase tracking-wider">Tahun Terbit</td>
                                        <td class="py-2.5 text-slate-800" x-text="buku.tahun"></td>
                                    </tr>
                                    <tr>
                                        <td class="py-2.5 font-bold text-slate-400 uppercase tracking-wider">Penulis</td>
                                        <td class="py-2.5 text-slate-800 font-medium leading-relaxed" x-text="buku.penulis"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div> </div> </template>

            <div class="mt-6 text-right border-t border-slate-200 pt-4" x-show="bukuTampil.length > 0">
                <button @click="if(halamanSekarang < totalHalaman) { halamanSekarang++; bukuTerbuka = null; }"
                        :disabled="halamanSekarang === totalHalaman"
                        :class="halamanSekarang === totalHalaman ? 'opacity-50 cursor-not-allowed' : 'hover:opacity-90'"
                        class="bg-gradient-to-r from-[#0f4c81] to-[#1d3557] text-white px-5 py-2 text-sm font-bold rounded-xl shadow-md transition">
                    Halaman Berikutnya →
                </button>
            </div>
        </div> <div class="space-y-4">
            <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm">
                <h4 class="font-bold text-sm text-slate-800 mb-4 border-b border-slate-100 pb-2.5 flex items-center gap-2">
                    📁 Kategori Subjek
                </h4>
                @php
                    $subjekSidebar = [
                        ["nama" => "Fiksi", "jumlah" => 12],
                        ["nama" => "Non-Fiksi", "jumlah" => 8],
                        ["nama" => "Pendidikan", "jumlah" => 15],
                        ["nama" => "Ilmu Pengetahuan", "jumlah" => 20],
                        ["nama" => "Teknologi & Komputer", "jumlah" => 9],
                        ["nama" => "Sosial & Humaniora", "jumlah" => 11],
                    ];
                @endphp
                <ul class="space-y-1.5 text-xs font-medium text-slate-600">
                    @foreach($subjekSidebar as $s)
                        <li @click="alert('Memfilter Kategori: {{ $s['nama'] }}')" class="flex justify-between items-center px-3 py-2 rounded-lg hover:bg-sky-50 hover:text-blue-700 cursor-pointer transition duration-150 group">
                            <span class="flex items-center gap-2">
                                <span class="w-1.5 h-1.5 rounded-full bg-slate-300 group-hover:bg-blue-500 transition-colors"></span>
                                {{ $s['nama'] }}
                            </span>
                            <span class="bg-slate-100 text-slate-500 font-bold px-1.5 py-0.5 rounded group-hover:bg-blue-100 group-hover:text-blue-700">{{ $s['jumlah'] }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div> </div> </div> @endsection
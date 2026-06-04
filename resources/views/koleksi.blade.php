@extends('layouts.app')

@section('content')
<div class="p-8 space-y-6 bg-slate-50 min-h-screen" 
     x-data="{ aktifSub: 'Fiksi', aktifSubCat: null }">

    <div class="text-center max-w-4xl mx-auto">
        <h2 class="text-3xl font-extrabold text-slate-800 tracking-tight">Koleksi Buku</h2>
        <p class="text-slate-500 text-sm mt-1">Jelajahi berbagai pustaka dan literatur digital pendukung akademik Anda.</p>

        <div class="bg-white border border-slate-200 rounded-xl mt-6 shadow-sm overflow-hidden">
            <div class="flex justify-center text-sm font-medium">
                <a href="{{ route('koleksi.index') }}" 
                   class="w-1/2 py-3 hover:bg-slate-50 text-slate-500 font-semibold text-center border-b-2 border-transparent hover:border-blue-600 transition select-none">
                    🔤 Daftar A - Z
                </a>
                <span class="w-1/2 py-3 bg-gradient-to-r from-sky-50 to-blue-50 text-blue-700 font-semibold text-center border-b-2 border-blue-600">
                    📂 Daftar berdasarkan Subjek
                </span>
            </div>
        </div>
    </div>

    @php
        $subjek = [
            ["nama" => "Fiksi", "jumlah" => 12],
            ["nama" => "Non-Fiksi", "jumlah" => 8],
            ["nama" => "Pendidikan", "jumlah" => 15],
            ["nama" => "Ilmu Pengetahuan", "jumlah" => 20],
            ["nama" => "Teknologi & Komputer", "jumlah" => 9],
            ["nama" => "Sosial & Humaniora", "jumlah" => 11],
            ["nama" => "Bahasa", "jumlah" => 7],
            ["nama" => "Seni & Budaya", "jumlah" => 6],
            ["nama" => "Agama", "jumlah" => 10],
            ["nama" => "Referensi", "jumlah" => 5],
        ];
    @endphp

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5 mt-8 max-w-7xl mx-auto">
        @foreach ($subjek as $item)
            <div @click="aktifSub = '{{ $item['nama'] }}'; aktifSubCat = null"
                 class="flex items-center gap-4 px-5 py-4 rounded-xl shadow-sm border cursor-pointer transition-all duration-200 group"
                 :class="aktifSub === '{{ $item['nama'] }}' 
                    ? 'bg-gradient-to-r from-sky-600 to-blue-600 text-white border-blue-600 shadow-blue-100' 
                    : 'bg-white border-slate-200 text-slate-700 hover:border-blue-300 hover:bg-sky-50/40'">
                
                <div class="flex items-center justify-center w-10 h-10 text-sm font-bold rounded-lg transition-colors"
                     :class="aktifSub === '{{ $item['nama'] }}' ? 'bg-white/20 text-white' : 'bg-slate-100 text-slate-800 group-hover:bg-blue-100 group-hover:text-blue-700'">
                    {{ $item['jumlah'] }}
                </div>
                <span class="text-sm font-semibold tracking-wide flex-1">{{ $item['nama'] }}</span>
            </div>
        @endforeach
    </div>

    <div class="bg-white border border-slate-200 rounded-2xl p-6 md:p-8 shadow-sm max-w-7xl mx-auto mt-8">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-2 border-b border-slate-100 pb-4">
            <h3 class="font-bold text-xl text-slate-800 flex items-center gap-2">
                📁 Kategori: <span x-text="aktifSub"></span>
            </h3>
        </div>

        @php
            $subkategori = [
                ["nama" => "Novel", "jumlah" => 5],
                ["nama" => "Cerpen", "jumlah" => 3],
                ["nama" => "Drama", "jumlah" => 2],
                ["nama" => "Puisi", "jumlah" => 2],
            ];
        @endphp

        <div class="flex flex-wrap gap-2 mt-6 text-xs">
            @foreach ($subkategori as $sub)
                <span @click="aktifSubCat = '{{ $sub['nama'] }}'"
                      class="px-4 py-2.5 rounded-full font-medium transition cursor-pointer shadow-sm border"
                      :class="aktifSubCat === '{{ $sub['nama'] }}' 
                        ? 'bg-blue-600 text-white border-blue-600 font-semibold' 
                        : 'bg-slate-50 border-slate-200 text-slate-600 hover:bg-slate-100 hover:text-slate-900'">
                    📚 {{ $sub['nama'] }} <span class="ml-1" :class="aktifSubCat === '{{ $sub['nama'] }}' ? 'text-blue-200' : 'text-slate-400'">({{ $sub['jumlah'] }})</span>
                </span>
            @endforeach
        </div>

        <div x-show="aktifSubCat !== null" 
             x-transition 
             class="bg-slate-50 border border-slate-200 rounded-xl p-5 mt-6 relative overflow-hidden">
            
            <div class="flex justify-between items-center border-b border-slate-200/60 pb-3">
                <h4 class="font-bold text-sm text-slate-800 flex items-center gap-1.5">
                    📖 Genre: <span class="text-blue-600 font-semibold" x-text="aktifSubCat"></span>
                </h4>
            </div>

            <ul class="mt-4 text-sm text-slate-700 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3">
                <li class="flex items-center gap-2 bg-white px-3 py-2 rounded-lg border border-slate-100 shadow-sm hover:border-sky-300 transition">
                    <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span>
                    <span class="font-medium flex-1">Contoh Judul Buku</span>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-[#F8FAFC] flex flex-col font-['Poppins'] overflow-x-hidden">

<section class="bg-gradient-to-r from-sky-100 to-blue-100 border-b border-sky-200">
    <div class="max-w-7xl mx-auto px-8 py-6">
        <div class="flex flex-col items-center text-center">
            <h1 class="text-4xl font-light tracking-wide mb-2 text-slate-800">
                Selamat Datang,
                <span class="font-semibold text-sky-900">
                    {{ Auth::user()->name }}
                </span>
            </h1>
            <p class="mt-2 text-slate-600 max-w-xl text-sm leading-relaxed">
                Kelola layanan perpustakaan, pantau peminjaman, pengembalian, dan aktivitas anggota melalui sistem PoliBrary.
            </p>
        </div>
    </div>
</section>


<main class="max-w-7xl mx-auto px-6 py-12 w-full">

<div class="grid grid-cols-12 gap-8 items-stretch">


<!-- CARD KIRI : RINGKASAN -->
<div class="col-span-12 lg:col-span-6">

<div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 h-full">

<div class="mb-6">
    <span class="px-4 py-2 rounded-full text-xs font-semibold bg-[#C8A951]/10 text-[#A27D20] border border-[#C8A951]/30">
R I N G K A S A N
</span>

    <h2 class="text-xl font-semibold text-[#0F3D5E] mt-2">
        Aktivitas Hari Ini
    </h2>

    <p class="text-sm text-slate-500 mt-1">
        Pantau aktivitas layanan perpustakaan secara real-time.
    </p>
</div>


<div class="space-y-4">

<!-- Buku Dipinjam -->
<div class="flex justify-between items-center bg-blue-50 border border-blue-100 rounded-xl px-4 py-4">

    <div class="flex items-center gap-3">

        <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center">

            <svg class="w-5 h-5 text-[#1D5D8F]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                d="M4 19.5A2.5 2.5 0 016.5 17H20V6a2 2 0 00-2-2H6.5A2.5 2.5 0 004 6.5v13z"/>
            </svg>

        </div>

        <span class="text-sm font-medium text-slate-700">
            Buku Dipinjam
        </span>

    </div>

    <span class="text-2xl font-bold text-[#0F3D5E]">
        {{ $data['buku_terpinjam'] }}
    </span>

</div>


<!-- Buku Terlambat -->
<div class="flex justify-between items-center bg-red-50 border border-red-100 rounded-xl px-4 py-4">

    <div class="flex items-center gap-3">

        <div class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center">

            <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>

        </div>

        <span class="text-sm font-medium text-slate-700">
            Buku Terlambat
        </span>

    </div>

    <span class="text-2xl font-bold text-red-600">
        {{ $data['buku_terlambat'] }}
    </span>

</div>


<!-- Menunggu Peminjaman -->
<div class="flex justify-between items-center bg-amber-50 border border-amber-100 rounded-xl px-4 py-4">

    <div class="flex items-center gap-3">

        <div class="w-10 h-10 rounded-full bg-amber-100 flex items-center justify-center">

            <svg class="w-5 h-5 text-[#C8A951]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a3 3 0 006 0"/>
            </svg>

        </div>

        <span class="text-sm font-medium text-slate-700">
            Menunggu Peminjaman
        </span>

    </div>

    <span class="text-2xl font-bold text-[#0F3D5E]">
        {{ $data['menunggu_persetujuan'] }}
    </span>

</div>


<!-- Menunggu Pengembalian -->
<div class="flex justify-between items-center bg-indigo-50 border border-indigo-100 rounded-xl px-4 py-4">

    <div class="flex items-center gap-3">

        <div class="w-10 h-10 rounded-full bg-indigo-100 flex items-center justify-center">

            <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                d="M4 4v6h6M20 20v-6h-6M5 10a7 7 0 0112-4l3 4M19 14a7 7 0 01-12 4l-3-4"/>
            </svg>

        </div>

        <span class="text-sm font-medium text-slate-700">
            Menunggu Pengembalian
        </span>

    </div>

    <span class="text-2xl font-bold text-[#0F3D5E]">
        {{ $data['konfirmasi_pengembalian'] }}
    </span>

</div>


<!-- Menunggu Perpanjangan -->
<div class="flex justify-between items-center bg-blue-50 border border-blue-100 rounded-xl px-4 py-4">

    <div class="flex items-center gap-3">

        <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center">

            <svg class="w-5 h-5 text-[#1D5D8F]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                d="M8 7V3m8 4V3M5 11h14M5 21h14a2 2 0 002-2V7H3v12a2 2 0 002 2z"/>
            </svg>

        </div>

        <span class="text-sm font-medium text-slate-700">
            Menunggu Perpanjangan
        </span>

    </div>

    <span class="text-2xl font-bold text-[#0F3D5E]">
        {{ $data['menunggu_perpanjangan'] }}
    </span>

</div>


<!-- Total Denda -->
<div class="flex justify-between items-center bg-emerald-50 border border-emerald-100 rounded-xl px-4 py-4">

    <div class="flex items-center gap-3">

        <div class="w-10 h-10 rounded-full bg-emerald-100 flex items-center justify-center">

            <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                d="M12 8c-2 0-3 1-3 2s1 2 3 2 3 1 3 2-1 2-3 2m0-10v1m0 11v1"/>
            </svg>

        </div>

        <span class="text-sm font-medium text-slate-700">
            Total Denda Bulan Ini
        </span>

    </div>

    <span class="text-lg font-bold text-emerald-600">
        Rp {{ number_format($data['total_denda_bulan_ini'],0,',','.') }}
    </span>

</div>

</div>
</div>

</div>



<!-- CARD KANAN : ANALITIK -->

<div class="col-span-12 lg:col-span-6">

<div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-8 h-full">


<div class="flex justify-between items-start mb-8">

<div>

<span class="px-4 py-2 rounded-full text-xs font-semibold bg-[#C8A951]/10 text-[#A27D20] border border-[#C8A951]/30">
A N A L I T I K
</span>

<h2 class="text-2xl font-semibold text-[#0F3D5E] mt-2">
Peminjaman Berdasarkan Kategori
</h2>

<p class="text-sm text-slate-500 mt-1">
Kategori buku yang paling banyak diminati anggota.
</p>
</div>




</div>


<div class="h-96 flex justify-center items-center">

@if($data['kategori_populer']->count() > 0)

    <canvas id="kategoriChart"></canvas>

@else

    <div class="text-center">

        <svg class="w-14 h-14 mx-auto text-slate-300 mb-3" 
             fill="none" 
             stroke="currentColor" 
             viewBox="0 0 24 24">

            <path stroke-width="1.5" 
                  stroke-linecap="round" 
                  stroke-linejoin="round"
                  d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5S19.832 5.477 21 6.253v13C19.832 18.477 18.246 18 16.5 18s-3.332.477-4.5 1.253"/>
        </svg>


        <p class="text-sm font-medium text-slate-500">
            Belum Ada Data Peminjaman
        </p>

        <p class="text-xs text-slate-400 mt-1">
            Statistik kategori akan muncul setelah anggota melakukan peminjaman.
        </p>

    </div>

@endif

</div>


</div>

</div>


</div>

</main>

</div>



<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const kategoriChart = document.getElementById('kategoriChart');

new Chart(kategoriChart,{
    type:'pie',

    data:{
        labels:[
            @foreach($data['kategori_populer'] as $kategori)
            "{{ $kategori->kategori }}",
            @endforeach
        ],

        datasets:[{

            data:[
                @foreach($data['kategori_populer'] as $kategori)
                {{ $kategori->total }},
                @endforeach
            ],

            backgroundColor:[
                '#0F3D5E',
                '#1D5D8F',
                '#C8A951',
                '#4B7BAA',
                '#8FAFC8',
                '#D9C48A'
            ],

            borderWidth:2,
            borderColor:'#ffffff'

        }]
    },

    options:{
        responsive:true,
        maintainAspectRatio:false,

        plugins:{
            legend:{
                position:'bottom',

                labels:{
                    padding:20,

                    font:{
                        family:"'Poppins',sans-serif",
                        size:12
                    },

                    color:'#475569'
                }
            }
        }
    }
});

</script>


@endsection
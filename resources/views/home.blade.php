@extends('layouts.home')

@section('content')

<!-- ================= HERO ================= -->
<script src="https://unpkg.com/lucide@latest"></script>
<section class="relative">

    <!-- Background -->
    <div class="relative h-[520px] overflow-hidden">

        <img
    src="{{ asset('image/library-bg.png') }}"
    alt="PoliBrary"
    class="hero-bg absolute inset-0 w-full h-full object-cover">

        <!-- Overlay -->
        <div class="absolute inset-0 bg-black/35"></div>

        <!-- Content -->
        <div class="relative z-20 flex items-center justify-center h-full">

            <div class="w-full max-w-5xl px-6 text-center">

                <h1 class="text-5xl font-bold leading-tight"
style="font-family: 'Audiowide', sans-serif; letter-spacing: 1px;">

    <span class="text-slate-900 drop-shadow-[0_2px_4px_rgba(255,255,255,0.8)]">P</span><span class="text-orange-500 drop-shadow-[0_2px_4px_rgba(255,255,255,0.8)]">o</span><span class="text-slate-900 drop-shadow-[0_2px_4px_rgba(255,255,255,0.8)]">li</span><span class="text-sky-400 drop-shadow-[0_2px_4px_rgba(255,255,255,0.8)]">Brary</span>

</h1>


<p class="mt-5 text-lg text-white font-medium leading-relaxed 
max-w-3xl mx-auto 
drop-shadow-[0_3px_6px_rgba(0,0,0,0.85)]">

    Platform perpustakaan digital Politeknik Negeri Batam
    untuk mengakses koleksi buku, jurnal, dan sumber pembelajaran
    secara mudah, cepat, dan terintegrasi.

</p>   

                <!-- Search -->

                <div class="mt-12">

    <form action="{{ route('koleksi.abc') }}" method="GET">

        <div class="flex bg-white/80 backdrop-blur-md 
                    rounded-full shadow-2xl overflow-hidden
                    border border-white/30">

            <input
                type="text"
                name="search"
                placeholder="Cari judul buku, penulis, ISBN..."
                class="flex-1 h-16 px-8 outline-none 
                       bg-transparent 
                       text-slate-700 text-lg
                       placeholder:text-slate-400">

            <button
                type="submit"
                class="w-24 bg-sky-600/90 
                       hover:bg-sky-700 
                       text-white transition">

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-7 h-7 mx-auto"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M21 21l-5.2-5.2m2.2-5.3a7.5 7.5 0 11-15 0 7.5 7.5 0 0115 0z"/>

                </svg>

            </button>

        </div>

    </form>

</div>

            </div>

        </div>

    </div>

</section>

<!-- ================= QUICK MENU ================= -->

<section class="bg-white border-b border-slate-200">

<div class="max-w-6xl mx-auto px-6">


<div class="grid grid-cols-2 md:grid-cols-4 gap-6 py-5">


<!-- Anggota -->

<button 
onclick="toggleQuickMenu('anggota', this)"
class="quick-item group relative flex flex-col items-center text-center pb-3">

<div class="icon-box">
<svg xmlns="http://www.w3.org/2000/svg"
class="w-10 h-10 transition"
fill="none"
viewBox="0 0 24 24"
stroke="currentColor"
stroke-width="1.5">

<path stroke-linecap="round"
stroke-linejoin="round"
d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>

</svg>
</div>


<span class="text-xs mt-3 text-slate-600">
Anggota
</span>


<!-- ACTIVE ARROW -->

<span class="arrow hidden absolute bottom-0"></span>

</button>





<!-- Kategori -->

<button 
onclick="toggleQuickMenu('kategori', this)"
class="quick-item group relative flex flex-col items-center text-center pb-3">


<svg xmlns="http://www.w3.org/2000/svg"
class="w-10 h-10 transition"
fill="none"
viewBox="0 0 24 24"
stroke="currentColor"
stroke-width="1.5">

<path stroke-linecap="round"
stroke-linejoin="round"
d="M4 6h16M4 12h16M4 18h16"/>

</svg>


<span class="text-xs mt-3 text-slate-600">
Kategori
</span>


<span class="arrow hidden absolute bottom-0"></span>

</button>





<!-- Jam -->

<button 
onclick="toggleQuickMenu('jam', this)"
class="quick-item group relative flex flex-col items-center text-center pb-3">


<svg xmlns="http://www.w3.org/2000/svg"
class="w-10 h-10 transition"
fill="none"
viewBox="0 0 24 24"
stroke="currentColor"
stroke-width="1.5">

<path stroke-linecap="round"
stroke-linejoin="round"
d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>

</svg>


<span class="text-xs mt-3 text-slate-600">
Jam Operasional
</span>


<span class="arrow hidden absolute bottom-0"></span>

</button>





<!-- Kontak -->

<button 
onclick="toggleQuickMenu('kontak', this)"
class="quick-item group relative flex flex-col items-center text-center pb-3">


<svg xmlns="http://www.w3.org/2000/svg"
class="w-10 h-10 transition"
fill="none"
viewBox="0 0 24 24"
stroke="currentColor"
stroke-width="1.5">

<path stroke-linecap="round"
stroke-linejoin="round"
d="M3 5a2 2 0 012-2h3l2 5-2 1.5a11 11 0 005 5L14.5 12l5 2v3a2 2 0 01-2 2h-1C8.7 19 5 15.3 5 10V9a4 4 0 01-2-4z"/>

</svg>


<span class="text-xs mt-3 text-slate-600">
Kontak
</span>


<span class="arrow hidden absolute bottom-0"></span>

</button>



</div>



<!-- PANEL -->

<div id="quickPanel"
class="hidden transition-all duration-300">

<div class="bg-sky-600 text-white p-6 max-h-96 overflow-y-auto">

<div id="quickContent"></div>

</div>

</div>


</div>

</section>

<!-- ================= NOTICE & STATISTIC ================= -->

<section id="pengumuman" class="py-14 bg-slate-50">

<div class="max-w-7xl mx-auto px-6">

<div class="grid lg:grid-cols-3 gap-8">


<!-- ================= PENGUMUMAN ================= -->

<div class="lg:col-span-2 bg-white rounded-3xl border border-slate-200 shadow-sm p-8">


<div class="flex items-center justify-between mb-6">

<div>

<h2 class="text-2xl font-semibold text-slate-800">
Pengumuman
</h2>

<p class="text-sm text-slate-500 mt-1">
Informasi terbaru dari perpustakaan
</p>

</div>


<a href="#"
class="text-sm text-sky-600 hover:text-sky-700">
Lihat semua
</a>

</div>



<div class="space-y-4">



<!-- PENGUMUMAN PENGEMBANGAN -->

<div class="flex gap-4 p-4 rounded-2xl bg-sky-50 border border-sky-100">


<div class="w-12 h-12 rounded-xl bg-sky-600 flex items-center justify-center text-white">


<svg xmlns="http://www.w3.org/2000/svg"
class="w-6 h-6"
fill="none"
viewBox="0 0 24 24"
stroke="currentColor">

<path stroke-linecap="round"
stroke-linejoin="round"
stroke-width="2"
d="M13 16h-1v-4h-1m1-4h.01M12 20a8 8 0 100-16 8 8 0 000 16z"/>

</svg>


</div>



<div>

<h3 class="font-medium text-slate-800">
Fitur Pengumuman Dalam Pengembangan
</h3>


<p class="text-sm text-slate-500 mt-1">
Fitur pengumuman PoliBrary sedang dalam tahap pengembangan 
dan akan tersedia pada pembaruan sistem berikutnya.
</p>


<span class="text-xs text-sky-600">
Dalam Pengembangan
</span>


</div>


</div>





<!-- FITUR DIGITAL -->

<div class="flex gap-4 p-4 rounded-2xl bg-white border border-slate-200">


<div class="w-12 h-12 rounded-xl bg-blue-100 flex items-center justify-center text-blue-600">


<svg xmlns="http://www.w3.org/2000/svg"
class="w-6 h-6"
fill="none"
viewBox="0 0 24 24"
stroke="currentColor">

<path stroke-linecap="round"
stroke-linejoin="round"
stroke-width="2"
d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>

</svg>


</div>



<div>

<h3 class="font-medium text-slate-800">
Pengembangan Layanan Digital
</h3>


<p class="text-sm text-slate-500 mt-1">
PoliBrary sedang mempersiapkan beberapa fitur digital baru 
untuk meningkatkan pengalaman pengguna.
</p>


<span class="text-xs text-sky-600">
Segera Hadir
</span>


</div>


</div>



</div>


</div>



<!-- ================= STATISTIK PERPUSTAKAAN ================= -->

<div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-8">


<h2 class="text-2xl font-semibold text-slate-800 mb-2">
Statistik Perpustakaan
</h2>


<p class="text-sm text-slate-500 mb-6">
Data aktual koleksi dan pengguna PoliBrary
</p>


<div class="space-y-4">


<div class="p-5 rounded-2xl bg-sky-50">

<div class="flex justify-between">

<span>
Total Koleksi Buku
</span>

<span class="text-xl font-bold text-sky-600">
{{ number_format($totalBuku) }}
</span>

</div>

</div>



<div class="p-5 rounded-2xl bg-blue-50">

<div class="flex justify-between">

<span>
Anggota Aktif
</span>

<span class="text-xl font-bold text-blue-600">
{{ number_format($anggotaAktif) }}
</span>

</div>

</div>




<div class="p-5 rounded-2xl bg-slate-50">

<div class="flex justify-between items-center">

<span class="text-slate-700">
Jumlah Pengunjung
</span>

<span class="text-xl font-bold text-slate-600">
{{ number_format($jumlahPengunjung) }}
</span>

</div>

</div>


</div>


</div>

</div>
</div>

</section>



<!-- ================= E-BOOK SECTION ================= -->

<section id="ebook" class="py-16 bg-white">

<div class="max-w-7xl mx-auto px-6">


<div class="grid lg:grid-cols-2 gap-10 items-center">



<!-- KIRI -->

<div>


<h2 class="text-3xl font-semibold text-slate-800">
Fitur E-Book Digital
</h2>



<p class="text-slate-500 mt-3 leading-relaxed">

Nikmati kemudahan akses berbagai sumber pembelajaran digital.
Fitur e-book digital PoliBrary sedang dalam tahap pengembangan
dan akan segera hadir untuk mendukung kebutuhan akademik pengguna.

</p>




<div class="mt-8 space-y-4">



<!-- FITUR 1 -->

<div class="flex items-center gap-4">


<div class="w-12 h-12 rounded-xl bg-sky-100 flex items-center justify-center">


<svg xmlns="http://www.w3.org/2000/svg"
class="w-6 h-6 text-sky-600"
fill="none"
viewBox="0 0 24 24"
stroke="currentColor">


<path stroke-linecap="round"
stroke-linejoin="round"
stroke-width="2"
d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253"/>


</svg>


</div>



<div>

<h3 class="font-medium text-slate-800">
Koleksi Digital
</h3>


<p class="text-sm text-slate-500">
Buku dan referensi akademik dalam bentuk digital.
</p>


</div>


</div>






<!-- FITUR 2 -->

<div class="flex items-center gap-4">


<div class="w-12 h-12 rounded-xl bg-blue-100 flex items-center justify-center">


<svg xmlns="http://www.w3.org/2000/svg"
class="w-6 h-6 text-blue-600"
fill="none"
viewBox="0 0 24 24"
stroke="currentColor">


<path stroke-linecap="round"
stroke-linejoin="round"
stroke-width="2"
d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>


</svg>


</div>



<div>

<h3 class="font-medium text-slate-800">
Akses Fleksibel
</h3>


<p class="text-sm text-slate-500">
Membaca kapan saja dan di mana saja.
</p>


</div>


</div>






<!-- FITUR 3 -->

<div class="flex items-center gap-4">


<div class="w-12 h-12 rounded-xl bg-slate-100 flex items-center justify-center">


<svg xmlns="http://www.w3.org/2000/svg"
class="w-6 h-6 text-slate-600"
fill="none"
viewBox="0 0 24 24"
stroke="currentColor">


<path stroke-linecap="round"
stroke-linejoin="round"
stroke-width="2"
d="M9 12h6m-6 4h6m2 4H7a2 2 0 01-2-2V6a2 2 0 012-2h7l5 5v9a2 2 0 01-2 2z"/>


</svg>


</div>




<div>

<h3 class="font-medium text-slate-800">
Segera Hadir
</h3>


<p class="text-sm text-slate-500">
Fitur e-book sedang dipersiapkan untuk pengguna PoliBrary.
</p>


</div>


</div>



</div>




<button
class="inline-flex mt-8 px-6 py-3 rounded-xl bg-slate-300 text-slate-600 text-sm cursor-not-allowed">

Segera Hadir

</button>



</div>





<!-- KANAN -->

<div class="bg-gradient-to-br from-sky-100 to-blue-100 rounded-3xl p-8 flex items-center justify-center">



<div class="w-full max-w-sm bg-white rounded-3xl shadow-sm border border-slate-200 p-6">



<div class="h-56 rounded-2xl bg-slate-100 flex items-center justify-center">


<svg xmlns="http://www.w3.org/2000/svg"
class="w-24 h-24 text-sky-500"
fill="none"
viewBox="0 0 24 24"
stroke="currentColor">


<path stroke-linecap="round"
stroke-linejoin="round"
stroke-width="1.5"
d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253"/>


</svg>


</div>




<div class="mt-5">


<h3 class="text-lg font-semibold text-slate-800">
E-Book Digital PoliBrary
</h3>


<p class="text-sm text-slate-500 mt-2">

Fitur membaca buku digital akan tersedia pada pengembangan berikutnya.

</p>


</div>



</div>



</div>



</div>


</div>


</section>

<!-- ================= BUKU POPULER ================= -->

<section id="populer" class="py-16 bg-slate-50">

<div class="max-w-7xl mx-auto px-6">


<div class="flex justify-between items-center mb-8">

<div>

<h2 class="text-3xl font-semibold text-slate-800">
Buku Populer
</h2>

<p class="text-slate-500 mt-2">
10 buku yang paling banyak dipinjam oleh mahasiswa
</p>

</div>


<a href="{{ route('koleksi.abc') }}"
class="text-sm text-sky-600 hover:text-sky-700">
Lihat Semua
</a>


</div>




<!-- SLIDER -->

<div class="flex gap-6 overflow-x-auto pb-4 scroll-smooth scrollbar-hide">



@foreach($bukuPopuler as $buku)


<div class="min-w-[180px] md:min-w-[210px] bg-white rounded-2xl border border-slate-200 shadow-sm p-4 hover:-translate-y-1 transition">



@if($buku->sampul)


<img
src="{{ asset('storage/'.$buku->sampul) }}"
alt="{{ $buku->judul }}"
class="w-full h-64 object-cover rounded-xl">


@else


<div class="w-full h-64 bg-slate-100 rounded-xl flex items-center justify-center text-slate-400 text-sm">

Tidak ada sampul

</div>


@endif




<h3 class="mt-4 font-semibold text-slate-800 text-sm line-clamp-2">

{{ $buku->judul }}

</h3>



<p class="text-xs text-slate-500 mt-2">

{{ $buku->penulis }}

</p>



<div class="mt-3">

<span class="text-xs bg-sky-100 text-sky-600 px-3 py-1 rounded-full">

{{ $buku->peminjaman_count }} dipinjam

</span>

</div>



</div>


@endforeach



</div>


</div>


</section>



<!-- ================= FOOTER ================= -->

<footer class="bg-slate-900 text-slate-300">

<div class="max-w-7xl mx-auto px-6 py-12">


<div class="grid md:grid-cols-4 gap-10">



<!-- BRAND -->

<div class="md:col-span-2">

<h3 class="text-white text-2xl font-semibold">
PoliBrary
</h3>


<p class="text-sm mt-4 leading-relaxed max-w-md">

Platform perpustakaan digital Politeknik Negeri Batam
yang menyediakan akses koleksi buku, informasi akademik,
dan layanan perpustakaan secara mudah dan efisien.

</p>



<div class="mt-5 flex items-center gap-3 text-sm">


<svg xmlns="http://www.w3.org/2000/svg"
class="w-5 h-5 text-sky-400"
fill="none"
viewBox="0 0 24 24"
stroke="currentColor">

<path stroke-linecap="round"
stroke-linejoin="round"
stroke-width="2"
d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"/>

<path stroke-linecap="round"
stroke-linejoin="round"
stroke-width="2"
d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>

</svg>


<span>
Politeknik Negeri Batam
</span>


</div>


</div>





<!-- MENU -->

<div>


<h3 class="text-white font-semibold mb-5">
Menu
</h3>


<ul class="space-y-3 text-sm">


<li>
<a href="{{ route('koleksi.abc') }}"
class="hover:text-white transition">
Katalog Buku
</a>
</li>


<li>
<a href="#populer"
class="hover:text-white transition">
Buku Populer
</a>
</li>


<li>
<a href="{{ route('faq') }}"
class="hover:text-white transition">
FAQ
</a>
</li>


<li>
<a href="#pengumuman"
class="hover:text-white transition">
Pengumuman
</a>
</li>


</ul>


</div>





<!-- LAYANAN -->

<div>


<h3 class="text-white font-semibold mb-5">
Layanan
</h3>


<ul class="space-y-3 text-sm">


<li class="hover:text-white transition">
Peminjaman Buku
</li>


<li class="hover:text-white transition">
Perpanjangan Peminjaman
</li>


<li class="hover:text-white transition">
Riwayat Peminjaman
</li>


<li class="hover:text-white transition">
Informasi Denda
</li>


</ul>


</div>


</div>





<!-- BOTTOM -->

<div class="border-t border-slate-700 mt-10 pt-6 flex flex-col md:flex-row justify-between items-center gap-3 text-sm">


<p>
© {{ date('Y') }} PoliBrary. All Rights Reserved.
</p>


<p class="text-slate-400">
Designed & Developed by Umiarti Ningsih
</p>


</div>



</div>

</footer>

<style>

.hero-bg{
    animation: zoomBackground 15s ease-in-out infinite alternate;
}


@keyframes zoomBackground{

    from{
        transform:scale(1);
    }

    to{
        transform:scale(1.08);
    }

}


/* quick panel kecil */

#quickPanel > div{

    padding:20px !important;

}


.quick-card{

    background:rgba(255,255,255,.18);
    border-radius:12px;
    padding:10px 14px;
    transition:.3s;

}


.quick-card:hover{

    background:rgba(255,255,255,.30);

}

.scrollbar-hide::-webkit-scrollbar {
    display:none;
}

.scrollbar-hide {
    scrollbar-width:none;
}


</style>

<script>

const dataKategori = @json($kategori);
console.log(dataKategori);
const dataMahasiswa = @json($mahasiswa);
let activeMenu = null;


function toggleQuickMenu(type, button){


    const panel = document.getElementById("quickPanel");
    const content = document.getElementById("quickContent");



    // klik menu yang sama = tutup
    if(activeMenu === type){

        button.classList.remove('active');

        let arrow = button.querySelector('.arrow');

        if(arrow){
            arrow.classList.add('hidden');
        }


        panel.classList.add('hidden');

        content.innerHTML="";

        activeMenu=null;

        return;
    }



    // reset tombol lain
    document.querySelectorAll('.quick-item')
    .forEach(item=>{

        item.classList.remove('active');

        let arrow=item.querySelector('.arrow');

        if(arrow){
            arrow.classList.add('hidden');
        }

    });



    // aktifkan tombol
    button.classList.add('active');


    let arrow=button.querySelector('.arrow');

    if(arrow){
        arrow.classList.remove('hidden');
    }



    activeMenu=type;



    // tampilkan panel
    panel.classList.remove('hidden');



    // ================= ANGGOTA =================

    if(type==="anggota"){


let htmlMahasiswa = "";


dataMahasiswa.forEach(item=>{


htmlMahasiswa += `

<div class="quick-card">

<div class="flex justify-between items-center">

<span class="text-sm">
${item.prodi}
</span>


<span class="text-xs font-semibold">
${item.jumlah} Mahasiswa
</span>


</div>

</div>

`;

});



content.innerHTML = `


<h3 class="text-xl font-semibold mb-4">
Anggota Berdasarkan Prodi
</h3>


<div class="grid grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-3">

${htmlMahasiswa}

</div>


`;

}




    // ================= KATEGORI =================

    else if(type==="kategori"){


    let htmlKategori="";


    dataKategori.forEach(item=>{


        htmlKategori += `

<div class="quick-card">


            <div class="flex justify-between items-center">


                <span class="font-medium">
                    ${item.kategori}
                </span>


                <span class="text-sm font-semibold">
                    ${item.jumlah} Buku
                </span>


            </div>


        </div>


        `;


    });



    content.innerHTML=`

    <h3 class="text-xl font-semibold mb-5">
        Kategori Koleksi
    </h3>


    <div class="grid grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-3">


        ${htmlKategori}


    </div>


    `;


}




    // ================= JAM =================

    else if(type==="jam"){


        content.innerHTML=`

        <h3 class="text-xl font-semibold mb-2">
        Jam Operasional
        </h3>


        <p>
        Senin - Jumat : 08.00 - 16.00
        </p>


        `;


    }




    // ================= KONTAK =================

    else if(type==="kontak"){


content.innerHTML = `

<h3 class="text-xl font-semibold mb-5">
Kontak Perpustakaan
</h3>


<div class="grid grid-cols-2 md:grid-cols-4 gap-3">



<div class="bg-white/20 rounded-lg px-3 py-2">

<div class="flex items-center gap-2 mb-1">

<svg xmlns="http://www.w3.org/2000/svg"
class="w-4 h-4"
fill="none"
viewBox="0 0 24 24"
stroke="currentColor">

<path stroke-linecap="round"
stroke-linejoin="round"
stroke-width="2"
d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"/>

<path stroke-linecap="round"
stroke-linejoin="round"
stroke-width="2"
d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>

</svg>

<span class="font-medium">
Alamat
</span>

</div>

<p class="text-xs">
Jl. Ahmad Yani Batam Kota.<br>
Kota Batam,<br>
Kepulauan Riau,<br>
Indonesia
</p>


</div>



<div class="bg-white/20 rounded-lg px-3 py-2">


<div class="flex items-center gap-2 mb-1">


<svg xmlns="http://www.w3.org/2000/svg"
class="w-4 h-4"
fill="none"
viewBox="0 0 24 24"
stroke="currentColor">

<path stroke-linecap="round"
stroke-linejoin="round"
stroke-width="2"
d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8"/>

</svg>


<span class="font-medium">
Email
</span>


</div>

<p class="text-xs">
info@polibatam.ac.id
</p>


</div>





<div class="bg-white/20 rounded-lg px-3 py-2">

<div class="flex items-center gap-2 mb-1">


<svg xmlns="http://www.w3.org/2000/svg"
class="w-4 h-4"
fill="none"
viewBox="0 0 24 24"
stroke="currentColor">

<path stroke-linecap="round"
stroke-linejoin="round"
stroke-width="2"
d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8"/>

</svg>


<span class="font-medium">
Helpdesk
</span>


</div>


<p class="text-xs">
helpdesk1074@polibatam.ac.id
</p>


</div>





<div class="bg-white/20 rounded-lg px-3 py-2">


<div class="flex items-center gap-2 mb-1">


<svg xmlns="http://www.w3.org/2000/svg"
class="w-4 h-4"
fill="none"
viewBox="0 0 24 24"
stroke="currentColor">

<path stroke-linecap="round"
stroke-linejoin="round"
stroke-width="2"
d="M3 5a2 2 0 012-2h3l2 5-2 1.5a11 11 0 005 5L14.5 12l5 2v3a2 2 0 01-2 2h-1C8.7 19 5 15.3 5 10V9a4 4 0 01-2-4z"/>

</svg>


<span class="font-medium">
Phone
</span>


</div>


<p>+62-778-469858<br>
Ext.1017
</p>


</div>



</div>

`;

}


}


</script>

@endsection
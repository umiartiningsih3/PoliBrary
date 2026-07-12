@extends('layouts.home')

@section('content')


<!-- ================= FAQ HERO ================= -->

<section class="bg-slate-50 py-10">

<div class="max-w-5xl mx-auto px-6 text-center">

<div class="items-center justify-center w-10 h-2 rounded-2xl">


</div>



<h1 class="text-3xl md:text-4xl font-bold text-slate-800">

Pertanyaan Umum

</h1>



<p class="mt-2 text-sm md:text-base text-slate-500">

Temukan jawaban terkait layanan dan fitur PoliBrary

</p>



</div>

</section>

<!-- ================= FAQ CONTENT ================= -->


<section class="py-14 bg-white">


<div class="max-w-5xl mx-auto px-6">


<div class="space-y-4">



<!-- ITEM -->


<div class="faq-item border border-slate-200 rounded-2xl overflow-hidden bg-white transition hover:border-sky-300">


<button onclick="toggleFAQ(this)"
class="w-full flex items-center justify-between p-6 text-left">


<div class="flex items-center gap-5">


<span class="text-2xl font-bold text-sky-200">
01
</span>


<span class="font-semibold text-slate-800">
Bagaimana cara meminjam buku?
</span>


</div>



<svg class="faq-icon w-5 h-5 text-sky-600 transition-transform duration-300"
fill="none"
viewBox="0 0 24 24"
stroke="currentColor">

<path stroke-linecap="round"
stroke-linejoin="round"
stroke-width="2"
d="M12 6v12m6-6H6"/>

</svg>


</button>




<div class="faq-answer max-h-0 overflow-hidden transition-all duration-500">


<div class="px-6 pb-6 ml-12 text-sm text-slate-500 leading-relaxed">

Pengguna harus login sebagai anggota terlebih dahulu.
Kemudian pilih buku yang tersedia dan lakukan proses peminjaman melalui sistem PoliBrary.

</div>


</div>


</div>







<div class="faq-item border border-slate-200 rounded-2xl overflow-hidden bg-white transition hover:border-sky-300">


<button onclick="toggleFAQ(this)"
class="w-full flex items-center justify-between p-6 text-left">


<div class="flex items-center gap-5">


<span class="text-2xl font-bold text-sky-200">
02
</span>


<span class="font-semibold text-slate-800">
Bagaimana cara mencari buku?
</span>


</div>



<svg class="faq-icon w-5 h-5 text-sky-600 transition-transform duration-300"
fill="none"
viewBox="0 0 24 24"
stroke="currentColor">

<path stroke-linecap="round"
stroke-linejoin="round"
stroke-width="2"
d="M12 6v12m6-6H6"/>

</svg>


</button>




<div class="faq-answer max-h-0 overflow-hidden transition-all duration-500">


<div class="px-6 pb-6 ml-12 text-sm text-slate-500 leading-relaxed">

Gunakan fitur pencarian pada halaman utama atau menu katalog.
Pencarian dapat dilakukan berdasarkan judul, penulis, kategori, maupun ISBN.

</div>


</div>


</div>







<div class="faq-item border border-slate-200 rounded-2xl overflow-hidden bg-white transition hover:border-sky-300">


<button onclick="toggleFAQ(this)"
class="w-full flex items-center justify-between p-6 text-left">


<div class="flex items-center gap-5">


<span class="text-2xl font-bold text-sky-200">
03
</span>


<span class="font-semibold text-slate-800">
Apakah peminjaman dapat diperpanjang?
</span>


</div>



<svg class="faq-icon w-5 h-5 text-sky-600 transition-transform duration-300"
fill="none"
viewBox="0 0 24 24"
stroke="currentColor">

<path stroke-linecap="round"
stroke-linejoin="round"
stroke-width="2"
d="M12 6v12m6-6H6"/>

</svg>


</button>




<div class="faq-answer max-h-0 overflow-hidden transition-all duration-500">


<div class="px-6 pb-6 ml-12 text-sm text-slate-500 leading-relaxed">

Anggota dapat mengajukan perpanjangan peminjaman melalui menu
Peminjaman Saya selama memenuhi aturan yang berlaku.

</div>


</div>


</div>








<div class="faq-item border border-slate-200 rounded-2xl overflow-hidden bg-white transition hover:border-sky-300">


<button onclick="toggleFAQ(this)"
class="w-full flex items-center justify-between p-6 text-left">


<div class="flex items-center gap-5">


<span class="text-2xl font-bold text-sky-200">
04
</span>


<span class="font-semibold text-slate-800">
Bagaimana melihat riwayat peminjaman?
</span>


</div>



<svg class="faq-icon w-5 h-5 text-sky-600 transition-transform duration-300"
fill="none"
viewBox="0 0 24 24"
stroke="currentColor">

<path stroke-linecap="round"
stroke-linejoin="round"
stroke-width="2"
d="M12 6v12m6-6H6"/>

</svg>


</button>




<div class="faq-answer max-h-0 overflow-hidden transition-all duration-500">


<div class="px-6 pb-6 ml-12 text-sm text-slate-500 leading-relaxed">

Riwayat peminjaman dapat dilihat melalui menu Peminjaman Saya
setelah pengguna berhasil login.

</div>


</div>


</div>








<div class="faq-item border border-slate-200 rounded-2xl overflow-hidden bg-white transition hover:border-sky-300">


<button onclick="toggleFAQ(this)"
class="w-full flex items-center justify-between p-6 text-left">


<div class="flex items-center gap-5">


<span class="text-2xl font-bold text-sky-200">
05
</span>


<span class="font-semibold text-slate-800">
Bagaimana sistem menghitung denda?
</span>


</div>



<svg class="faq-icon w-5 h-5 text-sky-600 transition-transform duration-300"
fill="none"
viewBox="0 0 24 24"
stroke="currentColor">

<path stroke-linecap="round"
stroke-linejoin="round"
stroke-width="2"
d="M12 6v12m6-6H6"/>

</svg>


</button>




<div class="faq-answer max-h-0 overflow-hidden transition-all duration-500">


<div class="px-6 pb-6 ml-12 text-sm text-slate-500 leading-relaxed">

Sistem akan menghitung denda secara otomatis berdasarkan jumlah hari
keterlambatan pengembalian buku.

</div>


</div>


</div>



<div class="faq-item border border-slate-200 rounded-2xl overflow-hidden bg-white transition hover:border-sky-300">


<button onclick="toggleFAQ(this)"
class="w-full flex items-center justify-between p-6 text-left">


<div class="flex items-center gap-5">


<span class="text-2xl font-bold text-sky-200">
06
</span>


<span class="font-semibold text-slate-800">
Apakah PoliBrary menyediakan e-book?
</span>


</div>



<svg class="faq-icon w-5 h-5 text-sky-600 transition-transform duration-300"
fill="none"
viewBox="0 0 24 24"
stroke="currentColor">

<path stroke-linecap="round"
stroke-linejoin="round"
stroke-width="2"
d="M12 6v12m6-6H6"/>

</svg>


</button>




<div class="faq-answer max-h-0 overflow-hidden transition-all duration-500">


<div class="px-6 pb-6 ml-12 text-sm text-slate-500 leading-relaxed">

Fitur e-book digital sedang dalam tahap pengembangan dan akan tersedia pada pembaruan PoliBrary berikutnya.

</div>


</div>


</div>




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
Digital Library - Politeknik Negeri Batam
</p>


</div>



</div>

</footer>





<script>

function toggleFAQ(button){

let item = button.parentElement;

let answer = item.querySelector('.faq-answer');

let icon = item.querySelector('.faq-icon');



document.querySelectorAll('.faq-item').forEach((faq)=>{

let otherAnswer = faq.querySelector('.faq-answer');

let otherIcon = faq.querySelector('.faq-icon');


if(faq !== item){

otherAnswer.style.maxHeight = null;

otherIcon.classList.remove('rotate-45');

}

});



if(answer.style.maxHeight){

answer.style.maxHeight = null;

icon.classList.remove('rotate-45');

}

else{

answer.style.maxHeight = answer.scrollHeight + "px";

icon.classList.add('rotate-45');

}


}


</script>



@endsection
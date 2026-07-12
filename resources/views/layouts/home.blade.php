<!DOCTYPE html>
<html lang="id">

<head>
<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>
PoliBrary | Digital Library
</title>


<meta name="description"
content="PoliBrary - Sistem Perpustakaan Digital Politeknik Negeri Batam">



<!-- FONT -->

<link rel="preconnect" href="https://fonts.googleapis.com">

<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Audiowide&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
rel="stylesheet">



<!-- TAILWIND -->

@vite('resources/css/app.css')




<style>

html{
    scroll-behavior:smooth;
}


body{
    font-family:'Poppins',sans-serif;
}


</style>


</head>



<body class="bg-slate-50 text-slate-700 antialiased">



@if(!Route::is('login') && !Route::is('register'))



<!-- ================= HEADER ================= -->


<header class="fixed top-0 inset-x-0 z-50 bg-white border-b border-slate-200">



<!-- ================= TOP HEADER ================= -->


<div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">



<!-- LOGO -->

<a href="/"
class="flex items-center gap-3 group">


<img
src="{{ asset('image/Polibrary-logo.png') }}"
alt="PoliBrary"
class="h-12 w-auto transition duration-300 group-hover:scale-105">



<div class="flex flex-col">


<h1 class="text-xl font-bold leading-tight"
style="font-family: 'Audiowide', sans-serif; letter-spacing: 1px;">
<span class="text-slate-900 drop-shadow-lg">P</span><span class="text-orange-500 drop-shadow-lg">o</span><span class="text-slate-900 drop-shadow-lg">li</span><span class="text-sky-400 drop-shadow-lg">Brary</span>
</h1>


<p class="text-[11px] tracking-[2.5px] uppercase text-slate-500">
    Perpustakaan Digital
</p>


</div>


</a>





<!-- RIGHT MENU -->


<div class="hidden lg:flex items-center gap-5 text-xs text-slate-600">



@guest


<a href="{{ route('login') }}"
class="hover:text-sky-600 transition">

MASUK

</a>


@endguest





@auth


<a href="{{ route('dashboard') }}"
class="hover:text-sky-600 transition">

MY SPACE

</a>


@endauth





<span class="text-slate-300">
|
</span>





<button class="hover:text-sky-600">

Cari

</button>





<span class="text-slate-300">
|
</span>





<button class="hover:text-sky-600 relative">


<svg xmlns="http://www.w3.org/2000/svg"
class="w-4 h-4"
fill="none"
viewBox="0 0 24 24"
stroke="currentColor">


<path
stroke-linecap="round"
stroke-linejoin="round"
stroke-width="2"
d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>


</svg>


</button>



</div>





<!-- MOBILE BUTTON -->


<button id="menuButton"
class="lg:hidden">


<svg xmlns="http://www.w3.org/2000/svg"
class="w-7 h-7 text-slate-700"
fill="none"
viewBox="0 0 24 24"
stroke="currentColor">


<path
stroke-linecap="round"
stroke-linejoin="round"
stroke-width="2"
d="M4 6h16M4 12h16M4 18h16"/>


</svg>


</button>




</div>

<!-- ================= MAIN MENU ================= -->


<div class="border-t border-slate-200">


<nav class="hidden lg:flex max-w-5xl mx-auto h-14 items-center justify-between">



<a href="/"
class="text-sm text-slate-700 hover:text-sky-600 transition">

Beranda

</a>



<a href="#koleksi"
class="text-sm text-slate-700 hover:text-sky-600 transition">

Koleksi

</a>



<a href="#layanan"
class="text-sm text-slate-700 hover:text-sky-600 transition">

Layanan

</a>

<a href="#"
class="relative text-sm text-slate-700 hover:text-sky-600 transition">

    Pengumuman

    <span class="absolute -top-3 -right-8 text-[8px] 
                 px-1.5 py-0.5 rounded-full 
                 bg-sky-100 text-sky-600 
                 whitespace-nowrap">
        Pengembangan
    </span>

</a>



<a href="#"
class="relative text-sm text-slate-700 hover:text-sky-600 transition">

    E-Book

    <span class="absolute -top-3 -right-5 text-[8px] 
                 px-1.5 py-0.5 rounded-full 
                 bg-slate-100 text-slate-500 
                 whitespace-nowrap">
        Segera Hadir
    </span>

</a>




<a href="{{ route('faq') }}"
class="text-sm text-slate-700 hover:text-sky-600 transition">

FAQ

</a>



</nav>


</div>





<!-- ================= MOBILE MENU ================= -->


<div id="mobileMenu"
class="hidden lg:hidden border-t border-slate-200 bg-white">



<div class="px-6 py-6 space-y-5">



<a href="/"
class="block text-slate-700 hover:text-sky-600">

Beranda

</a>




<a href="#koleksi"
class="block text-slate-700 hover:text-sky-600">

Koleksi

</a>




<a href="#layanan"
class="block text-slate-700 hover:text-sky-600">

Layanan

</a>




<a href="#pengumuman"
class="block text-slate-700 hover:text-sky-600">

Pengumuman

</a>




<a href="#ebook"
class="block text-slate-700 hover:text-sky-600">

E-Book

</a>




<a href="#faq"
class="block text-slate-700 hover:text-sky-600">

FAQ

</a>




<a href="#kontak"
class="block text-slate-700 hover:text-sky-600">

Kontak

</a>




<hr>





@guest


<a href="{{ route('login') }}"
class="block text-center bg-sky-600 text-white rounded-lg py-3">

MASUK

</a>


@endguest






@auth


<a href="{{ route('dashboard') }}"
class="block text-center bg-sky-600 text-white rounded-lg py-3">

Dashboard

</a>


@endauth





</div>


</div>





</header>





<!-- ================= HEADER SPACE ================= -->


<div class="h-28"></div>



@endif

<!-- ================= MAIN ================= -->


<main>

@yield('content')

</main>





<!-- ================= MOBILE MENU SCRIPT ================= -->


<script>


const menuButton = document.getElementById('menuButton');

const mobileMenu = document.getElementById('mobileMenu');



if(menuButton){


    menuButton.addEventListener('click',()=>{


        mobileMenu.classList.toggle('hidden');


    });


}



</script>





</body>

</html>
@extends('layouts.app')

@section('content')

<div class="bg-slate-50 min-h-screen py-10 px-6 font-['Poppins']">

<div class="max-w-7xl mx-auto">


<div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-8">


<div 
x-data="{ 
    bukuTerbuka: null,
    halamanSekarang: 1,
    urutBerdasarkan: 'relevansi',
    jumlahPerHalaman: 10,
    kataKunciKategori: 'judul',
    pencarianTeks: '',
    filterAlfabet: 'SEMUA',

    semuaBuku: {{ json_encode($semuaBuku) }},

    get totalHalaman() {

        let dataDifilter = this.semuaBuku.filter(buku => {

            if(this.filterAlfabet === 'SEMUA') return true;

            return buku.judul
            .toUpperCase()
            .startsWith(this.filterAlfabet);

        });

        return Math.ceil(dataDifilter.length / this.jumlahPerHalaman) || 1;

    },


    get bukuTampil() {

        let data = this.semuaBuku.filter(buku => {

            if(this.filterAlfabet === 'SEMUA') return true;

            return buku.judul
            .toUpperCase()
            .startsWith(this.filterAlfabet);

        });


        if(this.urutBerdasarkan === 'az'){

            data.sort((a,b)=>
                a.judul.localeCompare(b.judul)
            );

        }


        else if(this.urutBerdasarkan === 'terbaru'){

            data.sort((a,b)=>
                b.tahun_terbit - a.tahun_terbit
            );

        }


        else {

            data.sort((a,b)=>
                a.id - b.id
            );

        }


        let start =
        (this.halamanSekarang - 1)
        *
        this.jumlahPerHalaman;


        let end =
        start +
        parseInt(this.jumlahPerHalaman);


        return data.slice(start,end);

    }

}"


x-init="
$watch('jumlahPerHalaman',()=>halamanSekarang=1);
$watch('urutBerdasarkan',()=>halamanSekarang=1);
$watch('filterAlfabet',()=>halamanSekarang=1);
"

>



<!-- HEADER -->

<div class="text-center mb-8">

<h1 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-[#0052cc] to-[#3b82f6]">

Koleksi Buku

</h1>


<p class="text-sm text-slate-500 mt-2">

Temukan berbagai koleksi buku yang tersedia pada sistem PoliBrary.

</p>


</div>





<!-- TAB -->

<div class="border border-slate-200 rounded-2xl overflow-hidden">


<div class="flex text-sm font-semibold">


<span class="w-1/2 py-3 text-center 
bg-gradient-to-r from-blue-50 to-indigo-50 
text-blue-700 
border-b-2 border-blue-600">

Daftar A - Z

</span>



<a href="{{ route('koleksi.subjek') }}"

class="w-1/2 py-3 text-center
text-slate-500
hover:bg-slate-50
transition">

Daftar Berdasarkan Subjek

</a>


</div>


</div>





<!-- SEARCH -->


<div class="mt-6">

<div class="bg-slate-50 border border-slate-200 rounded-2xl p-5 flex flex-wrap items-center justify-center gap-4">


<div class="flex items-center gap-2">


<label class="text-sm font-semibold text-slate-700">

Kata Kunci :

</label>



<select
x-model="kataKunciKategori"

class="border border-slate-200 rounded-lg 
px-3 py-2 text-sm bg-white">

<option value="judul">

Judul Buku

</option>


<option value="isbn">

Nomor ISBN

</option>


<option value="penulis">

Nama Penulis

</option>


</select>


</div>





<div class="flex-1 min-w-[250px]">


<input

type="text"

x-model="pencarianTeks"

placeholder="Masukkan istilah pencarian..."

class="w-full border border-slate-200 
rounded-lg px-4 py-2 text-sm
focus:ring-2 focus:ring-blue-100
outline-none"

>


</div>





<button

@click="alert('Mencari '+kataKunciKategori+': '+pencarianTeks)"

class="bg-[#00b26a]
hover:bg-[#00985a]
text-white
px-6
py-2
rounded-lg
text-sm
font-semibold
transition">

Pencarian

</button>



</div>


</div>

<!-- FILTER ALFABET -->

<div class="bg-slate-50 border border-slate-200 rounded-2xl p-4 mt-6 flex flex-wrap gap-2 justify-center">


<span

@click="filterAlfabet='SEMUA'"

:class="filterAlfabet==='SEMUA'
?'bg-[#0f4c81] text-white'
:'bg-white text-slate-700 border border-slate-200 hover:bg-blue-50'"

class="px-3 py-1.5 rounded-lg text-xs font-bold cursor-pointer transition">

SEMUA

</span>



@foreach(range('A','Z') as $huruf)

<span

@click="filterAlfabet='{{ $huruf }}'"

:class="filterAlfabet==='{{ $huruf }}'
?'bg-[#0f4c81] text-white'
:'bg-white text-slate-700 border border-slate-200 hover:bg-blue-50'"

class="px-3 py-1.5 rounded-lg text-xs font-bold cursor-pointer transition">

{{ $huruf }}

</span>

@endforeach


</div>







<!-- INFO FILTER + SORTING -->

<div class="bg-slate-50 border border-slate-200 rounded-2xl p-4 mt-6 flex items-center justify-between flex-wrap gap-4">


<div class="text-sm font-medium text-slate-600">


Hasil Filter :

<span

class="bg-blue-50 text-blue-700 px-2 py-1 rounded-lg font-bold"

x-text="

(filterAlfabet==='SEMUA'

? semuaBuku.length

: semuaBuku.filter(
b=>b.judul.toUpperCase().startsWith(filterAlfabet)
).length

)+' Buku'

">

</span>


</div>






<div class="flex items-center gap-3">


<!-- PAGINATION -->


<div class="flex items-center bg-white border border-slate-200 rounded-lg">


<button

@click="
if(halamanSekarang>1)
halamanSekarang--
"

class="px-3 py-2 text-slate-600 hover:bg-slate-100 rounded-l-lg">

&laquo;

</button>



<span class="px-3 text-sm text-slate-600">

Halaman

<b 
class="text-blue-600"
x-text="halamanSekarang">
</b>

/

<span x-text="totalHalaman"></span>

</span>




<button

@click="
if(halamanSekarang<totalHalaman)
halamanSekarang++
"

class="px-3 py-2 text-slate-600 hover:bg-slate-100 rounded-r-lg">

&raquo;

</button>


</div>







<!-- SORT -->

<select

x-model="urutBerdasarkan"

class="border border-slate-200 rounded-lg px-3 py-2 text-sm bg-white">


<option value="relevansi">

Relevansi Teratas

</option>


<option value="terbaru">

Rilisan Terbaru

</option>


<option value="az">

Judul A-Z

</option>


</select>






<select

x-model="jumlahPerHalaman"

class="border border-slate-200 rounded-lg px-3 py-2 text-sm bg-white">


<option value="10">

10

</option>


<option value="20">

20

</option>


<option value="50">

50

</option>


</select>



</div>


</div>







<!-- DATA KOSONG -->

<div

x-show="bukuTampil.length===0"

class="bg-white border border-slate-200 rounded-2xl p-12 mt-6 text-center text-slate-500">


Tidak ada koleksi buku.


</div>

<!-- ================= GRID BUKU ================= -->

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-5 mt-6">


<template x-for="(buku,index) in bukuTampil" :key="buku.id">


<div class="
bg-white 
rounded-xl 
border border-slate-200
overflow-hidden
shadow-sm
hover:shadow-lg
hover:-translate-y-1
transition-all
duration-300
flex flex-col
">



<!-- COVER -->

<div class="relative h-56 bg-slate-100">


<img
:src="'{{ asset('storage/') }}/'+buku.sampul"
class="w-full h-full object-cover"
onerror="this.src='{{ asset('image/Polibrary-logo.png') }}'"
>



<!-- KATEGORI -->

<div class="
absolute top-2 left-2
bg-white/90
text-sky-700
text-[10px]
font-semibold
px-2 py-1
rounded-full
">

<span x-text="buku.kategori"></span>

</div>



<template x-if="buku.tersedia <= 0">

<div class="
absolute inset-0
bg-black/40
flex items-center justify-center
">

<span class="
bg-red-600
text-white
px-3 py-1.5
rounded-full
text-xs
font-bold
">

Stok Habis

</span>

</div>

</template>


</div>





<!-- DETAIL -->

<div class="p-4 flex flex-col flex-1">



<h3
class="
font-semibold
text-slate-800
text-sm
leading-snug
line-clamp-2
h-[40px]
overflow-hidden
"
x-text="buku.judul">
</h3>


<p 
class="
text-xs
text-slate-500
mt-1
line-clamp-1
"
x-text="buku.penulis">

</p>


<div class="
mt-2
pt-2
border-t
border-slate-100
space-y-1
text-xs
">


<div class="flex justify-between">

<span class="text-slate-500">
Tahun
</span>


<span class="font-medium text-slate-700"
x-text="buku.tahun_terbit">

</span>


</div>




<div class="flex justify-between">

<span class="text-slate-500">
Stok
</span>


<span class="font-semibold text-emerald-600"
x-text="buku.tersedia">

</span>


</div>


</div>





<!-- BUTTON -->

<div class="mt-4 space-y-2">



<a 
:href="'/koleksi/'+buku.id"
class="
block
text-center
bg-sky-600
hover:bg-sky-700
text-white
py-2
rounded-lg
text-xs
font-semibold
">

Detail Buku

</a>





<div class="grid grid-cols-2 gap-2">



<form method="POST" 
action="{{ route('keranjang.tambah') }}">

@csrf


<input 
type="hidden"
name="buku_id"
:value="buku.id"
>


<button
type="submit"

:disabled="buku.tersedia <= 0"

:class="
buku.tersedia <=0
?
'bg-slate-300'
:
'bg-emerald-600 hover:bg-emerald-700'
"

class="
w-full
text-white
py-2
rounded-lg
text-xs
font-semibold
">

Pinjam

</button>


</form>





<form method="POST"
action="{{ route('disukai.tambah') }}">

@csrf


<input 
type="hidden"
name="buku_id"
:value="buku.id"
>


<button
class="
w-full
bg-rose-500
hover:bg-rose-600
text-white
py-2
rounded-lg
text-xs
font-semibold
">

♡ Sukai

</button>


</form>



</div>


</div>


</div>


</div>


</template>


</div>



<!-- BUTTON HALAMAN BERIKUTNYA -->


<div

x-show="bukuTampil.length > 0"

class="mt-8 border-t border-slate-200 pt-6 flex justify-center">





<button


@click="

if(halamanSekarang < totalHalaman)

halamanSekarang++

"



:disabled="halamanSekarang===totalHalaman"



:class="halamanSekarang===totalHalaman

?'opacity-50 cursor-not-allowed'

:'hover:bg-blue-700'

"



class="bg-[#0f4c81]

text-white

px-8

py-3

rounded-xl

font-semibold

shadow-sm

transition">


Halaman Berikutnya →

</button>




</div>






</div>


</div>


</div>


@endsection
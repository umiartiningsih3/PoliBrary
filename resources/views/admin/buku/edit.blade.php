@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-slate-50 py-10 px-6 font-['Poppins']">

<div class="max-w-5xl mx-auto">


<div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">


<!-- HEADER -->

<div class="px-8 py-7 bg-gradient-to-r from-sky-50 to-white border-b border-slate-200">

<span class="px-4 py-2 rounded-full text-xs font-semibold bg-blue-50 text-blue-700 border border-blue-100">
EDIT KOLEKSI
</span>

<h1 class="text-3xl font-bold text-[#0F3D5E] mt-4">
Edit Koleksi Buku
</h1>

<p class="text-sm text-slate-500 mt-2">
Perbarui informasi buku yang sudah tersedia pada sistem PoliBrary.
</p>

</div>



<div class="p-8">


<form action="{{ route('admin.buku.update',$buku->id) }}" 
method="POST" 
enctype="multipart/form-data">

@csrf
@method('PUT')


<div class="grid grid-cols-1 md:grid-cols-3 gap-8">


<!-- COVER -->

<div class="flex flex-col items-center">


<div class="w-44 h-56 rounded-2xl bg-slate-50 border border-slate-200 overflow-hidden flex items-center justify-center shadow-sm">


@if($buku->sampul)

<img id="previewImage"
src="{{ asset('storage/'.$buku->sampul) }}"
class="w-full h-full object-cover">


@else

<img id="previewImage"
src="{{ asset('image/Polibrary-logo.png') }}"
class="w-16 h-16 opacity-30 grayscale object-contain">

@endif


</div>



<input type="file"
name="sampul"
id="fileInput"
accept="image/*"
onchange="previewCover(event)"
class="hidden">



<label for="fileInput"
class="mt-4 cursor-pointer px-5 py-2.5 rounded-xl bg-sky-100 text-sky-700 font-semibold text-sm hover:bg-sky-200 transition">

Ganti Sampul

</label>


</div>





<!-- FORM -->

<div class="md:col-span-2 space-y-5 bg-slate-50 p-6 rounded-2xl border border-slate-200">


<div class="grid grid-cols-2 gap-5">



<div>

<label class="text-sm font-semibold text-slate-700">
Judul Buku
</label>

<input type="text"
name="judul"
value="{{ old('judul',$buku->judul) }}"
required
class="mt-2 w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-700 shadow-sm focus:border-sky-400 focus:ring-4 focus:ring-sky-100 outline-none transition">

</div>



<div>

<label class="text-sm font-semibold text-slate-700">
ISBN
</label>

<input type="text"
name="isbn"
value="{{ old('isbn',$buku->isbn) }}"
required
class="mt-2 w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-700 shadow-sm focus:border-sky-400 focus:ring-4 focus:ring-sky-100 outline-none transition">

</div>




<div>

<label class="text-sm font-semibold text-slate-700">
Penulis
</label>

<input type="text"
name="penulis"
value="{{ old('penulis',$buku->penulis) }}"
required
class="mt-2 w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-700 shadow-sm focus:border-sky-400 focus:ring-4 focus:ring-sky-100 outline-none transition">

</div>

<div>

<label class="text-sm font-semibold text-slate-700">
Kategori
</label>

<select 
name="kategori"
id="kategori"
required
class="mt-2 w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-700 shadow-sm focus:border-sky-400 focus:ring-4 focus:ring-sky-100 outline-none transition">

<option value="">
Pilih Kategori
</option>

<option value="fiksi" {{ old('kategori',$buku->kategori)=='fiksi'?'selected':'' }}>
Fiksi
</option>

<option value="nonfiksi" {{ old('kategori',$buku->kategori)=='nonfiksi'?'selected':'' }}>
Non-Fiksi
</option>

<option value="pendidikan" {{ old('kategori',$buku->kategori)=='pendidikan'?'selected':'' }}>
Pendidikan
</option>

<option value="teknologi" {{ old('kategori',$buku->kategori)=='teknologi'?'selected':'' }}>
Teknologi & Komputer
</option>

<option value="sosial" {{ old('kategori',$buku->kategori)=='sosial'?'selected':'' }}>
Sosial & Humaniora
</option>

<option value="agama" {{ old('kategori',$buku->kategori)=='agama'?'selected':'' }}>
Agama
</option>

</select>

</div>



<div>

<label class="text-sm font-semibold text-slate-700">
Sub Kategori
</label>

<select 
name="sub_kategori"
id="subkategori"
required
class="mt-2 w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-700 shadow-sm focus:border-sky-400 focus:ring-4 focus:ring-sky-100 outline-none transition">

<option value="{{ $buku->sub_kategori }}">
{{ $buku->sub_kategori ?? 'Pilih Sub Kategori' }}
</option>

</select>

</div>




<div>

<label class="text-sm font-semibold text-slate-700">
Nomor Inventaris
</label>

<input 
type="text"
name="no_inventaris"
value="{{ $buku->no_inventaris }}"
readonly
class="mt-2 w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-blue-700 font-semibold shadow-sm">

</div>



<div>

<label class="text-sm font-semibold text-slate-700">
Nomor Rak Penyimpanan
</label>

<input 
type="text"
name="nomor_rak"
value="{{ old('nomor_rak',$buku->nomor_rak) }}"
placeholder="Contoh: A-01"
class="mt-2 w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-700 shadow-sm focus:border-sky-400 focus:ring-4 focus:ring-sky-100 outline-none transition">

</div>




<div>

<label class="text-sm font-semibold text-slate-700">
Penerbit
</label>

<input 
type="text"
name="penerbit"
value="{{ old('penerbit',$buku->penerbit) }}"
required
class="mt-2 w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-700 shadow-sm focus:border-sky-400 focus:ring-4 focus:ring-sky-100 outline-none transition">

</div>




<div>

<label class="text-sm font-semibold text-slate-700">
Tahun Terbit
</label>

<input 
type="number"
name="tahun_terbit"
value="{{ old('tahun_terbit',$buku->tahun_terbit) }}"
required
class="mt-2 w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-700 shadow-sm focus:border-sky-400 focus:ring-4 focus:ring-sky-100 outline-none transition">

</div>




<div>

<label class="text-sm font-semibold text-slate-700">
Jumlah Eksemplar
</label>

<input 
type="number"
name="jumlah_eksemplar"
value="{{ old('jumlah_eksemplar',$buku->jumlah_eksemplar) }}"
required
class="mt-2 w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-700 shadow-sm focus:border-sky-400 focus:ring-4 focus:ring-sky-100 outline-none transition">

</div>


</div>





<div>

<label class="text-sm font-semibold text-slate-700">
Deskripsi Buku
</label>

<textarea 
name="deskripsi"
rows="4"
class="mt-2 w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-700 shadow-sm focus:border-sky-400 focus:ring-4 focus:ring-sky-100 outline-none transition">{{ old('deskripsi',$buku->deskripsi) }}</textarea>

</div>



</div>


</div>





<div class="mt-8 pt-6 border-t border-slate-200 flex justify-end gap-4">


<a href="{{ route('admin.buku.index') }}"
class="px-6 py-3 rounded-xl border border-slate-300 text-slate-600 hover:bg-slate-100 transition">

Batal

</a>



<button type="submit"
class="px-7 py-3 rounded-xl bg-[#1D5D8F] hover:bg-[#174B73] text-white font-semibold transition">

Simpan Perubahan

</button>


</div>



</form>


</div>


</div>


</div>


</div>


@endsection



@push('scripts')

<script>

function previewCover(event){

const input = event.target;
const preview = document.getElementById('previewImage');

if(input.files && input.files[0]){

const reader = new FileReader();

reader.onload=function(e){

preview.src=e.target.result;

preview.classList.remove(
'w-16',
'h-16',
'opacity-30',
'grayscale'
);

preview.classList.add(
'w-full',
'h-full',
'object-cover'
);

}

reader.readAsDataURL(input.files[0]);

}

}



document.addEventListener("DOMContentLoaded",function(){

const kategori=document.getElementById("kategori");
const subkategori=document.getElementById("subkategori");


const data={

fiksi:["Novel","Cerpen","Fantasi","Romansa","Misteri","Thriller","Horor","Sci-fi"],

nonfiksi:["Biografi","Autobiografi","Sejarah","Motivasi","Esai","Jurnal"],

pendidikan:["Buku Pelajaran","Modul Kuliah","Soal Latihan","Panduan Belajar"],

teknologi:["Pemrograman","Web","Mobile","Database","AI"],

sosial:["Ekonomi","Psikologi","Sosiologi","Hukum"],

agama:["Islam","Kristen","Hindu","Buddha"]

};



kategori.addEventListener("change",function(){

subkategori.innerHTML='<option value="">Pilih Sub Kategori</option>';

if(data[this.value]){

data[this.value].forEach(item=>{

let option=document.createElement("option");

option.value=item;
option.textContent=item;

if(item === "{{ $buku->sub_kategori }}"){
    option.selected=true;
}

subkategori.appendChild(option);

});

}

});

});

</script>

@endpush
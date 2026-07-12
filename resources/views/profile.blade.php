@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-slate-50 py-10 px-6 font-['Poppins']">

<div class="max-w-5xl mx-auto">


<div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">


<!-- HEADER -->

<div class="px-8 py-7 bg-gradient-to-r from-sky-50 to-white border-b border-slate-200">


<span class="px-4 py-2 rounded-full text-xs font-semibold bg-blue-50 text-blue-700 border border-blue-100">
PROFIL PENGGUNA
</span>


<h1 class="text-3xl font-bold text-[#0F3D5E] mt-4">
Akun Saya
</h1>


<p class="text-sm text-slate-500 mt-2">
Kelola informasi profil, keamanan, dan data akun PoliBrary Anda.
</p>


</div>





<div class="p-8">


<form action="{{ route('profile.update') }}" 
method="POST" 
enctype="multipart/form-data">


@csrf
@method('PUT')



<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">



<!-- DATA PROFIL -->


<div class="lg:col-span-2 bg-slate-50 p-6 rounded-2xl border border-slate-200">


<div class="grid grid-cols-1 md:grid-cols-2 gap-5">



<div>

<label class="text-sm font-semibold text-slate-700">
Nama
</label>

<input 
type="text"
name="name"
value="{{ old('name',Auth::user()->name) }}"
class="mt-2 w-full rounded-xl border border-slate-300 bg-white px-4 py-3 focus:border-sky-400 focus:ring-4 focus:ring-sky-100 outline-none transition">

</div>





<div>

<label class="text-sm font-semibold text-slate-700">
Email
</label>

<input 
type="email"
name="email"
value="{{ old('email',Auth::user()->email) }}"
class="mt-2 w-full rounded-xl border border-slate-300 bg-white px-4 py-3 focus:border-sky-400 focus:ring-4 focus:ring-sky-100 outline-none transition">

</div>





<div>

<label class="text-sm font-semibold text-slate-700">
NIM
</label>

<input 
type="text"
value="{{ Auth::user()->nim }}"
disabled
class="mt-2 w-full rounded-xl border border-slate-300 bg-slate-100 px-4 py-3 text-slate-500">

</div>





<div>

<label class="text-sm font-semibold text-slate-700">
Tipe Keanggotaan
</label>

<input 
type="text"
value="{{ Auth::user()->tipe_keanggotaan }}"
disabled
class="mt-2 w-full rounded-xl border border-slate-300 bg-slate-100 px-4 py-3 text-slate-500">

</div>





<div>

<label class="text-sm font-semibold text-slate-700">
Program Studi
</label>

<input 
type="text"
value="{{ Auth::user()->prodi }}"
disabled
class="mt-2 w-full rounded-xl border border-slate-300 bg-slate-100 px-4 py-3 text-slate-500">

</div>





<div>

<label class="text-sm font-semibold text-slate-700">
Nomor Telepon
</label>

<input 
type="text"
name="phone"
value="{{ old('phone',Auth::user()->no_telp) }}"
class="mt-2 w-full rounded-xl border border-slate-300 bg-white px-4 py-3 focus:border-sky-400 focus:ring-4 focus:ring-sky-100 outline-none transition">

</div>




<div>

<label class="text-sm font-semibold text-slate-700">
Tanggal Lahir
</label>

<input 
type="date"
name="tanggal_lahir"
value="{{ old('tanggal_lahir',Auth::user()->tgl_lahir) }}"
class="mt-2 w-full rounded-xl border border-slate-300 bg-white px-4 py-3 focus:border-sky-400 focus:ring-4 focus:ring-sky-100 outline-none transition">

</div>


</div>





<!-- KEAMANAN -->

<div class="mt-8 pt-6 border-t border-slate-200">


<h3 class="font-bold text-[#0F3D5E] mb-5">
Pertanyaan Keamanan
</h3>



<div class="space-y-5">


<div>

<label class="text-sm font-semibold text-slate-700">
Pertanyaan
</label>

<select 
name="security_question"
class="mt-2 w-full rounded-xl border border-slate-300 bg-white px-4 py-3">

<option value="favorit">
Apa tempat favorit Anda?
</option>

<option value="makanan">
Apa makanan kesukaan Anda?
</option>

<option value="kota">
Apa kota impian Anda?
</option>

</select>

</div>



<div>

<label class="text-sm font-semibold text-slate-700">
Jawaban
</label>

<input 
type="text"
name="security_answer"
value="{{ old('security_answer',Auth::user()->security_answer) }}"
class="mt-2 w-full rounded-xl border border-slate-300 bg-white px-4 py-3 focus:border-sky-400 focus:ring-4 focus:ring-sky-100 outline-none">

</div>


</div>


</div>



</div>







<!-- FOTO PROFIL -->


<div class="bg-slate-50 rounded-2xl border border-slate-200 p-6 flex flex-col items-center">


<h3 class="font-semibold text-slate-700 mb-5">
Foto Profil
</h3>



<div class="w-36 h-36 rounded-full border-4 border-white shadow-md overflow-hidden bg-slate-200 flex items-center justify-center">


@if(Auth::user()->avatar)

<img 
id="avatarPreview"
src="{{ asset('storage/'.Auth::user()->avatar) }}"
class="w-full h-full object-cover">


@else

<span id="avatarText"
class="text-4xl font-bold text-slate-400">

{{ strtoupper(substr(Auth::user()->name,0,2)) }}

</span>


<img id="avatarPreview"
class="hidden w-full h-full object-cover">

@endif


</div>




<input 
type="file"
id="fileInput"
name="avatar"
accept="image/*"
class="hidden"
onchange="previewImage(event)">



<label for="fileInput"
class="mt-5 cursor-pointer px-5 py-2.5 rounded-xl bg-sky-100 text-sky-700 font-semibold text-sm hover:bg-sky-200 transition">

Pilih Gambar

</label>



<p class="text-xs text-slate-400 text-center mt-4">
Maksimal 1 MB<br>
JPG, JPEG, PNG
</p>



</div>



</div>





<div class="mt-8 pt-6 border-t border-slate-200 flex justify-end">


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



<script>

function previewImage(event){

const input = event.target;
const preview = document.getElementById('avatarPreview');
const text = document.getElementById('avatarText');


if(input.files && input.files[0]){


const reader = new FileReader();


reader.onload=function(e){

preview.src=e.target.result;

preview.classList.remove('hidden');


if(text){
text.classList.add('hidden');
}

}


reader.readAsDataURL(input.files[0]);

}

}

</script>


@endsection
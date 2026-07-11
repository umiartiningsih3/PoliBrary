@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-[#F8FAFC] py-10 px-6 font-['Poppins']">

<div class="max-w-7xl mx-auto">

<div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-8">

<!-- HEADER -->
<div class="flex flex-col lg:flex-row justify-between lg:items-center gap-6 mb-8">

<div>

<span class="inline-flex items-center px-4 py-2 rounded-full text-xs font-semibold tracking-widest uppercase bg-[#C8A951]/10 text-[#A27D20] border border-[#C8A951]/30">

Mahasiswa

</span>

<h1 class="text-3xl font-bold text-[#0F3D5E] mt-4">

Daftar Mahasiswa

</h1>

<p class="text-sm text-slate-500 mt-2">

Kelola seluruh data anggota mahasiswa yang telah terdaftar pada sistem PoliBrary.

</p>

</div>

<a href="{{ route('admin.mahasiswa.register') }}"
class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-[#0F3D5E] hover:bg-[#1D5D8F] text-white text-sm font-semibold transition">

<svg class="w-5 h-5"
fill="none"
stroke="currentColor"
viewBox="0 0 24 24">

<path stroke-linecap="round"
stroke-linejoin="round"
stroke-width="2"
d="M12 4v16m8-8H4"/>

</svg>

Tambah Mahasiswa

</a>

</div>

<!-- SEARCH -->

<form method="GET" action="{{ route('mahasiswa.index') }}" class="mb-8">

<div class="flex flex-col md:flex-row gap-4">

<div class="flex-1 relative">

<svg class="absolute left-4 top-3.5 w-5 h-5 text-slate-400"
fill="none"
stroke="currentColor"
viewBox="0 0 24 24">

<path stroke-linecap="round"
stroke-linejoin="round"
stroke-width="2"
d="M21 21l-4.35-4.35M11 18a7 7 0 100-14 7 7 0 000 14z"/>

</svg>

<input
type="text"
name="search"
value="{{ request('search') }}"
placeholder="Cari berdasarkan nama atau NIM mahasiswa..."
class="w-full pl-12 px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-blue-200 outline-none text-sm">

</div>

<button
type="submit"
class="px-6 py-3 rounded-xl bg-[#0F3D5E] text-white font-semibold text-sm hover:bg-[#1D5D8F] transition">

Cari Data

</button>

</div>

</form>

<!-- TABLE -->

<div class="overflow-x-auto rounded-xl border border-slate-200">

<table class="w-full">

<thead>

<tr class="bg-slate-50 border-b border-slate-200 text-xs uppercase tracking-wider text-slate-500">

<th class="px-6 py-4 text-left">

Nama Mahasiswa

</th>

<th class="px-6 py-4 text-center">

NIM

</th>

<th class="px-6 py-4 text-left">

Program Studi

</th>

<th class="px-6 py-4 text-center">

Aksi

</th>

</tr>

</thead>

<tbody>

@forelse($mahasiswas as $mhs)

<tr class="border-b border-slate-100 hover:bg-slate-50 transition">

<td class="px-6 py-5 align-middle">

<p class="font-semibold text-slate-800">

{{ $mhs->name }}

</p>

<p class="text-xs text-slate-400 mt-1">

Mahasiswa

</p>

</td>

<td class="px-6 py-5 text-center align-middle">

<span class="inline-flex items-center justify-center px-4 py-1.5 rounded-full text-xs font-semibold bg-blue-50 text-blue-600 border border-blue-100">

{{ $mhs->nim }}

</span>

</td>

<td class="px-6 py-5 align-middle">

<p class="text-sm text-slate-700">

{{ $mhs->prodi }}

</p>

</td>

<td class="px-6 py-5 align-middle">
    <div class="flex items-center justify-center gap-4">

        <button
            type="button"
            onclick="bukaModalEdit({{ $mhs->id }})"
            class="text-[#1D5D8F] text-sm font-semibold leading-none hover:underline">
            Edit
        </button>

        <span class="text-slate-300 leading-none">|</span>

        <form
            action="{{ route('admin.mahasiswa.destroy', $mhs->id) }}"
            method="POST"
            class="inline-flex items-center m-0 p-0"
            onsubmit="return confirm('Yakin ingin menghapus mahasiswa ini?')">

            @csrf
            @method('DELETE')

            <button
                type="submit"
                class="text-red-600 text-sm font-semibold leading-none hover:underline">
                Hapus
            </button>

        </form>

    </div>
</td>

</tr>

@empty

<tr>

<td colspan="4" class="py-16">

<div class="flex flex-col items-center justify-center">

<div class="w-20 h-20 rounded-full bg-slate-100 flex items-center justify-center mb-5">

<svg class="w-10 h-10 text-slate-300"
fill="none"
stroke="currentColor"
viewBox="0 0 24 24">

<path stroke-linecap="round"
stroke-linejoin="round"
stroke-width="1.8"
d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1m4-4a4 4 0 110-8 4 4 0 010 8zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>

</svg>

</div>

<h3 class="text-lg font-semibold text-slate-700">

Belum Ada Data Mahasiswa

</h3>

<p class="text-sm text-slate-400 mt-2">

Tambahkan mahasiswa terlebih dahulu agar dapat menggunakan layanan PoliBrary.

</p>

</div>

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

<div class="mt-6 flex items-center justify-between border-t border-slate-200 pt-5">

<p class="text-sm text-slate-500">

Total Mahasiswa :
<span class="font-semibold text-[#0F3D5E]">

{{ $mahasiswas->count() }}

</span>

</p>

<p class="text-xs text-slate-400">

Data anggota perpustakaan PoliBrary

</p>

</div>

</div>

</div>

</div>

@endsection

<!-- ================= MODAL EDIT MAHASISWA ================= -->

<div id="edit-modal"
class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-900/50 backdrop-blur-sm opacity-0 transition duration-300">

<div id="modal-content"
class="bg-white w-full max-w-lg rounded-2xl shadow-2xl border border-slate-200 scale-95 opacity-0 transition duration-300">

<!-- HEADER -->

<div class="flex items-center justify-between px-6 py-5 border-b border-slate-200">

<div>

<h2 class="text-xl font-semibold text-[#0F3D5E]">

Edit Data Mahasiswa

</h2>

<p class="text-sm text-slate-500 mt-1">

Perbarui informasi mahasiswa yang terdaftar.

</p>

</div>

<button
type="button"
onclick="closeModal()"
class="text-slate-400 hover:text-red-500 transition">

<svg class="w-6 h-6"
fill="none"
stroke="currentColor"
viewBox="0 0 24 24">

<path
stroke-linecap="round"
stroke-linejoin="round"
stroke-width="2"
d="M6 18L18 6M6 6l12 12"/>

</svg>

</button>

</div>

<!-- FORM -->

<form
id="edit-form"
method="POST"
action="">

@csrf
@method('PUT')

<div class="p-6 space-y-5">

<!-- Nama -->

<div>

<label class="block text-sm font-semibold text-slate-700 mb-2">

Nama Mahasiswa

</label>

<input
type="text"
id="edit-name"
name="name"
required
class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-blue-200 focus:border-[#0F3D5E] outline-none">

</div>

<!-- NIM -->

<div>

<label class="block text-sm font-semibold text-slate-700 mb-2">

NIM

</label>

<input
type="text"
id="edit-nim"
name="nim"
readonly
class="w-full rounded-xl bg-slate-100 border border-slate-200 px-4 py-3 text-slate-500">

</div>

<!-- PRODI -->

<div>

<label class="block text-sm font-semibold text-slate-700 mb-2">

Program Studi

</label>

<select
id="edit-prodi"
name="prodi"
required
class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-blue-200 focus:border-[#0F3D5E] outline-none">

<option value="">Pilih Program Studi</option>

<option value="D3 Teknik Informatika">D3 Teknik Informatika</option>

<option value="D3 Teknik Geomatika">D3 Teknik Geomatika</option>

<option value="D4 Teknik Rekayasa Perangkat Lunak">D4 Teknik Rekayasa Perangkat Lunak</option>

<option value="D4 Rekayasa Keamanan Siber">D4 Rekayasa Keamanan Siber</option>

<option value="D4 Teknologi Rekayasa Multimedia">D4 Teknologi Rekayasa Multimedia</option>

<option value="D4 Animasi">D4 Animasi</option>

</select>

</div>

</div>

<!-- FOOTER -->

<div class="flex justify-end gap-3 px-6 py-5 border-t border-slate-200 bg-slate-50 rounded-b-2xl">

<button
type="button"
onclick="closeModal()"
class="px-5 py-2.5 rounded-xl border border-slate-300 text-slate-600 hover:bg-slate-100 transition">

Batal

</button>

<button
type="submit"
class="px-6 py-2.5 rounded-xl bg-[#0F3D5E] hover:bg-[#1D5D8F] text-white font-semibold transition">

Simpan Perubahan

</button>

</div>

</form>

</div>

</div>

<script>

function bukaModalEdit(id){

    fetch(`/admin/mahasiswa/${id}/edit`)
    .then(response => {

        if(!response.ok){
            throw new Error('Gagal mengambil data.');
        }

        return response.json();

    })

    .then(data => {

        document.getElementById('edit-name').value = data.name;
        document.getElementById('edit-nim').value = data.nim;
        document.getElementById('edit-prodi').value = data.prodi;

        document
        .getElementById('edit-form')
        .action = `/admin/mahasiswa/${id}`;

        const modal = document.getElementById('edit-modal');
        const content = document.getElementById('modal-content');

        modal.classList.remove('hidden');
        modal.classList.add('flex');

        setTimeout(() => {

            modal.classList.remove('opacity-0');
            modal.classList.add('opacity-100');

            content.classList.remove('scale-95','opacity-0');
            content.classList.add('scale-100','opacity-100');

        },10);

    })

    .catch(error=>{

        alert('Gagal memuat data mahasiswa.');
        console.error(error);

    });

}



function closeModal(){

    const modal = document.getElementById('edit-modal');
    const content = document.getElementById('modal-content');

    modal.classList.remove('opacity-100');
    modal.classList.add('opacity-0');

    content.classList.remove('scale-100','opacity-100');
    content.classList.add('scale-95','opacity-0');

    setTimeout(()=>{

        modal.classList.remove('flex');
        modal.classList.add('hidden');

    },300);

}



window.addEventListener('click',function(e){

    const modal=document.getElementById('edit-modal');

    if(e.target===modal){

        closeModal();

    }

});



window.addEventListener('keydown',function(e){

    if(e.key==="Escape"){

        closeModal();

    }

});

</script>
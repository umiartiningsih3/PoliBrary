@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-[#F8FAFC] py-10 px-6 font-['Poppins']">

<div class="max-w-5xl mx-auto">

<div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-8">

<!-- HEADER -->

<div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-5 mb-8">

<div>

<span class="px-4 py-2 rounded-full text-xs font-semibold
bg-[#C8A951]/10 text-[#A27D20] border border-[#C8A951]/30">

M A H A S I S W A

</span>

<h1 class="text-3xl font-bold text-[#0F3D5E] mt-4">

Tambah Mahasiswa

</h1>

<p class="text-sm text-slate-500 mt-2">

Tambahkan anggota mahasiswa baru ke dalam sistem PoliBrary.

</p>

</div>


</div>

<!-- FORM -->

<form action="{{ route('admin.store-mahasiswa') }}" method="POST">

@csrf

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

<!-- Nama -->

<div class="md:col-span-2">

<label class="block text-sm font-semibold text-slate-700 mb-2">

Nama Lengkap

</label>

<input
type="text"
name="nama"
required
placeholder="Masukkan nama lengkap mahasiswa"
class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-white focus:ring-2 focus:ring-blue-200 focus:border-[#0F3D5E] outline-none transition">

</div>

<!-- NIM -->

<div>

<label class="block text-sm font-semibold text-slate-700 mb-2">

NIM

</label>

<input
type="text"
name="nim"
required
placeholder="Contoh : 2241101001"
class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-white focus:ring-2 focus:ring-blue-200 focus:border-[#0F3D5E] outline-none transition">

</div>

<!-- Prodi -->

<div>

<label class="block text-sm font-semibold text-slate-700 mb-2">

Program Studi

</label>

<select
name="prodi"
required
class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-white focus:ring-2 focus:ring-blue-200 focus:border-[#0F3D5E] outline-none transition">

<option value="">Pilih Program Studi</option>

<option value="D3 Teknik Informatika">D3 Teknik Informatika</option>

<option value="D3 Teknik Geomatika">D3 Teknik Geomatika</option>

<option value="D4 Teknik Rekayasa Perangkat Lunak">D4 Teknik Rekayasa Perangkat Lunak</option>

<option value="D4 Animasi">D4 Animasi</option>

<option value="D4 Teknologi Rekayasa Multimedia">D4 Teknologi Rekayasa Multimedia</option>

<option value="D4 Rekayasa Keamanan Siber">D4 Rekayasa Keamanan Siber</option>

</select>

</div>

<!-- Tanggal -->

<div>

<label class="block text-sm font-semibold text-slate-700 mb-2">

Tanggal Terdaftar

</label>

<input
type="text"
value="{{ date('d F Y') }}"
readonly
class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 text-slate-600 cursor-not-allowed">

<input
type="hidden"
name="tgl_daftar"
value="{{ date('Y-m-d') }}">

</div>

<!-- Tipe -->

<div>

<label class="block text-sm font-semibold text-slate-700 mb-2">

Tipe Keanggotaan

</label>

<select
name="tipe_keanggotaan"
class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 text-slate-600 cursor-not-allowed">

<option value="mahasiswa" selected>

Mahasiswa

</option>

</select>

</div>

</div>

<!-- FOOTER -->

<div class="mt-10 pt-6 border-t border-slate-200 flex justify-end gap-3">

<a
href="{{ route('mahasiswa.index') }}"
class="px-6 py-3 rounded-xl border border-slate-200 text-slate-600 font-semibold hover:bg-slate-50 transition">

Batal

</a>

<button
type="submit"
class="px-8 py-3 rounded-xl bg-[#0F3D5E] hover:bg-[#1D5D8F] text-white font-semibold transition">

Simpan Mahasiswa

</button>

</div>

</form>

</div>

</div>

</div>

@endsection
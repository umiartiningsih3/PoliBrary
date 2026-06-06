@extends('layouts.app')

@section('content')
<div class="bg-gray-50 min-h-screen py-10 px-4 md:px-12">
    <div class="max-w-5xl mx-auto bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
        
        <div class="mb-8 border-b pb-6">
            <h1 class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-[#0052cc] to-[#3b82f6]">
                Akun Saya
            </h1>
            <p class="text-sm text-gray-500 mt-1">Kelola informasi profil Anda untuk mengontrol, melindungi dan mengamankan akun</p>
        </div>

        <!-- Ditambahkan enctype="multipart/form-data" agar form bisa mengirim file foto -->
        <div class="flex flex-col lg:flex-row gap-10">
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="flex-1 space-y-6 text-gray-700">
                @csrf
                @method('PUT') {{-- Menggunakan method PUT/PATCH untuk update data --}}
                
                {{-- Alert Sukses / Gagal --}}
                @if(session('success'))
                    <div class="bg-green-50 text-green-600 p-4 rounded-lg text-sm mb-4">
                        {{ session('success') }}
                    </div>
                @endif
                
                <div class="flex flex-col md:flex-row md:items-center gap-2">
                    <label class="md:w-32 font-semibold text-sm">Nama</label>
                    <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}" class="flex-1 p-3 bg-gray-50 rounded-lg border border-gray-200 outline-none focus:ring-2 focus:ring-blue-100 transition">
                    @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                
                <div class="flex flex-col md:flex-row md:items-center gap-2">
                    <label class="md:w-32 font-semibold text-sm">NIM</label>
                    {{-- Di-disable jika NIM tidak boleh diubah, atau hapus 'disabled' jika boleh diubah --}}
                    <input type="text" name="nim" value="{{ old('nim', Auth::user()->nim) }}" class="flex-1 p-3 bg-gray-100 rounded-lg border border-gray-200 text-gray-500 cursor-not-allowed" disabled>
                </div>
                
                <div class="flex flex-col md:flex-row md:items-center gap-2">
                    <label class="md:w-32 font-semibold text-sm">Program Studi</label>
                    <input type="text" name="prodi" value="{{ old('prodi', Auth::user()->prodi) }}" class="flex-1 p-3 bg-gray-100 rounded-lg border border-gray-200 text-gray-500 cursor-not-allowed" disabled>
                </div>
                
                <div class="flex flex-col md:flex-row md:items-center gap-2">
                    <label class="md:w-32 font-semibold text-sm">Tanggal Lahir</label>
                    <div class="flex gap-2 flex-1">
                        {{-- Menggunakan input type date agar jauh lebih praktis dan dinamis dibanding select manual --}}
                        <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', Auth::user()->tanggal_lahir) }}" class="flex-1 p-3 bg-gray-50 rounded-lg border border-gray-200 outline-none focus:ring-2 focus:ring-blue-100 transition">
                    </div>
                    @error('tanggal_lahir') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                
                <div class="flex flex-col md:flex-row md:items-center gap-2">
                    <label class="md:w-32 font-semibold text-sm">Tipe Keanggotaan</label>
                    {{-- KODE BARU: --}}
<input type="text" value="{{ Auth::user()->tipe_keanggotaan }}" class="flex-1 p-3 bg-gray-100 rounded-lg border border-gray-200 text-gray-400 cursor-not-allowed" disabled>
                </div>
                
                <div class="flex flex-col md:flex-row md:items-center gap-2">
                    <label class="md:w-32 font-semibold text-sm">Email</label>
                    <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}" class="flex-1 p-3 bg-gray-50 rounded-lg border border-gray-200 outline-none focus:ring-2 focus:ring-blue-100 transition">
                    @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                
                <div class="flex flex-col md:flex-row md:items-center gap-2">
                    <label class="md:w-32 font-semibold text-sm">Nomor Telepon</label>
                    <input type="text" name="phone" value="{{ old('phone', Auth::user()->phone) }}" class="flex-1 p-3 bg-gray-50 rounded-lg border border-gray-200 outline-none focus:ring-2 focus:ring-blue-100 transition">
                    @error('no_telp') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="border-t pt-6 mt-6">
                    <h3 class="font-bold text-sm text-gray-800 mb-4">Pertanyaan Keamanan (Reset Password)</h3>
                    <div class="space-y-4">
                        <div class="flex flex-col md:flex-row md:items-center gap-2">
                            <label class="md:w-32 font-semibold text-xs">Pilih Pertanyaan</label>
                            <select name="security_question" class="flex-1 p-3 bg-gray-50 rounded-lg border border-gray-200 outline-none focus:ring-2 focus:ring-blue-100 transition">
                                <option value="favorit" {{ old('security_question', Auth::user()->security_question) == 'favorit' ? 'selected' : '' }}>Apa tempat favorit Anda?</option>
                                <option value="makanan" {{ old('security_question', Auth::user()->security_question) == 'makanan' ? 'selected' : '' }}>Apa makanan kesukaan Anda?</option>
                                <option value="kota" {{ old('security_question', Auth::user()->security_question) == 'kota' ? 'selected' : '' }}>Apa kota impian Anda?</option>
                            </select>
                        </div>
                        <div class="flex flex-col md:flex-row md:items-center gap-2">
                            <label class="md:w-32 font-semibold text-xs">Jawaban Anda</label>
                            <input type="text" name="security_answer" value="{{ old('security_answer', Auth::user()->security_answer) }}" placeholder="Tulis jawaban Anda di sini" class="flex-1 p-3 bg-gray-50 rounded-lg border border-gray-200 outline-none focus:ring-2 focus:ring-blue-100 transition">
                            @error('security_answer') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit" class="bg-gradient-to-r from-[#0052cc] to-[#3b82f6] text-white px-10 py-3 rounded-lg shadow-md hover:shadow-lg transition font-semibold">
                        Simpan Perubahan
                    </button>
                </div>

                {{-- Input file ditaruh di dalam form agar ikut terkirim saat submit --}}
                <input type="file" name="avatar" id="fileInput" class="hidden" accept=".jpeg,.png,.jpg" onchange="previewImage(this)">
            </form>

            {{-- Bagian Foto Profil --}}
            <div class="w-full lg:w-1/3 flex flex-col items-center border-l lg:pl-10 space-y-4">
                <div class="w-32 h-32 rounded-full border-4 border-gray-100 flex items-center justify-center overflow-hidden bg-gray-50">
                    @if(Auth::user()->avatar)
                        <img id="avatarPreview" src="{{ asset('storage/' . Auth::user()->avatar) }}" class="w-full h-full object-cover">
                    @else
                        <span id="avatarIcon" class="text-6xl text-gray-300">👤</span>
                        <img id="avatarPreview" src="" class="w-full h-full object-cover hidden">
                    @endif
                </div>
                
                <button type="button" onclick="document.getElementById('fileInput').click()" class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition text-sm font-medium">
                    Pilih Gambar
                </button>
                
                <div class="text-xs text-center text-gray-400 leading-relaxed">
                    Ukuran gambar: maks. 1 MB<br>
                    Format gambar: .JPEG, .PNG, .JPG
                </div>
            </div>
        </div>
        
    </div>
</div>

<script>
    // Fungsi untuk pratinjau foto langsung sebelum di-upload
    function previewImage(input) {
        const file = input.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.getElementById('avatarPreview');
                const icon = document.getElementById('avatarIcon');
                
                preview.src = e.target.result;
                preview.classList.remove('hidden');
                if(icon) icon.classList.add('hidden');
            }
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection
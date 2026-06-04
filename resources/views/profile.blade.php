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

        <div class="flex flex-col lg:flex-row gap-10">
            <form action="#" method="POST" class="flex-1 space-y-6 text-gray-700">
                @csrf
                
                <div class="flex flex-col md:flex-row md:items-center gap-2">
                    <label class="md:w-32 font-semibold text-sm">Nama</label>
                    <input type="text" value="Umiarti Ningsih" class="flex-1 p-3 bg-gray-50 rounded-lg border border-gray-200 outline-none focus:ring-2 focus:ring-blue-100 transition">
                </div>
                
                <div class="flex flex-col md:flex-row md:items-center gap-2">
                    <label class="md:w-32 font-semibold text-sm">NIM</label>
                    <input type="text" value="3312XXXXXXXX" class="flex-1 p-3 bg-gray-50 rounded-lg border border-gray-200 outline-none focus:ring-2 focus:ring-blue-100 transition">
                </div>
                
                <div class="flex flex-col md:flex-row md:items-center gap-2">
                    <label class="md:w-32 font-semibold text-sm">Program Studi</label>
                    <input type="text" value="D3 Teknik Informatika" class="flex-1 p-3 bg-gray-50 rounded-lg border border-gray-200 outline-none focus:ring-2 focus:ring-blue-100 transition">
                </div>
                
                <div class="flex flex-col md:flex-row md:items-center gap-2">
                    <label class="md:w-32 font-semibold text-sm">Tanggal Lahir</label>
                    <div class="flex gap-2 flex-1">
                        <select class="p-3 bg-gray-50 rounded-lg border border-gray-200 w-full"><option>01</option></select>
                        <select class="p-3 bg-gray-50 rounded-lg border border-gray-200 w-full"><option>Januari</option></select>
                        <select class="p-3 bg-gray-50 rounded-lg border border-gray-200 w-full"><option>2000</option></select>
                    </div>
                </div>
                
                <div class="flex flex-col md:flex-row md:items-center gap-2">
                    <label class="md:w-32 font-semibold text-sm">Tipe Keanggotaan</label>
                    <input type="text" value="Mahasiswa" class="flex-1 p-3 bg-gray-100 rounded-lg border border-gray-200 text-gray-400 cursor-not-allowed" disabled>
                </div>
                
                <div class="flex flex-col md:flex-row md:items-center gap-2">
                    <label class="md:w-32 font-semibold text-sm">Email</label>
                    <input type="email" value="umiarti@student.polibatam.ac.id" class="flex-1 p-3 bg-gray-50 rounded-lg border border-gray-200 outline-none focus:ring-2 focus:ring-blue-100 transition">
                </div>
                
                <div class="flex flex-col md:flex-row md:items-center gap-2">
                    <label class="md:w-32 font-semibold text-sm">Nomor Telepon</label>
                    <input type="text" value="08XXXXXXXXXX" class="flex-1 p-3 bg-gray-50 rounded-lg border border-gray-200 outline-none focus:ring-2 focus:ring-blue-100 transition">
                </div>

                <div class="border-t pt-6 mt-6">
                    <h3 class="font-bold text-sm text-gray-800 mb-4">Pertanyaan Keamanan (Reset Password)</h3>
                    <div class="space-y-4">
                        <div class="flex flex-col md:flex-row md:items-center gap-2">
                            <label class="md:w-32 font-semibold text-xs">Pilih Pertanyaan</label>
                            <select name="security_question" class="flex-1 p-3 bg-gray-50 rounded-lg border border-gray-200 outline-none focus:ring-2 focus:ring-blue-100 transition">
                                <option value="favorit">Apa tempat favorit Anda?</option>
                                <option value="makanan">Apa makanan kesukaan Anda?</option>
                                <option value="kota">Apa kota impian Anda?</option>
                            </select>
                        </div>
                        <div class="flex flex-col md:flex-row md:items-center gap-2">
                            <label class="md:w-32 font-semibold text-xs">Jawaban Anda</label>
                            <input type="text" name="security_answer" placeholder="Tulis jawaban Anda di sini" class="flex-1 p-3 bg-gray-50 rounded-lg border border-gray-200 outline-none focus:ring-2 focus:ring-blue-100 transition">
                        </div>
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit" class="bg-gradient-to-r from-[#0052cc] to-[#3b82f6] text-white px-10 py-3 rounded-lg shadow-md hover:shadow-lg transition font-semibold">
                        Simpan Perubahan
                    </button>
                </div>
            </form>

            <div class="w-full lg:w-1/3 flex flex-col items-center border-l lg:pl-10 space-y-4">
                <div class="w-32 h-32 rounded-full border-4 border-gray-100 flex items-center justify-center overflow-hidden bg-gray-50">
                    <span class="text-6xl text-gray-300">👤</span>
                </div>
                
                <input type="file" id="fileInput" class="hidden" accept=".jpeg,.png">
                <button type="button" onclick="document.getElementById('fileInput').click()" class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition text-sm font-medium">
                    Pilih Gambar
                </button>
                
                <div class="text-xs text-center text-gray-400 leading-relaxed">
                    Ukuran gambar: maks. 1 MB<br>
                    Format gambar: .JPEG, .PNG
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection
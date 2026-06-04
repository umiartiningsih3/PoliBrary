@extends('layouts.app')

@section('content')
<div class="bg-gray-50 min-h-screen py-10 px-4 md:px-12">
    <div class="max-w-4xl mx-auto">
        
        <div class="mb-8">
            <h1 class="text-3xl font-extrabold tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-blue-700 to-sky-400">
                Status Denda
            </h1>
            <p class="text-gray-500 text-sm mt-1">Pantau tagihan denda keterlambatan pengembalian buku Anda.</p>
        </div>

        @if(isset($denda) && $denda > 0)
        <div class="bg-white rounded-2xl shadow-sm border border-red-100 p-8 flex flex-col items-center text-center">
            <div class="w-20 h-20 bg-red-50 text-red-500 rounded-full flex items-center justify-center mb-6">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
            </div>
            <h2 class="text-xl font-bold text-gray-800">Anda Memiliki Tunggakan</h2>
            <p class="text-4xl font-black text-red-600 my-4">Rp {{ number_format($denda, 0, ',', '.') }}</p>
            <p class="text-gray-500 mb-6">Segera lakukan pembayaran ke bagian administrasi perpustakaan agar akses peminjaman Anda kembali normal.</p>
            <button class="bg-blue-600 text-white px-8 py-3 rounded-xl font-bold hover:bg-blue-700 transition">
                Konfirmasi Pembayaran
            </button>
        </div>
        @else
        <div class="bg-white rounded-2xl shadow-sm border border-green-100 p-12 text-center">
            <div class="w-20 h-20 bg-green-50 text-green-500 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            </div>
            <h2 class="text-xl font-bold text-gray-800">Tidak Ada Denda</h2>
            <p class="text-gray-500 mt-2">Kondisi akun Anda bersih. Terima kasih telah mengembalikan buku tepat waktu!</p>
        </div>
        @endif
        
    </div>
</div>
@endsection
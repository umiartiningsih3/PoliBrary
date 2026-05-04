@extends('layouts.app')

@section('content')

<div class="p-6 space-y-6">

    <h2 class="text-xl font-bold">Keranjang Buku</h2>

    <div class="space-y-4">

        <!-- ITEM TERSEDIA -->
        <div class="flex items-center gap-4">

            <input type="checkbox" class="w-5 h-5">

            <div class="flex bg-white shadow rounded p-4 w-full items-center gap-4">

                <div class="w-20 h-24 bg-gray-200 rounded"></div>

                <div class="flex-1">

                    <h3 class="font-bold">Budidaya Ikan Bandeng</h3>
                    <p class="text-sm text-gray-600">Umiarti Ningsih</p>

                    <!-- STOK -->
                    <p class="text-xs text-orange-500 font-medium mt-1">
                        Sisa 1 buku
                    </p>

                    <button class="mt-2 text-sm bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                        Hapus
                    </button>

                </div>

                <div class="text-right">
                    <p class="text-green-600 font-semibold">Tersedia</p>
                </div>

            </div>
        </div>

        <!-- ITEM HABIS -->
        <div class="flex items-center gap-4">

            <!-- DISABLE CHECKBOX -->
            <input type="checkbox" class="w-5 h-5" disabled>

            <div class="flex bg-white shadow rounded p-4 w-full items-center gap-4 opacity-60">

                <div class="w-20 h-24 bg-gray-200 rounded"></div>

                <div class="flex-1">

                    <h3 class="font-bold">Dasar Pemrograman Web</h3>
                    <p class="text-sm text-gray-600">Andi Saputra</p>

                    <!-- STOK HABIS -->
                    <p class="text-xs text-red-500 font-medium mt-1">
                        Buku kosong
                    </p>

                    <button class="mt-2 text-sm bg-gray-400 text-white px-3 py-1 rounded cursor-not-allowed">
                        Tidak tersedia
                    </button>

                </div>

                <div class="text-right">
                    <p class="text-red-500 font-semibold">Habis</p>
                </div>

            </div>
        </div>

    </div>

    <!-- BUTTON -->
    <div class="flex justify-end pt-4">
        <button class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">
            Pinjam Sekarang
        </button>
    </div>

</div>

@endsection
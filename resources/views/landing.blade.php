@extends('layouts.app')

@section('content')

<div class="bg-white shadow px-6 py-3 flex justify-between items-center">
    <!-- Logo -->
    <div class="font-bold text-blue-600">FUDi-gital</div>

    <!-- Menu kanan -->
    <div class="flex items-center gap-3">
        <button onclick="openPopup()" 
            class="bg-gray-300 px-3 py-1 rounded">
            Informasi
        </button>

        <!-- Button MASUK -->
        <a href="/login" 
           class="px-4 py-1 bg-gray-200 rounded hover:bg-gray-300 text-sm font-semibold">
            MASUK
        </a>

        <!-- Button DAFTAR -->
        <a href="/register" 
           class="px-4 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 text-sm font-semibold">
            DAFTAR
        </a>
    </div>
</div>

<!-- Background -->
<div class="h-screen flex items-center justify-center">
    <h1 class="text-2xl font-bold">Landing Page</h1>
</div>

<!-- Popup -->
<x-popup-informasi />

@endsection

@push('scripts')
<script>
function openPopup() {
    let popup = document.getElementById('popup');
    let box = document.getElementById('popupBox');

    popup.classList.remove('hidden');

    setTimeout(() => {
        box.classList.remove('scale-95','opacity-0');
        box.classList.add('scale-100','opacity-100');
    }, 10);
}

function closePopup() {
    let popup = document.getElementById('popup');
    let box = document.getElementById('popupBox');

    box.classList.add('scale-95','opacity-0');

    setTimeout(() => {
        popup.classList.add('hidden');
    }, 200);

    localStorage.setItem('popupShown', 'true');
}

// auto muncul pertama kali
window.onload = function () {
    if (!localStorage.getItem('popupShown')) {
        openPopup();
    }
}
</script>
@endpush
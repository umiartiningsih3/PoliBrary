@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto py-10 px-6">

    <h2 class="text-3xl font-bold mb-6 bg-clip-text text-transparent bg-gradient-to-r from-[#0052cc] to-[#3b82f6]">
        Tambah Koleksi Buku
    </h2>

    <div class="bg-white p-8 shadow-sm rounded-2xl border border-gray-100">

        <form action="#" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-3 gap-8">

                <div class="flex flex-col items-center">
                    <div class="w-40 h-48 bg-gray-50 mb-3 rounded-xl border-2 border-dashed border-gray-200 flex items-center justify-center overflow-hidden">
                        <img id="previewImage"
                             src="{{ asset('image/Polibrary-logo.png') }}"
                             class="w-16 h-16 opacity-30 grayscale object-contain">
                    </div>

                    <input type="file"
                           accept="image/*"
                           onchange="previewCover(event)"
                           class="text-sm w-40 mb-2 file:hidden cursor-pointer">

                    <button type="button"
                            class="bg-gray-100 px-4 py-2 rounded-lg hover:bg-gray-200 text-sm font-semibold text-gray-700 transition">
                        Unggah Sampul
                    </button>
                </div>

                <div class="col-span-2 grid grid-cols-2 gap-4 text-sm">
                    <div>
                        <label class="font-semibold text-gray-700">Judul Buku</label>
                        <input type="text" class="w-full border border-gray-200 p-2.5 rounded-lg focus:ring-2 focus:ring-blue-100 outline-none transition">
                    </div>
                    <div>
                        <label class="font-semibold text-gray-700">ISBN</label>
                        <input type="text" class="w-full border border-gray-200 p-2.5 rounded-lg focus:ring-2 focus:ring-blue-100 outline-none transition">
                    </div>
                    <div>
                        <label class="font-semibold text-gray-700">Penulis</label>
                        <input type="text" class="w-full border border-gray-200 p-2.5 rounded-lg focus:ring-2 focus:ring-blue-100 outline-none transition">
                    </div>
                    <div>
                        <label class="font-semibold text-gray-700">Kategori Buku</label>
                        <select id="kategori" class="w-full border border-gray-200 p-2.5 rounded-lg focus:ring-2 focus:ring-blue-100 outline-none bg-white transition">
                            <option value="">Pilih Kategori</option>
                            <option value="fiksi">Fiksi</option>
                            <option value="nonfiksi">Non-Fiksi</option>
                            <option value="pendidikan">Pendidikan</option>
                            <option value="ip">Ilmu Pengetahuan</option>
                            <option value="teknologi">Teknologi & Komputer</option>
                            <option value="sosial">Sosial & Humaniora</option>
                            <option value="bahasa">Bahasa</option>
                            <option value="seni">Seni & Budaya</option>
                            <option value="agama">Agama</option>
                            <option value="referensi">Referensi</option>
                        </select>
                    </div>
                    <div>
                        <label class="font-semibold text-gray-700">Sub Kategori</label>
                        <select id="subkategori" class="w-full border border-gray-200 p-2.5 rounded-lg focus:ring-2 focus:ring-blue-100 outline-none bg-white transition">
                            <option value="">Pilih Sub Kategori</option>
                        </select>
                    </div>
                    <div>
                        <label class="font-semibold text-gray-700">Nomor Inventaris</label>
                        <div class="w-full border border-gray-200 p-2.5 rounded-lg bg-gray-50 text-blue-600 font-mono font-bold">
                            INV00001
                        </div>
                        <p class="text-xs text-gray-400 mt-1">Akan otomatis dibuat oleh sistem</p>
                    </div>
                    <div>
                        <label class="font-semibold text-gray-700">Penerbit</label>
                        <input type="text" class="w-full border border-gray-200 p-2.5 rounded-lg focus:ring-2 focus:ring-blue-100 outline-none transition">
                    </div>
                    <div>
                        <label class="font-semibold text-gray-700">Tahun Terbit</label>
                        <input type="text" class="w-full border border-gray-200 p-2.5 rounded-lg focus:ring-2 focus:ring-blue-100 outline-none transition">
                    </div>
                    <div class="col-span-2">
                        <label class="font-semibold text-gray-700">Deskripsi Buku</label>
                        <textarea class="w-full border border-gray-200 p-2.5 h-24 rounded-lg focus:ring-2 focus:ring-blue-100 outline-none transition"></textarea>
                    </div>
                    <div class="col-span-2 flex items-center gap-3">
                        <label class="font-semibold text-gray-700">Jumlah Eksemplar</label>
                        <input type="number" class="w-20 border border-gray-200 p-2.5 rounded-lg focus:ring-2 focus:ring-blue-100 outline-none transition">
                    </div>
                </div>
            </div>

            <div class="mt-8 flex gap-4 justify-end border-t pt-6">
                <button type="reset" class="px-6 py-2.5 rounded-lg font-semibold text-gray-600 hover:bg-gray-100 transition">Batal</button>
                <button type="submit" class="bg-gradient-to-r from-[#0052cc] to-[#3b82f6] text-white px-6 py-2.5 rounded-lg font-semibold shadow-md hover:shadow-lg transition">
                    Tambah Buku
                </button>
            </div>
        </form>
    </div>
</div>

@endsection

@push('scripts')
<script>
function previewCover(event) {
    const input = event.target;
    const preview = document.getElementById('previewImage');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.classList.remove('w-16','h-16','opacity-30','grayscale');
            preview.classList.add('w-full','h-full','object-cover');
        }
        reader.readAsDataURL(input.files[0]);
    }
}

document.addEventListener("DOMContentLoaded", function () {
    const kategori = document.getElementById("kategori");
    const subkategori = document.getElementById("subkategori");
    const data = {
        fiksi: ["Novel","Cerpen","Fantasi","Romansa","Misteri","Thriller","Horor","Sci-fi"],
        nonfiksi: ["Biografi","Autobiografi","Sejarah","Motivasi","Esai","Jurnal"],
        pendidikan: ["Buku Pelajaran","Modul Kuliah","Soal Latihan","Panduan Belajar"],
        ip: ["Matematika","Fisika","Kimia","Biologi","Statistik","Astronomi"],
        teknologi: ["Pemrograman","Web","Mobile","Database","AI"],
        sosial: ["Ekonomi","Psikologi","Sosiologi","Hukum"],
        bahasa: ["Indonesia","Inggris","Jepang","Korea"],
        seni: ["Musik","Desain","Fotografi"],
        agama: ["Islam","Kristen","Hindu","Buddha"],
        referensi: ["Ensiklopedia","Atlas","Kamus"]
    };

    kategori.addEventListener("change", function () {
        subkategori.innerHTML = `<option value="">Pilih Sub Kategori</option>`;
        if (data[this.value]) {
            data[this.value].forEach(item => {
                const opt = document.createElement("option");
                opt.value = item;
                opt.textContent = item;
                subkategori.appendChild(opt);
            });
        }
    });
});
</script>
@endpush
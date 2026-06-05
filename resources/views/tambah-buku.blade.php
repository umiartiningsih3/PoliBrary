@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto py-10 px-6">
    <h2 class="text-3xl font-bold mb-6 bg-clip-text tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-sky-400">
        Tambah Koleksi Buku
    </h2>

    <div class="bg-white p-8 shadow-sm rounded-2xl border border-gray-100">
        <form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="grid grid-cols-3 gap-8">
        <div class="flex flex-col items-center">
            <div class="w-40 h-48 bg-gray-50 mb-3 rounded-xl border-2 border-dashed border-gray-200 flex items-center justify-center overflow-hidden">
                <img id="previewImage"
                     src="{{ asset('image/Polibrary-logo.png') }}"
                     class="w-16 h-16 opacity-30 grayscale object-contain">
            </div>

            <input type="file" name="sampul" id="fileInput" accept="image/*"
                   onchange="previewCover(event)" class="hidden">

            <label for="fileInput"
                   class="cursor-pointer bg-gray-100 px-4 py-2 rounded-lg hover:bg-gray-200 text-sm font-semibold text-gray-700 transition">
                Unggah Sampul
            </label>
        </div>

        <div class="col-span-2 grid grid-cols-2 gap-4 text-sm">
            <div>
                <label class="font-semibold text-gray-700">Judul Buku</label>
                <input type="text" name="judul" required class="w-full border border-gray-200 p-2.5 rounded-lg focus:ring-2 focus:ring-blue-100 outline-none transition">
            </div>
            <div>
                <label class="font-semibold text-gray-700">ISBN</label>
                <input type="text" name="isbn" required class="w-full border border-gray-200 p-2.5 rounded-lg focus:ring-2 focus:ring-blue-100 outline-none transition">
            </div>
            <div>
                <label class="font-semibold text-gray-700">Penulis</label>
                <input type="text" name="penulis" required class="w-full border border-gray-200 p-2.5 rounded-lg focus:ring-2 focus:ring-blue-100 outline-none transition">
            </div>
            <div>
                <label class="font-semibold text-gray-700">Kategori Buku</label>
                <select id="kategori" name="kategori" required class="w-full border border-gray-200 p-2.5 rounded-lg focus:ring-2 focus:ring-blue-100 outline-none bg-white transition">
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
                <select id="subkategori" name="sub_kategori" required class="w-full border border-gray-200 p-2.5 rounded-lg focus:ring-2 focus:ring-blue-100 outline-none bg-white transition">
                    <option value="">Pilih Sub Kategori</option>
                </select>
            </div>
            <div>
                <label class="font-semibold text-gray-700">Nomor Inventaris</label>
                <input type="text" name="no_inventaris" value="AUTO" readonly class="w-full border border-gray-200 p-2.5 rounded-lg bg-gray-50 text-blue-600 font-mono font-bold">
            </div>
            <div>
                <label class="font-semibold text-gray-700">Penerbit</label>
                <input type="text" name="penerbit" required class="w-full border border-gray-200 p-2.5 rounded-lg focus:ring-2 focus:ring-blue-100 outline-none transition">
            </div>
            <div>
                <label class="font-semibold text-gray-700">Tahun Terbit</label>
                <input type="number" name="tahun_terbit" required class="w-full border border-gray-200 p-2.5 rounded-lg focus:ring-2 focus:ring-blue-100 outline-none transition">
            </div>
            <div class="col-span-2">
                <label class="font-semibold text-gray-700">Deskripsi</label>
                <textarea name="deskripsi" class="w-full border border-gray-200 p-2.5 h-24 rounded-lg"></textarea>
            </div>
            <div class="col-span-2">
                <label class="font-semibold text-gray-700">Jumlah Eksemplar</label>
                <input type="number" name="jumlah_eksemplar" required class="w-20 border border-gray-200 p-2.5 rounded-lg">
            </div>
        </div>
    </div>

    <div class="mt-8 flex gap-4 justify-end border-t pt-6">
        <button type="submit" class="bg-blue-600 text-white px-6 py-2.5 rounded-lg font-semibold">Tambah Buku</button>
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
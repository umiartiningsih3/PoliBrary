@extends('layouts.app')

@section('content')

<div class="p-6">

    <h2 class="text-xl font-bold mb-6">Tambah Koleksi Buku</h2>

    <div class="bg-white p-6 shadow rounded border">

        <form action="#" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- GRID UTAMA (LEFT: COVER | RIGHT: FORM) -->
            <div class="grid grid-cols-3 gap-8">

                <!-- ================= LEFT: UPLOAD COVER ================= -->
                <div class="flex flex-col items-center">

                    <div class="w-40 h-48 bg-gray-100 mb-3 rounded flex items-center justify-center overflow-hidden">

                        <img id="previewImage"
                             src="{{ asset('image/Polibrary-logo.png') }}"
                             class="w-16 h-16 opacity-30 grayscale">

                    </div>

                    <input type="file"
                           accept="image/*"
                           onchange="previewCover(event)"
                           class="text-sm w-40 mb-2">

                    <button type="button"
                            class="bg-gray-300 px-3 py-1 rounded hover:bg-gray-400 text-sm">
                        Unggah Sampul
                    </button>

                </div>


                <!-- ================= RIGHT: FORM ================= -->
                <div class="col-span-2 grid grid-cols-2 gap-4 text-sm">

                    <div>
                        <label class="font-semibold">Judul Buku</label>
                        <input type="text" class="w-full border p-2 rounded">
                    </div>

                    <div>
                        <label class="font-semibold">ISBN</label>
                        <input type="text" class="w-full border p-2 rounded">
                    </div>

                    <div>
                        <label class="font-semibold">Penulis</label>
                        <input type="text" class="w-full border p-2 rounded">
                    </div>

                    <div>
                        <label class="font-semibold">Kategori Buku</label>
                        <select id="kategori" class="w-full border p-2 rounded">
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
                        <label class="font-semibold">Sub Kategori</label>
                        <select id="subkategori" class="w-full border p-2 rounded">
                            <option value="">Pilih Sub Kategori</option>
                        </select>
                    </div>

                    <div>
                        <label class="font-semibold">Nomor Inventaris</label>

                        <div class="w-full border p-2 rounded bg-gray-100 text-blue-600 font-mono font-semibold">
                            INV00001
                        </div>

                        <p class="text-xs text-gray-500 mt-1">
                            Akan otomatis dibuat oleh sistem
                        </p>
                    </div>

                    <div>
                        <label class="font-semibold">Penerbit</label>
                        <input type="text" class="w-full border p-2 rounded">
                    </div>

                    <div>
                        <label class="font-semibold">Tahun Terbit</label>
                        <input type="text" class="w-full border p-2 rounded">
                    </div>

                    <div class="col-span-2">
                        <label class="font-semibold">Deskripsi Buku</label>
                        <textarea class="w-full border p-2 h-24 rounded"></textarea>
                    </div>

                    <div class="col-span-2 flex items-center gap-3">
                        <label class="font-semibold">Jumlah Eksemplar</label>
                        <input type="number" class="w-20 border p-2 rounded">
                    </div>

                </div>

            </div>

            <!-- BUTTON -->
            <div class="mt-6 flex gap-4 justify-end">

                <button type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Tambah Buku
                </button>

                <button type="reset"
                        class="bg-gray-300 px-4 py-2 rounded hover:bg-gray-400">
                    Batal
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
            preview.classList.remove('w-10','h-10','opacity-30','grayscale');
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
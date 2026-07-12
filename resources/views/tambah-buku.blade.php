    @extends('layouts.app')

    @section('content')

    <div class="min-h-screen bg-slate-50 py-10 px-6 font-['Poppins']">


    <div class="max-w-5xl mx-auto">


    <!-- CARD UTAMA -->

    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">


    <!-- HEADER -->

    <div class="px-8 py-7 bg-gradient-to-r from-sky-50 to-white border-b border-slate-200">


    <span class="px-4 py-2 rounded-full text-xs font-semibold bg-blue-50 text-blue-700 border border-blue-100">
    TAMBAH KOLEKSI
    </span>


    <h1 class="text-3xl font-bold text-[#0F3D5E] mt-4">
    Tambah Koleksi Buku
    </h1>


    <p class="text-sm text-slate-500 mt-2">
    Masukkan informasi buku baru ke dalam sistem PoliBrary.
    </p>


    </div>





    <div class="p-8">


    <form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">

    @csrf



    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">

    <!-- ================= CARD SAMPUL ================= -->
    <div>

        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">

            <h3 class="text-lg font-bold text-[#0F3D5E] mb-5">
                Sampul Buku
            </h3>

            <div class="aspect-[3/4] w-full rounded-2xl border border-slate-200 bg-slate-50 overflow-hidden flex items-center justify-center">

                <img
                    id="previewImage"
                    src="{{ asset('image/Polibrary-logo.png') }}"
                    class="w-24 h-24 opacity-30 grayscale object-contain">

            </div>

            <input
                type="file"
                id="fileInput"
                name="sampul"
                accept="image/*"
                onchange="previewCover(event)"
                class="hidden">

            <label
                for="fileInput"
                class="mt-5 flex items-center justify-center w-full py-3 rounded-xl bg-sky-100 text-sky-700 font-semibold cursor-pointer hover:bg-sky-200 transition">

                Unggah Sampul

            </label>

        </div>

    </div>

    <!-- ================= FORM ================= -->
    <div class="lg:col-span-2">

        <div class="bg-slate-50 rounded-2xl border border-slate-200 p-6 space-y-6">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                <!-- Judul -->
                <div>
                    <label class="text-sm font-semibold text-slate-700">Judul Buku</label>
                    <input
                        type="text"
                        name="judul"
                        required
                        class="mt-2 w-full rounded-xl border border-slate-300 bg-white px-4 py-3">
                </div>

                <!-- ISBN -->
                <div>
                    <label class="text-sm font-semibold text-slate-700">ISBN</label>
                    <input
                        type="text"
                        name="isbn"
                        required
                        class="mt-2 w-full rounded-xl border border-slate-300 bg-white px-4 py-3">
                </div>

                <!-- Penulis -->
                <div>
                    <label class="text-sm font-semibold text-slate-700">Penulis</label>
                    <input
                        type="text"
                        name="penulis"
                        required
                        class="mt-2 w-full rounded-xl border border-slate-300 bg-white px-4 py-3">
                </div>

                <!-- Penerbit -->
                <div>
                    <label class="text-sm font-semibold text-slate-700">Penerbit</label>
                    <input
                        type="text"
                        name="penerbit"
                        required
                        class="mt-2 w-full rounded-xl border border-slate-300 bg-white px-4 py-3">
                </div>

                <!-- Kategori -->
                <div>
                    <label class="text-sm font-semibold text-slate-700">Kategori</label>

                    <select
                        id="kategori"
                        name="kategori"
                        required
                        class="mt-2 w-full rounded-xl border border-slate-300 bg-white px-4 py-3">

                        <option value="">Pilih Kategori</option>
                        <option value="fiksi">Fiksi</option>
                        <option value="nonfiksi">Non-Fiksi</option>
                        <option value="pendidikan">Pendidikan</option>
                        <option value="teknologi">Teknologi & Komputer</option>
                        <option value="sosial">Sosial & Humaniora</option>
                        <option value="agama">Agama</option>

                    </select>
                </div>

                <!-- Sub Kategori -->
                <div>
                    <label class="text-sm font-semibold text-slate-700">Sub Kategori</label>

                    <select
                        id="subkategori"
                        name="sub_kategori"
                        required
                        class="mt-2 w-full rounded-xl border border-slate-300 bg-white px-4 py-3">

                        <option value="">Pilih Sub Kategori</option>

                    </select>
                </div>

                <!-- Nomor Inventaris -->
                <div>
                    <label class="text-sm font-semibold text-slate-700">Nomor Inventaris</label>

                    <input
                        type="text"
                        value="AUTO"
                        readonly
                        class="mt-2 w-full rounded-xl border border-slate-300 bg-slate-100 px-4 py-3">
                </div>

                <!-- Nomor Rak -->
                <div>
                    <label class="text-sm font-semibold text-slate-700">Nomor Rak</label>

                    <input
                        type="text"
                        name="nomor_rak"
                        class="mt-2 w-full rounded-xl border border-slate-300 bg-white px-4 py-3">
                </div>

                <!-- Tahun -->
                <div>
                    <label class="text-sm font-semibold text-slate-700">Tahun Terbit</label>

                    <input
                        type="number"
                        name="tahun_terbit"
                        required
                        class="mt-2 w-full rounded-xl border border-slate-300 bg-white px-4 py-3">
                </div>

                <!-- Bahasa -->
                <div>
                    <label class="text-sm font-semibold text-slate-700">Bahasa</label>

                    <select
                        name="bahasa"
                        required
                        class="mt-2 w-full rounded-xl border border-slate-300 bg-white px-4 py-3">

                        <option value="">Pilih Bahasa</option>
                        <option>Indonesia</option>
                        <option>Inggris</option>
                        <option>Jepang</option>
                        <option>Korea</option>
                        <option>Arab</option>
                        <option>Mandarin</option>

                    </select>
                </div>

                <!-- Jumlah Halaman -->
                <div>
                    <label class="text-sm font-semibold text-slate-700">Jumlah Halaman</label>

                    <input
                        type="number"
                        name="jumlah_halaman"
                        required
                        class="mt-2 w-full rounded-xl border border-slate-300 bg-white px-4 py-3">
                </div>

                <!-- Jumlah Eksemplar -->
                <div>
                    <label class="text-sm font-semibold text-slate-700">Jumlah Eksemplar</label>

                    <input
                        type="number"
                        name="jumlah_eksemplar"
                        required
                        class="mt-2 w-full rounded-xl border border-slate-300 bg-white px-4 py-3">
                </div>

            </div>

            <!-- Deskripsi -->
            <div>

                <label class="text-sm font-semibold text-slate-700">
                    Deskripsi Buku
                </label>

                <textarea
                    name="deskripsi"
                    rows="5"
                    class="mt-2 w-full rounded-xl border border-slate-300 bg-white px-4 py-3"></textarea>

            </div>

        </div>

    </div>

</div>

<!-- ================= FOOTER ================= -->
<div class="mt-8 pt-6 border-t border-slate-200 flex justify-end">

    <button
        type="submit"
        class="px-7 py-3 rounded-xl bg-[#1D5D8F] hover:bg-[#174B73] text-white font-semibold transition">

        Tambah Buku

    </button>

</div>
    </div>



    </form>


    </div>


    </div>


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
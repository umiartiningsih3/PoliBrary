@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-slate-50 py-10 px-6 font-['Poppins']">

    <div class="max-w-6xl mx-auto">

        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">

            <!-- HEADER -->
            <div class="px-8 py-7 bg-gradient-to-r from-sky-50 to-white border-b border-slate-200">

                <span class="px-4 py-2 rounded-full text-xs font-semibold bg-blue-50 text-blue-700 border border-blue-100">
                    EDIT KOLEKSI
                </span>

                <h1 class="text-3xl font-bold text-[#0F3D5E] mt-4">
                    Edit Koleksi Buku
                </h1>

                <p class="text-sm text-slate-500 mt-2">
                    Perbarui informasi buku yang sudah tersedia pada sistem PoliBrary.
                </p>

            </div>

            <div class="p-8">

            @if ($errors->any())
    <div class="mb-6 rounded-xl bg-red-50 border border-red-200 p-4">
        <ul class="list-disc list-inside text-red-600">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                <form
                    action="{{ route('admin.buku.update',$buku->id) }}"
                    method="POST"
                    enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">

                    <!-- ================= CARD SAMPUL ================= -->

<div class="space-y-6">

    <!-- Card Sampul -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">

        <h3 class="text-lg font-bold text-[#0F3D5E] mb-5">
            Sampul Buku
        </h3>

        <div class="aspect-[3/4] w-full rounded-2xl border border-slate-200 bg-slate-50 overflow-hidden flex items-center justify-center">

            @if($buku->sampul)

                <img
                    id="previewImage"
                    src="{{ asset('storage/'.$buku->sampul) }}"
                    alt="{{ $buku->judul }}"
                    class="w-full h-full object-cover">

            @else

                <img
                    id="previewImage"
                    src="{{ asset('image/Polibrary-logo.png') }}"
                    alt="Default Cover"
                    class="w-24 h-24 opacity-30 grayscale object-contain">

            @endif

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

            Ganti Sampul

        </label>

    </div>


    <!-- Card Informasi -->
<div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">

    <h3 class="text-lg font-bold text-[#0F3D5E] mb-5">
        Informasi Buku
    </h3>

    <div class="space-y-6">

        <!-- Nomor Inventaris -->
        <div>

            <p class="text-sm text-slate-500">
                Nomor Inventaris
            </p>

            <p class="mt-1 text-base font-semibold text-[#1D5D8F]">
                {{ $buku->no_inventaris }}
            </p>

        </div>

        <!-- Nomor Rak -->
        <div>

            <p class="text-sm text-slate-500">
                Nomor Rak
            </p>

            <p class="mt-1 text-base font-semibold text-slate-700">
                {{ $buku->nomor_rak ?: '-' }}
            </p>

        </div>

        <!-- Status -->
        <div>

            <p class="text-sm text-slate-500 mb-2">
                Status
            </p>

            @if($buku->jumlah_eksemplar > 0)

                <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-emerald-100 text-emerald-700 text-sm font-semibold">

                    <span class="w-2 h-2 rounded-full bg-emerald-500"></span>

                    Tersedia

                </span>

            @else

                <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-red-100 text-red-700 text-sm font-semibold">

                    <span class="w-2 h-2 rounded-full bg-red-500"></span>

                    Tidak Tersedia

                </span>

            @endif

        </div>

    </div>

</div>
</div>

<!-- ================= FORM ================= -->

<div class="lg:col-span-2">

    <div class="bg-slate-50 rounded-2xl border border-slate-200 p-6 space-y-6">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

    <!-- Judul Buku -->
    <div>
        <label class="text-sm font-semibold text-slate-700">
            Judul Buku
        </label>

        <input
            type="text"
            name="judul"
            value="{{ old('judul',$buku->judul) }}"
            required
            class="mt-2 w-full rounded-xl border border-slate-300 bg-white px-4 py-3 focus:border-sky-400 focus:ring-4 focus:ring-sky-100">
    </div>

    <!-- ISBN -->
    <div>
        <label class="text-sm font-semibold text-slate-700">
            ISBN
        </label>

        <input
            type="text"
            name="isbn"
            value="{{ old('isbn',$buku->isbn) }}"
            required
            class="mt-2 w-full rounded-xl border border-slate-300 bg-white px-4 py-3 focus:border-sky-400 focus:ring-4 focus:ring-sky-100">
    </div>

    <!-- Penulis -->
    <div>
        <label class="text-sm font-semibold text-slate-700">
            Penulis
        </label>

        <input
            type="text"
            name="penulis"
            value="{{ old('penulis',$buku->penulis) }}"
            required
            class="mt-2 w-full rounded-xl border border-slate-300 bg-white px-4 py-3 focus:border-sky-400 focus:ring-4 focus:ring-sky-100">
    </div>

    <!-- Penerbit -->
    <div>
        <label class="text-sm font-semibold text-slate-700">
            Penerbit
        </label>

        <input
            type="text"
            name="penerbit"
            value="{{ old('penerbit',$buku->penerbit) }}"
            required
            class="mt-2 w-full rounded-xl border border-slate-300 bg-white px-4 py-3 focus:border-sky-400 focus:ring-4 focus:ring-sky-100">
    </div>

    <!-- Kategori -->
    <div>
        <label class="text-sm font-semibold text-slate-700">
            Kategori
        </label>

        <select
            id="kategori"
            name="kategori"
            class="mt-2 w-full rounded-xl border border-slate-300 bg-white px-4 py-3">

            <option value="">Pilih Kategori</option>

            <option value="fiksi" {{ old('kategori',$buku->kategori)=='fiksi'?'selected':'' }}>Fiksi</option>

            <option value="nonfiksi" {{ old('kategori',$buku->kategori)=='nonfiksi'?'selected':'' }}>Non-Fiksi</option>

            <option value="pendidikan" {{ old('kategori',$buku->kategori)=='pendidikan'?'selected':'' }}>Pendidikan</option>

            <option value="teknologi" {{ old('kategori',$buku->kategori)=='teknologi'?'selected':'' }}>Teknologi & Komputer</option>

            <option value="sosial" {{ old('kategori',$buku->kategori)=='sosial'?'selected':'' }}>Sosial & Humaniora</option>

            <option value="agama" {{ old('kategori',$buku->kategori)=='agama'?'selected':'' }}>Agama</option>

        </select>
    </div>

    <!-- Sub Kategori -->
    <div>

        <label class="text-sm font-semibold text-slate-700">
            Sub Kategori
        </label>

        <select
            id="subkategori"
            name="sub_kategori"
            class="mt-2 w-full rounded-xl border border-slate-300 bg-white px-4 py-3">

            <option value="{{ $buku->sub_kategori }}">
                {{ $buku->sub_kategori }}
            </option>

        </select>

    </div>

    <!-- Nomor Inventaris -->
    <div>

        <label class="text-sm font-semibold text-slate-700">
            Nomor Inventaris
        </label>

        <input
            type="text"
            readonly
            name="no_inventaris"
            value="{{ $buku->no_inventaris }}"
            class="mt-2 w-full rounded-xl border border-slate-300 bg-slate-100 px-4 py-3">

    </div>

    <!-- Nomor Rak -->
    <div>

        <label class="text-sm font-semibold text-slate-700">
            Nomor Rak
        </label>

        <input
            type="text"
            name="nomor_rak"
            value="{{ old('nomor_rak',$buku->nomor_rak) }}"
            class="mt-2 w-full rounded-xl border border-slate-300 bg-white px-4 py-3">

    </div>

    <!-- Tahun -->
    <div>

        <label class="text-sm font-semibold text-slate-700">
            Tahun Terbit
        </label>

        <input
            type="number"
            name="tahun_terbit"
            value="{{ old('tahun_terbit',$buku->tahun_terbit) }}"
            class="mt-2 w-full rounded-xl border border-slate-300 bg-white px-4 py-3">

    </div>

    <!-- Bahasa -->
    <div>

        <label class="text-sm font-semibold text-slate-700">
            Bahasa
        </label>

        <select
            name="bahasa"
            class="mt-2 w-full rounded-xl border border-slate-300 bg-white px-4 py-3">

            <option value="Indonesia" {{ old('bahasa',$buku->bahasa)=='Indonesia'?'selected':'' }}>Indonesia</option>

            <option value="Inggris" {{ old('bahasa',$buku->bahasa)=='Inggris'?'selected':'' }}>Inggris</option>

            <option value="Jepang" {{ old('bahasa',$buku->bahasa)=='Jepang'?'selected':'' }}>Jepang</option>

            <option value="Korea" {{ old('bahasa',$buku->bahasa)=='Korea'?'selected':'' }}>Korea</option>

            <option value="Arab" {{ old('bahasa',$buku->bahasa)=='Arab'?'selected':'' }}>Arab</option>

        </select>

    </div>

    <!-- Jumlah Halaman -->
    <div>

        <label class="text-sm font-semibold text-slate-700">
            Jumlah Halaman
        </label>

        <input
            type="number"
            name="jumlah_halaman"
            value="{{ old('jumlah_halaman',$buku->jumlah_halaman) }}"
            class="mt-2 w-full rounded-xl border border-slate-300 bg-white px-4 py-3">

    </div>

    <!-- Jumlah Eksemplar -->
    <div>

        <label class="text-sm font-semibold text-slate-700">
            Jumlah Eksemplar
        </label>

        <input
            type="number"
            name="jumlah_eksemplar"
            value="{{ old('jumlah_eksemplar',$buku->jumlah_eksemplar) }}"
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
        class="mt-2 w-full rounded-xl border border-slate-300 bg-white px-4 py-3">{{ old('deskripsi',$buku->deskripsi) }}</textarea>

</div>

    </div>

</div>

    </div> {{-- tutup bg-slate-50 --}}
</div> {{-- tutup lg:col-span-2 --}}
</div> {{-- tutup grid --}}


<!-- ================= FOOTER ================= -->

<div class="mt-8 pt-6 border-t border-slate-200 flex justify-end gap-4">

    <a href="{{ route('admin.buku.index') }}"
        class="px-6 py-3 rounded-xl border border-slate-300 text-slate-600 hover:bg-slate-100 transition">
        Batal
    </a>

    <button
        type="submit"
        class="px-7 py-3 rounded-xl bg-[#1D5D8F] hover:bg-[#174B73] text-white font-semibold transition">
        Simpan Perubahan
    </button>

</div>

</form>

</div>
</div>
</div>

@endsection


@push('scripts')

<script>

function previewCover(event){

    const input = event.target;
    const preview = document.getElementById('previewImage');

    if(input.files && input.files[0]){

        const reader = new FileReader();

        reader.onload = function(e){

            preview.src = e.target.result;

            preview.classList.remove(
                'w-20',
                'h-20',
                'opacity-30',
                'grayscale'
            );

            preview.classList.add(
                'w-full',
                'h-full',
                'object-cover'
            );

        }

        reader.readAsDataURL(input.files[0]);

    }

}

document.addEventListener("DOMContentLoaded",function(){

    const kategori = document.getElementById("kategori");
    const subkategori = document.getElementById("subkategori");

    const data = {

        fiksi:[
            "Novel",
            "Cerpen",
            "Fantasi",
            "Romansa",
            "Misteri",
            "Thriller",
            "Horor",
            "Sci-fi"
        ],

        nonfiksi:[
            "Biografi",
            "Autobiografi",
            "Sejarah",
            "Motivasi",
            "Esai",
            "Jurnal"
        ],

        pendidikan:[
            "Buku Pelajaran",
            "Modul Kuliah",
            "Soal Latihan",
            "Panduan Belajar"
        ],

        teknologi:[
            "Pemrograman",
            "Web",
            "Mobile",
            "Database",
            "AI"
        ],

        sosial:[
            "Ekonomi",
            "Psikologi",
            "Sosiologi",
            "Hukum"
        ],

        agama:[
            "Islam",
            "Kristen",
            "Hindu",
            "Buddha"
        ]

    };

    function loadSubKategori(selectedKategori, selectedSubKategori){

        subkategori.innerHTML =
            '<option value="">Pilih Sub Kategori</option>';

        if(data[selectedKategori]){

            data[selectedKategori].forEach(function(item){

                let option = document.createElement("option");

                option.value = item;
                option.textContent = item;

                if(item === selectedSubKategori){
                    option.selected = true;
                }

                subkategori.appendChild(option);

            });

        }

    }

    loadSubKategori(
        "{{ old('kategori',$buku->kategori) }}",
        "{{ old('sub_kategori',$buku->sub_kategori) }}"
    );

    kategori.addEventListener("change",function(){

        loadSubKategori(this.value,'');

    });

});

</script>

@endpush
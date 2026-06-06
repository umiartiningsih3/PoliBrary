@extends('layouts.app')

@section('content')
<div class="bg-gray-50 min-h-screen py-10 px-4 md:px-12">
    <div class="max-w-7xl mx-auto">
        
        <div class="bg-white p-6 md:p-8 rounded-xl shadow-sm border border-gray-100">
            <div class="mb-8 border-b pb-4 flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Daftar Mahasiswa</h1>
                    <p class="text-sm text-gray-500">Kelola data anggota mahasiswa yang terdaftar di sistem.</p>
                </div>
                <a href="{{ route('admin.mahasiswa.register') }}" class="bg-pink-600 text-white px-5 py-2 rounded-lg text-sm font-bold hover:bg-pink-700 transition">
                    + Tambah Mahasiswa
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm">
    <thead class="bg-gray-50 text-gray-500 text-[10px] uppercase font-bold tracking-wider">
        <tr>
            <th class="px-6 py-4 text-left">Nama</th>
            <th class="px-6 py-4 text-left">NIM</th>
            <th class="px-6 py-4 text-left">Prodi</th>
            <th class="px-6 py-4 text-center">Aksi</th> </tr>
    </thead>

    <tbody class="divide-y divide-gray-100">
        @forelse($mahasiswas as $mhs)
        <tr class="hover:bg-gray-50/50 transition">
            <td class="px-6 py-5 font-bold text-gray-800">{{ $mhs->name }}</td>
<td class="px-6 py-5 text-gray-600 font-mono">{{ $mhs->nim }}</td>
<td class="px-6 py-5 text-gray-600">{{ $mhs->prodi }}</td>

<td class="px-6 py-5 text-center">
    <div class="flex flex-row items-center justify-center gap-4 w-full">
        {{-- Tombol Edit --}}
        <button type="button" 
                onclick="bukaModalEdit({{ $mhs->id }})" 
                class="text-blue-600 hover:text-blue-900 font-bold hover:underline">
            Edit
        </button>
        
        {{-- Garis Pembatas Tipis (Opsional, biar makin rapi) --}}
        <span class="text-gray-300">|</span>

        {{-- Form Hapus --}}
        <form action="{{ route('admin.mahasiswa.destroy', $mhs->id) }}" method="POST" 
              onsubmit="return confirm('Yakin ingin menghapus?')" class="inline-block m-0 p-0">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-600 font-bold hover:underline">Hapus</button>
        </form>
    </div>
</td>
        </tr>
        @empty
        <tr>
            <td colspan="4" class="px-6 py-10 text-center text-gray-500">Belum ada data mahasiswa.</td>
        </tr>
        @endforelse
    </tbody>
</table>
            </div>
        </div>
        
    </div>
</div>
@endsection

<div id="edit-modal" class="fixed inset-0 z-50 hidden bg-slate-900/50 backdrop-blur-sm flex items-center justify-center p-4 opacity-0 transition-opacity duration-300 ease-out">
    <div id="modal-content" class="bg-white rounded-xl shadow-2xl w-full max-w-md overflow-hidden transform scale-95 opacity-0 transition-all duration-300 ease-out">
        
        <div class="px-6 py-4 bg-slate-50 border-b border-gray-100 flex justify-between items-center">
            <h3 class="text-lg font-bold text-slate-800">Edit Data Anggota</h3>
            <button type="button" onclick="closeModal()" class="text-gray-400 hover:text-gray-600 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        
        <form id="edit-form" method="POST" action="">
            @csrf
            @method('PUT')
            <div class="p-6 space-y-4">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Nama</label>
                    <input type="text" id="edit-name" name="name" class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-[#0052cc] transition-all" required>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">NIM</label>
                    <input type="text" id="edit-nim" name="nim" class="w-full px-3 py-2 border border-slate-200 rounded-lg bg-slate-50 text-gray-400 font-mono" readonly>
                </div>
                
                {{-- Dropdown Program Studi Sesuai Pilihan Anda --}}
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Program Studi</label>
                    <select id="edit-prodi" name="prodi" class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-[#0052cc] bg-white transition-all" required>
                        <option value="" disabled selected>-- Pilih Program Studi --</option>
                        <option value="D3 Teknik Informatika">D3 Teknik Informatika</option>
                        <option value="D3 Teknik Geomatika">D3 Teknik Geomatika</option>
                        <option value="D4 Teknik Rekayasa Perangkat Lunak">D4 Teknik Rekayasa Perangkat Lunak</option>
                        <option value="D4 Animasi">D4 Animasi</option>
                        <option value="D4 Teknologi Rekayasa Multimedia">D4 Teknologi Rekayasa Multimedia</option>
                        <option value="D4 Rekayasa Keamanan Siber">D4 Rekayasa Keamanan Siber</option>
                    </select>
                </div>
            </div>
            
            <div class="px-6 py-4 bg-slate-50 border-t border-gray-100 flex justify-end gap-3">
                <button type="button" onclick="closeModal()" class="px-4 py-2 text-sm font-medium text-slate-600 bg-white border border-slate-300 rounded-lg hover:bg-slate-50 transition-colors">Batal</button>
                <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-[#0052cc] rounded-lg hover:bg-blue-700 shadow-sm shadow-blue-500/20 transition-colors">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>

<script>
    function bukaModalEdit(id) {
        let url = `/admin/mahasiswa/${id}/edit`;
        
        fetch(url)
            .then(response => {
                if (!response.ok) {
                    return fetch(`/mahasiswa/${id}/edit`).then(res => res.json());
                }
                return response.json();
            })
            .then(data => {
                document.getElementById('edit-name').value = data.name;
                document.getElementById('edit-nim').value = data.nim;
                
                // Mengunci pilihan dropdown sesuai data prodi mahasiswa dari database
                document.getElementById('edit-prodi').value = data.prodi;
                
                let formAction = url.includes('admin') ? `/admin/mahasiswa/${id}` : `/mahasiswa/${id}`;
                document.getElementById('edit-form').setAttribute('action', formAction);
                
                // --- PROSES ANIMASI MASUK ---
                const modal = document.getElementById('edit-modal');
                const content = document.getElementById('modal-content');
                
                modal.classList.remove('hidden');
                
                setTimeout(() => {
                    modal.classList.remove('opacity-0');
                    modal.classList.add('opacity-100');
                    
                    content.classList.remove('scale-95', 'opacity-0');
                    content.classList.add('scale-100', 'opacity-100');
                }, 10);
            })
            .catch(error => {
                console.error("Gagal memuat data:", error);
                alert("Gagal mengambil data mahasiswa dari sistem.");
            });
    }

    function closeModal() {
        const modal = document.getElementById('edit-modal');
        const content = document.getElementById('modal-content');
        
        modal.classList.remove('opacity-100');
        modal.classList.add('opacity-0');
        
        content.classList.remove('scale-100', 'opacity-100');
        content.classList.add('scale-95', 'opacity-0');
        
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }

    window.onclick = function(event) {
        const modal = document.getElementById('edit-modal');
        if (event.target == modal) {
            closeModal();
        }
    }
</script>
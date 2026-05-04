<div id="popup" 
class="fixed inset-0 bg-black/40 backdrop-blur-sm flex items-center justify-center hidden z-50">

    <div class="bg-white w-[650px] rounded shadow transform transition duration-300 scale-95 opacity-0 overflow-hidden"
         id="popupBox">

        <!-- ================= HEADER ================= -->
        <div class="relative bg-pink-400 text-white p-4 flex justify-between items-center overflow-hidden">

            <!-- Text -->
            <div class="relative z-10 pr-20">
                <h3 class="font-bold text-lg">Pertama kali berkunjung?</h3>
                <p class="text-sm">Selamat datang di FUDi-gital.</p>
            </div>

            <!-- Gambar kanan atas -->
            <img src="{{ asset('image/informasi-bg.png') }}"
                 alt="Informasi"
                 class="absolute top-0 right-12 h-full w-auto opacity-100 pointer-events-none">

            <!-- Tombol Close -->
            <button onclick="closePopup()"
                    class="relative z-20 text-xl font-bold hover:scale-110 transition ml-4">
                ✕
            </button>
        </div>

        <!-- ================= CONTENT ================= -->
        <div class="grid grid-cols-2 gap-8 p-6 text-center text-sm">

            <!-- Jam Operasional -->
            <a href="#" class="group transition transform hover:-translate-y-2 hover:scale-105 active:scale-95">
                <div class="flex justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="h-12 w-12 text-pink-500 group-hover:text-pink-600 transition"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <p class="font-semibold mt-2 group-hover:text-pink-600">
                    Jam Operasional
                </p>
            </a>

            <!-- Panduan Pengguna -->
            <a href="#" class="group transition transform hover:-translate-y-2 hover:scale-105 active:scale-95">
                <div class="flex justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="h-12 w-12 text-pink-500 group-hover:text-pink-600 transition"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <circle cx="12" cy="8" r="4" stroke-width="2"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 20c0-4 4-6 8-6s8 2 8 6"/>
                    </svg>
                </div>
                <p class="font-semibold mt-2 group-hover:text-pink-600">
                    Panduan Pengguna
                </p>
            </a>

            <!-- FAQ -->
            <a href="#" class="group transition transform hover:-translate-y-2 hover:scale-105 active:scale-95">
                <div class="flex justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="h-12 w-12 text-pink-500 group-hover:text-pink-600 transition"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M8 10h8M8 14h5m-9 6l3-3h11a2 2 0 002-2V7a2 2 0 00-2-2H6a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <p class="font-semibold mt-2 group-hover:text-pink-600">
                    FAQ
                </p>
            </a>

            <!-- Cari -->
            <a href="#" class="group transition transform hover:-translate-y-2 hover:scale-105 active:scale-95">
                <div class="flex justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="h-12 w-12 text-pink-500 group-hover:text-pink-600 transition"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M21 21l-4.35-4.35M16 10a6 6 0 11-12 0 6 6 0 0112 0z"/>
                    </svg>
                </div>
                <p class="font-semibold mt-2 group-hover:text-pink-600">
                    Cari - Pinjam - Kembalikan
                </p>
            </a>

        </div>
    </div>
</div>
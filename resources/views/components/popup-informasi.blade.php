<div id="popup" 
class="fixed inset-0 bg-black/40 backdrop-blur-sm flex items-center justify-center hidden z-50">

    <div class="bg-white w-[650px] rounded shadow transform transition duration-300 scale-95 opacity-0" id="popupBox">

        <!-- Header -->
        <div class="bg-pink-400 text-white p-4 flex justify-between items-center">
            <div>
                <h3 class="font-bold text-lg">Pertama kali berkunjung?</h3>
                <p class="text-sm">Selamat datang di FUDi-gital.</p>
            </div>
            <button onclick="closePopup()" class="text-xl">✕</button>
        </div>

        <!-- Content -->
        <div class="grid grid-cols-2 gap-8 p-6 text-center text-sm">

            <div>
                <div class="text-pink-500 text-4xl">🕒</div>
                <p class="font-semibold mt-2">Jam Operasional</p>
            </div>

            <div>
                <div class="text-pink-500 text-4xl">👤</div>
                <p class="font-semibold mt-2">Panduan Pengguna</p>
            </div>

            <div>
                <div class="text-pink-500 text-4xl">💬</div>
                <p class="font-semibold mt-2">FAQ</p>
            </div>

            <div>
                <div class="text-pink-500 text-4xl">🔍</div>
                <p class="font-semibold mt-2">Cari - Pinjam - Kembalikan</p>
            </div>

        </div>
    </div>
</div>
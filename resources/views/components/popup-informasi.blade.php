<div id="popup"
    class="fixed inset-0 bg-black/40 backdrop-blur-sm flex items-center justify-center hidden z-50 px-4">

    <!-- BOX -->
    <div id="popupBox"
        class="bg-white w-full max-w-2xl rounded-3xl shadow-2xl overflow-hidden
               transform transition-all duration-300 scale-95 opacity-0">

        <!-- ================= HEADER ================= -->
        <div class="relative bg-gradient-to-r from-[#47B8F2] to-[#12376B]
                    text-white px-6 py-5 overflow-hidden">

            <!-- Decorative Circle -->
            <div class="absolute -top-10 -right-10 w-40 h-40 bg-white/10 rounded-full"></div>
            <div class="absolute -bottom-10 right-16 w-28 h-28 bg-white/10 rounded-full"></div>

            <!-- Text -->
            <div class="relative z-10 pr-24">
                <h3 class="font-bold text-2xl">
                    Pertama kali berkunjung?
                </h3>

                <p class="text-sm md:text-base text-blue-100 mt-1">
                    Selamat datang di <span class="font-semibold">PoliBrary</span>,
                    Digital Library Polibatam.
                </p>
            </div>

            <!-- Illustration -->
            <img src="{{ asset('image/informasi-bg.png') }}"
                alt="Informasi"
                class="absolute right-10 bottom-0 h-28 opacity-95 pointer-events-none hidden md:block">

            <!-- Close -->
            <button onclick="closePopup()"
                    class="absolute top-4 right-4 w-10 h-10 rounded-full
                           bg-white/20 hover:bg-white/30 backdrop-blur-md
                           transition duration-300 flex items-center justify-center text-xl font-bold">
                ✕
            </button>

        </div>

        <!-- ================= CONTENT ================= -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-5 p-6 md:p-8 text-center">

            <!-- Jam Operasional -->
            <a href="#"
               class="group bg-gray-50 hover:bg-blue-50 rounded-2xl p-5
                      transition duration-300 hover:-translate-y-2 border border-transparent hover:border-blue-100">

                <div class="flex justify-center">
                    <div class="w-16 h-16 rounded-2xl bg-blue-100 flex items-center justify-center
                                group-hover:bg-blue-200 transition">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-8 w-8 text-[#12376B]"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>

                <p class="font-semibold mt-4 text-gray-700 group-hover:text-[#12376B]">
                    Jam Operasional
                </p>
            </a>

            <!-- Panduan -->
            <a href="#"
               class="group bg-gray-50 hover:bg-blue-50 rounded-2xl p-5
                      transition duration-300 hover:-translate-y-2 border border-transparent hover:border-blue-100">

                <div class="flex justify-center">
                    <div class="w-16 h-16 rounded-2xl bg-blue-100 flex items-center justify-center
                                group-hover:bg-blue-200 transition">

                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-8 w-8 text-[#12376B]"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">

                            <circle cx="12" cy="8" r="4" stroke-width="2"/>
                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M4 20c0-4 4-6 8-6s8 2 8 6"/>
                        </svg>

                    </div>
                </div>

                <p class="font-semibold mt-4 text-gray-700 group-hover:text-[#12376B]">
                    Panduan
                </p>
            </a>

            <!-- FAQ -->
            <a href="#"
               class="group bg-gray-50 hover:bg-blue-50 rounded-2xl p-5
                      transition duration-300 hover:-translate-y-2 border border-transparent hover:border-blue-100">

                <div class="flex justify-center">
                    <div class="w-16 h-16 rounded-2xl bg-blue-100 flex items-center justify-center
                                group-hover:bg-blue-200 transition">

                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-8 w-8 text-[#12376B]"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M8 10h8M8 14h5m-9 6l3-3h11a2 2 0 002-2V7a2 2 0 00-2-2H6a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>

                    </div>
                </div>

                <p class="font-semibold mt-4 text-gray-700 group-hover:text-[#12376B]">
                    FAQ
                </p>
            </a>

            <!-- Cari -->
            <a href="#"
               class="group bg-gray-50 hover:bg-blue-50 rounded-2xl p-5
                      transition duration-300 hover:-translate-y-2 border border-transparent hover:border-blue-100">

                <div class="flex justify-center">
                    <div class="w-16 h-16 rounded-2xl bg-blue-100 flex items-center justify-center
                                group-hover:bg-blue-200 transition">

                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-8 w-8 text-[#12376B]"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M21 21l-4.35-4.35M16 10a6 6 0 11-12 0 6 6 0 0112 0z"/>
                        </svg>

                    </div>
                </div>

                <p class="font-semibold mt-4 text-gray-700 group-hover:text-[#12376B]">
                    Cari Buku
                </p>
            </a>

        </div>

    </div>

</div>
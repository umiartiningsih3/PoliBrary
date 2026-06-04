<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi OTP | Polibrary</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body>

<div class="min-h-screen flex items-center justify-center bg-cover bg-center relative px-4"
     style="background-image: url('/image/login-bg.png')">

    <div class="absolute inset-0 bg-white/50 backdrop-blur-[2px]"></div>

    <div class="relative z-10 w-full max-w-md">

        <div class="bg-sky-200/70 backdrop-blur-md border border-white/40
                    rounded-[34px] shadow-2xl px-8 py-12">

            <div class="text-center mb-6">
                <h2 class="text-3xl font-bold text-blue-800">Verifikasi OTP</h2>
                <p class="text-gray-600 mt-2 text-sm">Masukkan kode OTP yang dikirim</p>
            </div>

            <div class="border-t border-white/40 mb-6"></div>

            <form action="{{ route('otp.verify') }}" method="POST">
                @csrf

                <input type="text" 
                    name="otp"
                    maxlength="6"
                    placeholder="------"
                    required
                    class="w-full mb-6 px-4 py-3 text-center text-2xl tracking-[10px] rounded-xl bg-white/90 border border-gray-300 outline-none focus:ring-2 focus:ring-sky-400 transition">

                <button type="submit" 
                    class="w-full bg-sky-400 hover:bg-sky-500 text-white py-3 rounded-full font-bold transition duration-300 shadow-lg">
                    Verifikasi
                </button>
            </form>

        </div>
    </div>
</div>

</body>
</html>
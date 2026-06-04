<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLogin()
    {
        return view('auth.login'); // Pastikan file login.blade.php ada di folder resources/views/auth/
    }

    // Menangani proses login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'nim' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'nim' => 'NIM atau password salah.',
        ]);
    }

    // Menampilkan halaman lupa password
    public function showForgotPassword()
    {
        return view('auth.forgot-password'); // Pastikan ini adalah file blade yang baru kita buat
    }

    // Logika kirim OTP
    public function sendOtp(Request $request)
    {
        // Logika verifikasi NIM, Tanggal Lahir, dan Jawaban Keamanan akan di sini
        return "OTP telah dikirim.";
    }
}
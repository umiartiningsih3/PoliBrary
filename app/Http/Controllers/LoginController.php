<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
{
    $credentials = $request->validate([
        'nim' => ['required', 'string'],
        'password' => ['required'],
    ]);

    // Di dalam LoginController.php
if (Auth::attempt($credentials)) {
    $request->session()->regenerate();
    $user = Auth::user();

    // Logika pengalihan berdasarkan peran
    if ($user->tipe_keanggotaan === 'petugas') {
        return redirect()->route('admin.dashboard'); // Ke admin
    }
            
    return redirect('dashboard'); // Ke dashboard mahasiswa/dosen
}

    return back()->withErrors([
        'nim' => 'NIM atau password salah.',
    ]);
}
}
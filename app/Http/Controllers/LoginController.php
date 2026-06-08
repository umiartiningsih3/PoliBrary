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

    if (Auth::attempt($credentials)) {
        $user = Auth::user();

        // Debug: Pastikan data benar
        $role = strtolower(trim($user->tipe_keanggotaan));

        // Jika petugas, arahkan ke admin/dashboard
        if ($role === 'petugas') {
    return redirect()->to('/admin/dashboard'); 
} 

return redirect()->to('/dashboard');
    }

    return back()->withErrors([
        'nim' => 'NIM atau password salah.',
    ]);
}
}
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
        $request->session()->regenerate();

        $user = Auth::user();

        $role = strtolower(trim($user->tipe_keanggotaan));

        if ($role === 'petugas') {
            return redirect()->intended('admin/dashboard');
        } 
        
        return redirect()->intended('dashboard');
    }

    return back()->withErrors([
        'nim' => 'NIM atau password salah.',
    ]);
}
}
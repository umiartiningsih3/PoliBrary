<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
{
    $credentials = $request->validate([
        'nim' => ['required', 'string'],
        'password' => ['required'],
    ]);

    if (Auth::attempt(['nim' => $request->nim, 'password' => $request->password])) {
        $request->session()->regenerate();
        return redirect()->intended('dashboard');
    }

    return back()->withErrors([
        'nim' => 'NIM atau password salah.',
    ])->onlyInput('nim');
}

    public function verifyForOtp(Request $request)
    {
        $request->validate([
            'nim' => 'required',
            'tgl_lahir' => 'required|date',
            'security_answer' => 'required'
        ]);


        $user = User::where('nim', $request->nim)
                    ->where('tgl_lahir', $request->tgl_lahir)
                    ->where('security_answer', $request->security_answer)
                    ->first();

        if ($user) {
            // Di sini Anda bisa mengarahkan ke halaman input OTP atau reset password
            return redirect()->route('password.reset.form', ['user' => $user->id])
                             ->with('success', 'Data valid, silakan buat password baru.');
        }

        return back()->withErrors(['error' => 'Data verifikasi tidak cocok.']);
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
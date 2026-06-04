<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasswordController extends Controller
{
    public function showForm()
    {
        return view('auth.reset-password');
    }

    public function update(Request $request)
    {
        // Logika untuk mengubah password ada di sini
        $request->validate([
            'password' => 'required|confirmed|min:8',
        ]);

        // Proses update password ke database...

        return redirect()->route('login')->with('success', 'Password berhasil diubah!');
    }
}
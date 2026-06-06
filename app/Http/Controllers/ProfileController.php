<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // Menampilkan halaman profil
    public function edit()
    {
        return view('profile'); // sesuaikan dengan nama file blade Anda (misal: profile.blade.php)
    }

    // Memproses perubahan data profil
    public function update(Request $request)
    {
        $user = Auth::user();

        // 1. Validasi Input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:15',
            'tanggal_lahir' => 'nullable|date',
            'security_question' => 'nullable|string',
            'security_answer' => 'nullable|string',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:1024', // maks 1MB
        ]);

        // 2. Handle Upload Foto Profil (Jika ada foto baru)
        if ($request->hasFile('avatar')) {
            // Hapus foto lama jika ada di storage
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }

            // Simpan foto baru ke folder storage/app/public/avatars
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $avatarPath;
        }

        // 3. Update Data Lainnya
        $user->name = $request->name;
        $user->email = $request->email;
        $user->no_telp = $request->phone;
        $user->tgl_lahir = $request->tanggal_lahir;
        $user->security_question = $request->security_question;
        $user->security_answer = $request->security_answer;
        
        $user->save();

        return redirect()->back()->with('success', 'Profil Anda berhasil diperbarui!');
    }
}
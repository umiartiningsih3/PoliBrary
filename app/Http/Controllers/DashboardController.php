<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Peminjaman; // Pastikan model ini ada

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Mengambil data peminjaman milik user yang sedang login saja
        $data = [
            'peminjaman_aktif' => Peminjaman::where('user_id', $user->id)
                                          ->where('status', 'dipinjam')
                                          ->get(),
            'riwayat' => Peminjaman::where('user_id', $user->id)
                                  ->orderBy('created_at', 'desc')
                                  ->limit(5)
                                  ->get(),
            'jumlah_peminjaman' => Peminjaman::where('user_id', $user->id)
                                            ->where('status', 'dipinjam')
                                            ->count(),
        ];

        // Mengarahkan ke view: resources/views/dashboard.blade.php
        return view('dashboard');
    }
}
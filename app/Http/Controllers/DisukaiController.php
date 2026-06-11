<?php

namespace App\Http\Controllers;

use App\Models\Disukai;
use Illuminate\Http\Request;

class DisukaiController extends Controller
{
    public function tambah(Request $request)
    {
        Disukai::firstOrCreate([
            'user_id' => auth()->id(),
            'buku_id' => $request->buku_id
        ]);

        return back()->with('success', 'Buku ditambahkan ke favorit');
    }

    public function index()
    {
        $favorit = Disukai::with('buku')
            ->where('user_id', auth()->id())
            ->get();

        return view('disukai-saya', compact('favorit'));
    }
}
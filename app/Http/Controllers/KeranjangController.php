<?php

namespace App\Http\Controllers;
use App\Models\Keranjang;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    public function tambah(Request $request)
    {
        Keranjang::firstOrCreate([
            'user_id' => auth()->id(),
            'buku_id' => $request->buku_id
        ]);

        return back()->with('success', 'Buku ditambahkan ke keranjang');
    }

    public function index()
    {
        $keranjang = Keranjang::with('buku')
            ->where('user_id', auth()->id())
            ->get();

        return view('keranjang', compact('keranjang'));
    }

    public function hapus($id)
{
    Keranjang::where('id', $id)
        ->where('user_id', auth()->id())
        ->delete();

    return back();
}
}
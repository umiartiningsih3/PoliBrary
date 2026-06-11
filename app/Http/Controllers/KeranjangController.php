<?php

namespace App\Http\Controllers;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use App\Models\Peminjaman;
use Carbon\Carbon;

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

    public function pinjam(Request $request)
{
    $request->validate([
        'keranjang_ids' => 'required|array'
    ]);

    $items = Keranjang::with('buku')
        ->whereIn('id', $request->keranjang_ids)
        ->get();

    foreach ($items as $item) {

        Peminjaman::create([
    'user_id' => auth()->id(),
    'buku_id' => $item->buku_id,
    'status' => 'Menunggu Konfirmasi',
    'tgl_jatuh_tempo' => now()->addDays(7)
]);

        $item->delete(); // hapus dari keranjang setelah dipinjam
    }

    return redirect()
        ->route('pinjaman-saya')
        ->with('success', 'Buku berhasil dipinjam.');
}
}
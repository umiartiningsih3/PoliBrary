<?php

namespace App\Http\Controllers;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use App\Models\Peminjaman;
use Carbon\Carbon;
use App\Models\User;
use App\Notifications\PeminjamanNotification;
use App\Models\Buku;

class KeranjangController extends Controller
{

public function tambah(Request $request)
{
    $buku = Buku::findOrFail($request->buku_id);

    if ($buku->jumlah_eksemplar <= 0) {
        return back()->with('error', 'Maaf, buku ini sedang tidak tersedia.');
    }

    Keranjang::firstOrCreate([
        'user_id' => auth()->id(),
        'buku_id' => $request->buku_id,
    ]);

    return redirect()
        ->route('keranjang')
        ->with('success', 'Buku berhasil ditambahkan ke keranjang.');
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
    'tgl_jatuh_tempo' => now()->addDays(3)
]);

$admins = User::where(
    'tipe_keanggotaan',
    'petugas'
)->get();


foreach($admins as $admin){

    $admin->notify(
        new PeminjamanNotification(

            'Permintaan Peminjaman',

            'Permintaan peminjaman oleh ' .
            auth()->user()->name .
            ' (NIM: ' .
            auth()->user()->nim .
            ') untuk buku "' .
            $item->buku->judul .
            '".'

        )
    );

}   

        $item->delete(); // hapus dari keranjang setelah dipinjam
    }

    return redirect()
        ->route('pinjaman-saya')
        ->with('success', 'Buku berhasil dipinjam.');
}
}
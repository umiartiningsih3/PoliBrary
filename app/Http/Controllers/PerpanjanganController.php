<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Perpanjangan;
use Carbon\Carbon;

class PerpanjanganController extends Controller
{
    public function index()
{
    $perpanjangans = Perpanjangan::with([
        'peminjaman.mahasiswa',
        'peminjaman.buku'
    ])
    ->where('status', 'menunggu')
    ->get();

    return view(
        'admin.perpanjangan.index',
        compact('perpanjangans')
    );
}

    public function approve($id)
{
    $perpanjangan = Perpanjangan::findOrFail($id);

    $pinjam = $perpanjangan->peminjaman;


    // update data peminjaman
    $pinjam->update([
        'tgl_jatuh_tempo' => $perpanjangan->jatuh_tempo_baru,
        'status' => 'Dipinjam',
        'jumlah_perpanjangan' => ($pinjam->jumlah_perpanjangan ?? 0) + 1
    ]);


    // update status perpanjangan
    $perpanjangan->update([
        'status' => 'disetujui'
    ]);


    return back()->with(
        'success',
        'Perpanjangan berhasil disetujui'
    );
}

    public function reject($id)
{
    $perpanjangan = Perpanjangan::findOrFail($id);

    $perpanjangan->update([
        'status' => 'ditolak'
    ]);

    return back()->with(
        'success',
        'Perpanjangan ditolak'
    );
}
}
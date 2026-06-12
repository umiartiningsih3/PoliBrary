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

    $pinjam->update([
        'tgl_jatuh_tempo' => Carbon::parse(
            $pinjam->tgl_jatuh_tempo
        )->addDays(7)
    ]);

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
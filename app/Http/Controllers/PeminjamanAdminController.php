<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;

class PeminjamanAdminController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::with([
            'mahasiswa',
            'buku'
        ])
        ->where('status', 'Menunggu Konfirmasi')
        ->get();

        return view('admin.peminjaman', compact('peminjaman'));
    }

    public function approve($id)
    {
        $pinjam = Peminjaman::findOrFail($id);

        $pinjam->update([
            'status' => 'Dipinjam'
        ]);

        return back()->with(
            'success',
            'Peminjaman berhasil disetujui'
        );
    }

    public function reject($id)
    {
        $pinjam = Peminjaman::findOrFail($id);

        $pinjam->update([
            'status' => 'Ditolak'
        ]);

        return back()->with(
            'success',
            'Peminjaman ditolak'
        );
    }

    public function pengembalian()
{
    $peminjaman = Peminjaman::with([
        'mahasiswa',
        'buku'
    ])
    ->where('status', 'Menunggu Pengembalian')
    ->get();

    return view(
        'admin.pengembalian',
        compact('peminjaman')
    );
}

public function konfirmasiPengembalian($id)
{
    $pinjam = Peminjaman::findOrFail($id);

    $pinjam->update([
        'status' => 'Dikembalikan'
    ]);

    return back()->with(
        'success',
        'Pengembalian berhasil dikonfirmasi'
    );
}
}
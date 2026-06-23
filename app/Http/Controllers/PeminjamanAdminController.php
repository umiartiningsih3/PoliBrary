<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use Carbon\Carbon;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PeminjamanExport;


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

    public function daftarDipinjam()
{
    $peminjaman = Peminjaman::with([
        'mahasiswa',
        'buku'
    ])
    ->whereIn('status', [
        'Dipinjam',
        'Menunggu Pengembalian'
    ])
    ->latest()
    ->get();


    return view(
        'admin.daftar-dipinjam',
        compact('peminjaman')
    );
}

public function exportPdf()
{
    $peminjaman = Peminjaman::with([
        'mahasiswa',
        'buku'
    ])
    ->whereIn('status', [
        'Dipinjam',
        'Menunggu Pengembalian'
    ])
    ->get();


    $pdf = PDF::loadView(
        'admin.export-peminjaman-pdf',
        compact('peminjaman')
    );


    return $pdf->download(
        'daftar-buku-dipinjam.pdf'
    );
}

public function exportExcel()
{
    return Excel::download(
        new PeminjamanExport,
        'daftar-buku-dipinjam.xlsx'
    );
}
}
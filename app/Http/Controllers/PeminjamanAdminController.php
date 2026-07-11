<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use Carbon\Carbon;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PeminjamanExport;
use App\Notifications\PeminjamanNotification;
use App\Models\User;


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
    $pinjam = Peminjaman::with('buku')
        ->findOrFail($id);


    // ubah status
    $pinjam->update([
        'status' => 'Dipinjam'
    ]);


    // kurangi stok setelah peminjaman disetujui
$pinjam->buku->decrement('jumlah_eksemplar');


    // kirim notif mahasiswa
    $mahasiswa = User::find($pinjam->user_id);

    if($mahasiswa){

        $mahasiswa->notify(
            new PeminjamanNotification(
                'Peminjaman Disetujui',
                'Buku dengan judul "' .
                $pinjam->buku->judul .
                '" telah disetujui oleh petugas.'
            )
        );

    }


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
    'admin.pengembalian.index',
    compact('peminjaman')
);
}

public function konfirmasiPengembalian($id)
{
    $pinjam = Peminjaman::with('buku')
        ->findOrFail($id);


    // ubah status menjadi selesai
    $pinjam->update([
        'status' => 'Dikembalikan'
    ]);


    // tambah stok setelah petugas menerima buku
    $pinjam->buku->increment('jumlah_eksemplar');


    // notif mahasiswa
    $mahasiswa = User::find($pinjam->user_id);

    if($mahasiswa){

        $mahasiswa->notify(
            new PeminjamanNotification(
                'Pengembalian Berhasil',
                'Terima kasih, buku "' .
                $pinjam->buku->judul .
                '" telah diterima oleh petugas dan transaksi pengembalian telah selesai.'
            )
        );

    }


    return back()->with(
        'success',
        'Pengembalian berhasil dikonfirmasi'
    );
}

    public function daftarDipinjam(Request $request)
{
    $peminjaman = Peminjaman::with([
        'mahasiswa',
        'buku'
    ])
    ->whereIn('status', [
        'Dipinjam',
        'Menunggu Pengembalian'
    ]);


    if($request->search_nim){

        $peminjaman->whereHas('mahasiswa', function($query) use ($request){

            $query->where(
                'nim',
                'like',
                '%' . $request->search_nim . '%'
            );

        });

    }


    $peminjaman = $peminjaman
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
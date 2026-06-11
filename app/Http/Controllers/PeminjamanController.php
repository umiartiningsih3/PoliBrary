<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman; // Pastikan model ini di-import

class PeminjamanController extends Controller
{
    public function pinjamanSaya()
{
    $dataPinjaman = Peminjaman::with('buku')
        ->where('user_id', auth()->id())
        ->whereIn('status', [
            'Dipinjam',
            'Menunggu Konfirmasi',
            'Menunggu Pengembalian'
        ])
        ->get();

    return view('pinjaman-saya', compact('dataPinjaman'));
}

    // Gunakan fungsi show ini untuk detail
    public function show($id)
    {
        // Menggunakan model untuk mencari data
        $pinjaman = Peminjaman::findOrFail($id); 

        // Sesuaikan dengan letak file view Anda. 
        // Jika file ada di resources/views/peminjaman/detail.blade.php
        return view('peminjaman.peminjaman', compact('pinjaman'));
    }
    public function detail($id)
{
    $pinjaman = Peminjaman::with('buku')
        ->findOrFail($id);

    return view('peminjaman.peminjaman', compact('pinjaman'));
}
    public function cetakPdf()
{
    $riwayat = Peminjaman::with('buku')
        ->where('user_id', auth()->id())
        ->where('status', 'Dikembalikan')
        ->latest()
        ->get()
        ->map(function ($item) {
            return [
                'judul' => $item->buku->judul ?? '-',
                'tgl_pinjam' => $item->created_at
                    ? $item->created_at->format('d-m-Y')
                    : '-',
                'tgl_kembali' => $item->updated_at
                    ? $item->updated_at->format('d-m-Y')
                    : '-',
                'status' => $item->status,
                'denda' => 0
            ];
        });

    $pdf = \PDF::loadView(
        'peminjaman.riwayat_pdf',
        compact('riwayat')
    );

    return $pdf->download('riwayat-peminjaman.pdf');
}
    public function riwayat()
{
    $riwayat = Peminjaman::with('buku')
        ->where('user_id', auth()->id())
        ->where('status', 'Dikembalikan')
        ->latest()
        ->get();

    return view(
        'peminjaman.riwayat',
        compact('riwayat')
    );
}

    public function kembalikan($id)
{
    $pinjaman = Peminjaman::findOrFail($id);

    $pinjaman->update([
        'status' => 'Menunggu Pengembalian'
    ]);

    return redirect()
        ->route('pinjaman-saya')
        ->with('success', 'Permintaan pengembalian berhasil dikirim');
}

    public function perpanjang($id)
{
    $pinjaman = Peminjaman::findOrFail($id);

    if ($pinjaman->jumlah_perpanjangan >= 2) {
        return back()->with('error', 'Maksimal perpanjangan 2 kali');
    }

    $pinjaman->update([
        'tgl_jatuh_tempo' => Carbon::parse($pinjaman->tgl_jatuh_tempo)->addDays(7),
        'jumlah_perpanjangan' => $pinjaman->jumlah_perpanjangan + 1
    ]);

    return back()->with('success', 'Pinjaman berhasil diperpanjang');
}
}
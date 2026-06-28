<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Perpanjangan;
use App\Models\Denda;
use Carbon\Carbon;
use PDF;

class PeminjamanController extends Controller
{


    // =========================
    // PINJAMAN SAYA
    // =========================

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


        return view(
            'pinjaman-saya',
            compact('dataPinjaman')
        );

    }



    // =========================
    // DETAIL PINJAMAN
    // =========================

    public function detail($id)
    {

        $pinjaman = Peminjaman::with([
                'buku',
                'perpanjangan'
            ])
            ->where('user_id', auth()->id())
            ->findOrFail($id);



        /*
        |--------------------------------------------------------------------------
        | HITUNG DENDA REALTIME
        |--------------------------------------------------------------------------
        */


        $hariIni = Carbon::today();
$jatuhTempo = Carbon::parse($pinjaman->tgl_jatuh_tempo)->startOfDay();

$terlambat = max(
    0,
    $jatuhTempo->diffInDays($hariIni)
);

$dendaPerHari = 2000;
$totalDenda = $terlambat * $dendaPerHari;




        /*
        |--------------------------------------------------------------------------
        | SIMPAN DENDA OTOMATIS
        |--------------------------------------------------------------------------
        */


        $denda = Denda::where(
                'peminjaman_id',
                $pinjaman->id
            )
            ->first();



        if(
            $totalDenda > 0
            &&
            !$denda
        ){

            $denda = Denda::create([

                'peminjaman_id'
                    => $pinjaman->id,

                'user_id'
                    => auth()->id(),

                'jumlah_denda'
                    => $totalDenda,

                'status'
                    => 'belum_bayar'

            ]);

        }



        /*
        |--------------------------------------------------------------------------
        | UPDATE JUMLAH DENDA JIKA SUDAH ADA
        |--------------------------------------------------------------------------
        */


        if(
            $denda
            &&
            $denda->status != 'lunas'
        ){

            $denda->update([

                'jumlah_denda'
                    => $totalDenda

            ]);

        }





        return view(
            'peminjaman.peminjaman',
            compact(
                'pinjaman',
                'terlambat',
                'dendaPerHari',
                'totalDenda',
                'denda'
            )
        );

    }





    // =========================
    // KEMBALIKAN BUKU
    // =========================


    public function kembalikan($id)
    {


        $pinjaman = Peminjaman::where(
                'user_id',
                auth()->id()
            )
            ->findOrFail($id);



        $pinjaman->update([

            'status'
                =>
            'Menunggu Pengembalian'

        ]);



        return redirect()
            ->route('pinjaman-saya')
            ->with(
                'success',
                'Permintaan pengembalian berhasil dikirim'
            );


    }





    // =========================
    // PERPANJANG
    // =========================


    public function perpanjang($id)
    {


        $pinjaman = Peminjaman::where(
                'user_id',
                auth()->id()
            )
            ->findOrFail($id);




        if(
            $pinjaman->jumlah_perpanjangan >= 2
        ){

            return back()
                ->with(
                    'error',
                    'Maksimal perpanjangan 2 kali'
                );

        }





        $cek =
            Perpanjangan::where(
                'peminjaman_id',
                $pinjaman->id
            )
            ->where(
                'status',
                'menunggu'
            )
            ->first();




        if($cek){

            return back()
                ->with(
                    'error',
                    'Permintaan perpanjangan masih menunggu'
                );

        }





        Perpanjangan::create([

            'peminjaman_id'
                =>
            $pinjaman->id,


            'jatuh_tempo_baru'
                =>
            Carbon::parse(
                $pinjaman->tgl_jatuh_tempo
            )
            ->addDays(3),


            'status'
                =>
            'menunggu'

        ]);





        return back()
            ->with(
                'success',
                'Permintaan perpanjangan berhasil dikirim'
            );


    }






    // =========================
    // RIWAYAT
    // =========================


    public function riwayat()
    {


        $riwayat =
            Peminjaman::with('buku')
            ->where(
                'user_id',
                auth()->id()
            )
            ->where(
                'status',
                'Dikembalikan'
            )
            ->latest()
            ->get();



        return view(
            'peminjaman.riwayat',
            compact('riwayat')
        );


    }





    // =========================
    // CETAK PDF
    // =========================


    public function cetakPdf()
    {


        $riwayat =
            Peminjaman::with('buku')
            ->where(
                'user_id',
                auth()->id()
            )
            ->where(
                'status',
                'Dikembalikan'
            )
            ->latest()
            ->get()
            ->map(function($item){


                return [

                    'judul'
                    =>
                    $item->buku->judul ?? '-',


                    'tgl_pinjam'
                    =>
                    $item->created_at
                    ?
                    $item->created_at
                    ->format('d-m-Y')
                    :
                    '-',


                    'tgl_kembali'
                    =>
                    $item->updated_at
                    ?
                    $item->updated_at
                    ->format('d-m-Y')
                    :
                    '-',


                    'status'
                    =>
                    $item->status,


                    'denda'
                    =>
                    0

                ];


            });




        $pdf = PDF::loadView(
            'peminjaman.riwayat_pdf',
            compact('riwayat')
        );



        return $pdf->download(
            'riwayat-peminjaman.pdf'
        );


    }


}
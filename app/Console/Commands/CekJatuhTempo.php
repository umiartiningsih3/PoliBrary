<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Peminjaman;
use App\Notifications\PeminjamanNotification;
use Carbon\Carbon;


class CekJatuhTempo extends Command
{

    protected $signature = 'cek:jatuh-tempo';


    protected $description =
    'Mengirim notifikasi jatuh tempo buku';


    public function handle()
    {

        $today = Carbon::today();



        $data = Peminjaman::with([
            'buku',
            'mahasiswa'
        ])
        ->where('status','Dipinjam')
        ->get();



        foreach($data as $pinjam){


            $jatuhTempo =
            Carbon::parse(
                $pinjam->tgl_jatuh_tempo
            );


            // H-1

            if(
                $today->diffInDays(
                    $jatuhTempo,
                    false
                ) == 1
            ){

                $pinjam->mahasiswa->notify(

                    new PeminjamanNotification(

                        'Pengingat Pengembalian Buku',

                        'Buku "' .
                        $pinjam->buku->judul .
                        '" harus dikembalikan besok.'

                    )

                );

            }



            // Terlambat

            if(
                $today->greaterThan(
                    $jatuhTempo
                )
            ){

                $pinjam->mahasiswa->notify(

                    new PeminjamanNotification(

                        'Keterlambatan Pengembalian',

                        'Buku "' .
                        $pinjam->buku->judul .
                        '" sudah melewati batas pengembalian. Segera kembalikan buku.'

                    )

                );

            }


        }


    }

}
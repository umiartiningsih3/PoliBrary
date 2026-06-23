<?php

namespace App\Exports;

use App\Models\Peminjaman;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PeminjamanExport implements FromCollection, WithHeadings
{

    public function collection()
    {

        return Peminjaman::with([
            'mahasiswa',
            'buku'
        ])
        ->whereIn('status',[
            'Dipinjam',
            'Menunggu Pengembalian'
        ])
        ->get()
        ->map(function($item){

            return [

                'Mahasiswa'
                => $item->mahasiswa->name,

                'NIM'
                => $item->mahasiswa->nim,

                'Buku'
                => $item->buku->judul,

                'Tanggal Pinjam'
                => $item->created_at->format('d-m-Y'),

                'Jatuh Tempo'
                => $item->tgl_jatuh_tempo,

                'Status'
                => $item->status,

            ];

        });

    }


    public function headings(): array
    {
        return [
            'Mahasiswa',
            'NIM',
            'Buku',
            'Tanggal Pinjam',
            'Jatuh Tempo',
            'Status'
        ];
    }

}
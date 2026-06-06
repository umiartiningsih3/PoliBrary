<?php

namespace App\Exports;

use App\Models\Denda;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class DendaExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        // Mengambil data denda beserta relasi user dan buku
        return Denda::with(['user', 'buku'])->get();
    }

    // Menentukan header kolom di Excel
    public function headings(): array
    {
        return [
            'Nama Peminjam',
            'Judul Buku',
            'Jumlah Denda',
            'Status',
            'Tanggal Bayar'
        ];
    }

    // Menentukan isi setiap baris
    public function map($denda): array
    {
        return [
            $denda->user->name,
            $denda->buku->judul,
            $denda->jumlah_denda,
            $denda->status,
            $denda->tgl_bayar,
        ];
    }
}
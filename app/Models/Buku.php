<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'buku';

    protected $fillable = [
        'judul',
        'isbn',
        'penulis',
        'penerbit',
        'tahun_terbit',
        'kategori',
        'sub_kategori',
        'no_inventaris',
        'deskripsi',
        'jumlah_eksemplar',
        'sampul'
    ];

    /**
     * Relasi ke tabel peminjaman
     */
    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'buku_id');
    }

    /**
     * Hitung stok tersedia secara realtime
     */
    public function getTersediaAttribute()
    {
        $dipinjam = $this->peminjaman()
            ->whereIn('status', [
                'dipinjam',
                'diperpanjang',
                'menunggu_pengembalian'
            ])
            ->count();

        return max(0, $this->jumlah_eksemplar - $dipinjam);
    }
}
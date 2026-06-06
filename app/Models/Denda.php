<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Denda extends Model
{
    use HasFactory;

    // Tentukan tabel jika nama tabel bukan 'dendas' (jamak dari denda)
    protected $table = 'dendas';

    // Kolom yang bisa diisi (Mass Assignment)
    protected $fillable = [
        'peminjaman_id',
        'user_id',
        'jumlah_denda',
        'status', // Contoh: 'belum_bayar', 'lunas'
        'tgl_bayar'
    ];

    // Relasi ke Peminjaman
    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class);
    }

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
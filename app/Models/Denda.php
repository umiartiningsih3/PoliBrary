<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Denda extends Model
{
    protected $table = 'dendas';

    protected $fillable = [
        'peminjaman_id',
        'user_id',
        'jumlah_denda',
        'status',
        'tgl_bayar'
    ];


    public function user()
    {
        return $this->belongsTo(
            User::class,
            'user_id'
        );
    }


    public function peminjaman()
    {
        return $this->belongsTo(
            Peminjaman::class,
            'peminjaman_id'
        );
    }


    public function buku()
    {
        return $this->hasOneThrough(
            Buku::class,
            Peminjaman::class,
            'id',
            'id',
            'peminjaman_id',
            'buku_id'
        );
    }
}
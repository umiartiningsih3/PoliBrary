<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perpanjangan extends Model
{
    protected $table = 'perpanjangans';

    protected $fillable = [
        'peminjaman_id',
        'jatuh_tempo_baru',
        'status'
    ];

    public function peminjaman()
    {
        return $this->belongsTo(
            Peminjaman::class,
            'peminjaman_id'
        );
    }
}
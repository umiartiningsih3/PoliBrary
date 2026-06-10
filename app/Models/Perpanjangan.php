<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perpanjangan extends Model
{
    protected $table = 'perpanjangan';

    protected $fillable = [
        'peminjaman_id',
        'jatuh_tempo_lama',
        'jatuh_tempo_baru'
    ];
}

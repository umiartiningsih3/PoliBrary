<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjaman';

    protected $fillable = ['user_id', 'buku_id', 'status', 'tgl_jatuh_tempo'];

    public function mahasiswa()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'buku_id');
    }

    // Di dalam model Peminjaman.php
public function denda()
{
    return $this->hasOne(Denda::class);
}

public function perpanjangan()
{
    return $this->hasMany(
        \App\Models\Perpanjangan::class,
        'peminjaman_id'
    );
}
}
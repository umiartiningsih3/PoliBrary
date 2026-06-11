<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disukai extends Model
{
    protected $table = 'disukai';

    protected $fillable = [
        'user_id',
        'buku_id'
    ];

    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'buku';

    protected $fillable = [
    'judul', 'isbn', 'penulis', 'penerbit', 'tahun_terbit', 
    'kategori', 'sub_kategori', 'jumlah_eksemplar', 
    'deskripsi', 'sampul', 'no_inventaris'
];
}
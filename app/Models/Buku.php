<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'buku';

    protected $fillable = [
    'sampul', 'judul_buku', 'isbn', 'penulis', 'kategori', 
    'sub_kategori', 'no_inventaris', 'penerbit', 
    'tahun_terbit', 'deskripsi', 'jumlah_eksemplar'
];
}
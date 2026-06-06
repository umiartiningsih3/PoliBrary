<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    // Tambahkan baris ini. Sesuaikan dengan nama tabel yang ada di database.sqlite kamu.
    // Jika nama tabelnya "peminjaman", maka isi seperti ini:
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
}
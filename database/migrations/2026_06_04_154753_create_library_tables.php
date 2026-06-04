<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // 1. Modifikasi tabel users yang sudah ada
        Schema::table('users', function (Blueprint $table) {
            $table->string('nim')->unique()->after('name');
            $table->string('prodi')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('no_telp')->nullable();
            $table->string('security_question')->nullable();
            $table->string('security_answer')->nullable();
            $table->string('avatar')->nullable();
        });

        // 2. Buat tabel baru (hanya untuk tabel yang belum ada, seperti buku)
        Schema::create('buku', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('isbn')->unique();
            $table->string('penulis');
            $table->string('penerbit');
            $table->string('tahun_terbit');
            $table->string('kategori');
            $table->string('sub_kategori');
            $table->string('nomor_inventaris')->unique();
            $table->text('deskripsi');
            $table->integer('jumlah_eksemplar');
            $table->string('cover_image')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        // Hapus kolom yang ditambahkan jika rollback
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['nim', 'prodi', 'tgl_lahir', 'no_telp', 'security_question', 'security_answer', 'avatar']);
        });
        Schema::dropIfExists('buku');
    }
};
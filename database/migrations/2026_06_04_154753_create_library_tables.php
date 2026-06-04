<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Tabel User (Disesuaikan dengan field login & profile)
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nim')->unique(); // Untuk Login
            $table->string('email')->unique();
            $table->string('password');
            $table->string('prodi')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('no_telp')->nullable();
            $table->string('security_question')->nullable(); // Untuk reset password
            $table->string('security_answer')->nullable();
            $table->string('avatar')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        // Tabel Buku (Sesuai form tambah-buku)
        Schema::create('buku', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('isbn')->unique();
            $table->string('penulis');
            $table->string('penerbit');
            $table->string('tahun_terbit');
            $table->string('kategori');
            $table->string('sub_kategori');
            $table->string('nomor_inventaris')->unique(); // INV00001
            $table->text('deskripsi');
            $table->integer('jumlah_eksemplar');
            $table->string('cover_image')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('buku');
    }
};

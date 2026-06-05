<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('sampul')->nullable();       // cover_path
            $table->string('judul_buku');               // title
            $table->string('isbn')->unique();           // isbn
            $table->string('penulis');                  // author
            $table->string('kategori');                 // category
            $table->string('sub_kategori');             // sub_category
            $table->string('no_inventaris')->unique();  // inventory_number
            $table->string('penerbit');                 // publisher
            $table->year('tahun_terbit');               // publish_year
            $table->text('deskripsi')->nullable();      // description
            $table->integer('jumlah_eksemplar');        // total_copies
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('perpanjangans', function (Blueprint $table) {
            $table->id();

            $table->foreignId('peminjaman_id')
                ->constrained('peminjamans')
                ->cascadeOnDelete();

            $table->date('jatuh_tempo_baru');

            $table->string('status')
                ->default('menunggu');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('perpanjangans');
    }
};
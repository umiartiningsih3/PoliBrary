<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('dendas', function (Blueprint $table) {
        $table->id();
        $table->foreignId('peminjaman_id')->constrained('peminjamans')->onDelete('cascade');
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
        $table->decimal('jumlah_denda', 10, 2);
        $table->string('status')->default('belum_bayar'); // contoh: 'belum_bayar', 'lunas'
        $table->date('tgl_bayar')->nullable();
        $table->timestamps();
    });
}
};

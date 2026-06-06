<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Kita modifikasi tabel 'users' yang sudah ada dari migrasi bawaan Laravel
        Schema::table('users', function (Blueprint $table) {
            $table->string('nim')->unique()->after('id')->nullable();
            $table->string('prodi')->nullable()->after('nim');
            $table->date('tgl_lahir')->nullable()->after('prodi');
            $table->string('tipe_keanggotaan')->default('mahasiswa')->after('tgl_lahir');
            $table->string('no_telp')->nullable()->after('tipe_keanggotaan');
            $table->string('security_question')->nullable()->after('no_telp');
            $table->string('security_answer')->nullable()->after('security_question');
            $table->string('avatar')->nullable()->after('security_answer');
            $table->date('tgl_daftar')->nullable()->after('avatar');
            
            // Ubah password jadi nullable untuk fitur login hibrida
            $table->string('password')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'nim', 'prodi', 'tgl_lahir', 'tipe_keanggotaan', 
                'no_telp', 'security_question', 'security_answer', 
                'avatar', 'tgl_daftar'
            ]);
        });
    }
};
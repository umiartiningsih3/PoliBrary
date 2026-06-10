<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View; // Pastikan ini ada
use App\Models\Peminjaman;           // Pastikan ini ada
use App\Models\Perpanjangan;         // Pastikan ini ada

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('layouts.app', function ($view) {
            $view->with('counts', [
                'peminjaman' => Peminjaman::where('status', 'menunggu')->count(),
                'perpanjangan' => Schema::hasTable('perpanjangans')
    ? Perpanjangan::where('status', 'menunggu')->count()
    : 0,
                'pengembalian' => Peminjaman::where('status', 'menunggu_pengembalian')->count(),
            ]);
        });
    }
}
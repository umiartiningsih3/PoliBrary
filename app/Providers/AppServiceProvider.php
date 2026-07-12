<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View; // Pastikan ini ada
use App\Models\Peminjaman;           // Pastikan ini ada
use App\Models\Perpanjangan;     
use Illuminate\Support\Facades\Auth;    // Pastikan ini ada
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
{
    Carbon::setLocale('id');
    View::composer('layouts.app', function ($view) {

        $notifications = collect();
        $unreadCount = 0;

        if (Auth::check()) {

            $notifications = Auth::user()
                ->notifications()
                ->latest()
                ->take(10)
                ->get();

            $unreadCount = Auth::user()
                ->unreadNotifications()
                ->count();
        }
        
        Paginator::useTailwind();
        
        $view->with([

            'counts' => [

                'peminjaman' => Peminjaman::where('status', 'menunggu')->count(),

                'perpanjangan' => Schema::hasTable('perpanjangans')
                    ? Perpanjangan::where('status', 'menunggu')->count()
                    : 0,

                'pengembalian' => Peminjaman::where(
                    'status',
                    'Menunggu Pengembalian'
                )->count(),

            ],

            'notifications' => $notifications,

            'unreadCount' => $unreadCount,

        ]);

    });
}
}
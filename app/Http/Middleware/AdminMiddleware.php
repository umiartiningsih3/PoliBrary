<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth; // <-- INI YANG KURANG

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Pastikan user sudah login DAN tipe_keanggotaan adalah 'admin'
        if (Auth::check() && Auth::user()->tipe_keanggotaan === 'admin') {
            return $next($request);
        }

        // Jika bukan admin, tendang ke halaman dashboard atau home
        return redirect('/dashboard')->with('error', 'Anda tidak memiliki hak akses admin.');
    }
}
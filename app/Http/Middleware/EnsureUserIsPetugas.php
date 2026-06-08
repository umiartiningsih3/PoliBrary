<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsPetugas
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next)
{
    // Gunakan strtolower agar tidak terpengaruh huruf besar/kecil
    $tipe = strtolower(trim($request->user()->tipe_keanggotaan));
    
    if ($request->user() && $tipe === 'petugas') {
        return $next($request);
    }

    return redirect('/dashboard')->with('error', 'Akses ditolak.');
}
}

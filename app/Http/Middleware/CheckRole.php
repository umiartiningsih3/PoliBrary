<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
{
    if (!in_array($request->user()->tipe_keanggotaan, $roles)) {
        return redirect('dashboard'); // Jika bukan admin, tendang ke dashboard biasa
    }
    return $next($request);
}
}

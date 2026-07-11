<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {

        if (!$request->user()) {
            return redirect('/login');
        }


        $userRole = strtolower(trim($request->user()->tipe_keanggotaan));


        $roles = array_map(function($role){
            return strtolower(trim($role));
        }, $roles);


        if (!in_array($userRole, $roles)) {

            return redirect('/dashboard')
                ->with('error','Akses ditolak.');

        }


        return $next($request);
    }
}
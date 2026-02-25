<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
public function handle($request, Closure $next, $menuKey)
{
    // Cek login dulu
    if (!session()->has('id_user')) {
        return redirect('/login');
    }

    $allowedMenus = DB::table('permissions')
        ->where('level', session('level'))
        ->pluck('menu_key')
        ->toArray();

    if (!in_array($menuKey, $allowedMenus)) {
        abort(403);
    }

    return $next($request);
}
}

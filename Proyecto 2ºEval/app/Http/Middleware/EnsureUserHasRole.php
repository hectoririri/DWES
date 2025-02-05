<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserHasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Verifica si el usuario está autenticado y tiene uno de los roles permitidos
        if (Auth::check() && in_array(Auth::user()->rol, $roles)) {
            return $next($request);
        }

        // Si no tiene el rol adecuado, redirige o devuelve un error
        return redirect('/')->with('error', 'No tienes permisos para acceder a esta página.');
    }
}

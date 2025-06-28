<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
    {
    public function handle($request, Closure $next, ...$roles)
    {
        if ($request->user()) {
            if (!in_array($request->user()->role, $roles)) {
                return redirect()->route('home')->with('error', 'Necesitas ser del Área de ' . implode(' o ', $roles) . ' para acceder'); }
        } 
        else 
        {
            return redirect()->route('login')->with('error', 'Necesitas iniciar sesión para acceder aquí'); 
        }
            return $next($request);
    }
}
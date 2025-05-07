<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class TenantMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check() || Auth::user()->tenant_id === null) {
            return redirect('/login')->with('error', 'Acesso permitido apenas para lojistas.');
        }
        
        // Define tenant_id global para todas as queries
        app()->singleton('tenant_id', function () {
            return Auth::user()->tenant_id;
        });
        
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckIfVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if(auth()->check() && !auth()->user()->verified_at) {
            $route = str_contains(url()->previous(), 'admin') ? '/admin' : '/';

            auth()->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
    
            return redirect($route)->with('error', 'Your account is not yet verified.');
        }

        return $next($request);
    }
}

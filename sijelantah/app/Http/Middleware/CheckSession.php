<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Check if 'pengguna' session exists
        if (!$request->session()->has('pengguna')) {
            // Redirect to login page or any other page
            return redirect('/Masuk')->with('error', 'Please log in to access this page.');
        }

        return $next($request);
    }
}
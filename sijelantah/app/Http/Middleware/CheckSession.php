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
        // Check if 'pengguna' session exists and 'ROLE' is 'pengumpul'
        if (!$request->session()->has('pengguna') || $request->session()->get('pengguna')['ROLE'] !== 'pengumpul') {
            // Redirect to login page or any other page
            return redirect('/Masuk')->with('error', 'Please log in as pengumpul to access this page.');
        }

        return $next($request);
    }
}
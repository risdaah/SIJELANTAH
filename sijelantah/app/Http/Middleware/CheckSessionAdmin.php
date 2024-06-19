<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckSessionAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Check if 'pengguna' session exists and 'ROLE' is 'admin'
        if (!$request->session()->has('pengguna') || $request->session()->get('pengguna')['ROLE'] !== 'admin') {
            // Redirect to login page or any other page
            return redirect('/Masuk')->with('error', 'Please log in as admin to access this page.');
        }

        return $next($request);
    }
}
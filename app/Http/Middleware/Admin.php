<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request,Closure $next)
    {
        if (Auth::check()) {
            $role = Auth::user()->role;

            if ($role == 'admin') {
                return $next($request);
            } elseif ($role == 'user') {
                return redirect()->route('dashboard-user');
            }
        }

        return redirect()->route('user-login');
    }
}

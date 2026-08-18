<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckNotRole
{
    public function handle($request, Closure $next, $role)
    {
        if (Auth::check() && Auth::user()->role == $role) {
            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();
            return redirect()->back()->with('error', 'Acesso negado.');
        }

        return $next($request);
    }
}

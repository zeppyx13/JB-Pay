<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestOnlyMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            return redirect()->intended('/dashboard');
        }

        return $next($request);
    }
}

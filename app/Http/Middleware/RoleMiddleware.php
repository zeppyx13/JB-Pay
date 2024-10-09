<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        $user = Auth::user();

        // Cek apakah user terautentikasi dan memiliki role yang sesuai
        if ($user && $user->Role === $role) {
            return $next($request);
        }

        // Jika tidak memiliki akses, alihkan ke halaman login atau error
        return redirect('/login')->with('error', 'You do not have access to this page.');
    }
}

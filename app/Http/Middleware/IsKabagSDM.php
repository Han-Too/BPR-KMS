<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsKabagSDM
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->role === 'Kabag SDM')
        {
            return $next($request);
        }

        return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses ke halaman tersebut.');
    }
}

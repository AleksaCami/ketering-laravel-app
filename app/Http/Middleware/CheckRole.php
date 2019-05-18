<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        $tip_korisnika = Auth::user()->tip_korisnika;

        if($role == $tip_korisnika) {
            return $next($request);
        }

        return redirect('/'. $tip_korisnika);
    }
}

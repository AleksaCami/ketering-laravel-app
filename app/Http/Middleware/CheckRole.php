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
        $role_names = explode('|', $role);
        $tip_korisnika = Auth::user()->tip_korisnika;

        if(count($role_names) > 1) {
            foreach ($role_names as $role_name) {
                if($role_name == $tip_korisnika) {
                    return $next($request);
                }
            }
        } else {

            if($role == $tip_korisnika) {
                return $next($request);
            }
        }

        return redirect('/'. $tip_korisnika);
    }
}

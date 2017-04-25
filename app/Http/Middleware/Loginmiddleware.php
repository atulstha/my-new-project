<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Loginmiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check() && Auth::user()->Role==1) {
            return $next($request);
            //var_dump($request);
        }
        if (Auth::guard($guard)->check() && Auth::user()->Role==2) {
            return $next($request);
            //var_dump($request);
        }
      else{
         echo "Only REGISTERED users have access to this page.";
         die();
    }
    }

}

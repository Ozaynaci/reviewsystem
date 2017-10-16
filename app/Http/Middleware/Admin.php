<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin
{

    public function handle($request, Closure $next)
    {

        if (Auth::user() &&  Auth::user()->role == 0) {
            return $next($request);
        }

        return redirect('/movies');
    }
}

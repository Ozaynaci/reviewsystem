<?php

namespace App\Http\Middleware;

use Closure;

class Admin
{

    public function handle($request, Closure $next)
    {

        if (Auth::user() &&  Auth::user()->admin == 1) {
            return $next($request);
        }

        return redirect('/');
    }
}

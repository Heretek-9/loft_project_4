<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
{
    public function handle($request, Closure $next)
    {
        if (\Auth::user() && \Auth::user()->getAttributes()['admin'] == 1) {
            return $next($request);
        } else {
            abort(403);
        }
    }
}

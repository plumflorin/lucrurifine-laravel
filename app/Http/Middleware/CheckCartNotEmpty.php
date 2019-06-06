<?php

namespace App\Http\Middleware;

use Closure;

class CheckCartNotEmpty
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (empty(session('cart'))) {
            return redirect('/shop');
        }

        return $next($request);
    }
}

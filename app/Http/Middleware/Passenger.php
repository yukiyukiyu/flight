<?php

namespace App\Http\Middleware;

use Closure;

class Passenger
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
        if ($request->session()->get('user_role') != 1) {
            return redirect('/');
        }

        return $next($request);
    }
}

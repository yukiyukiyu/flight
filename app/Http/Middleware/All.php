<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use App\Passenger;

class All
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
        if ($request->session()->has('user_id')) {
            $user = User::find($request->session()->get('user_id'));
            
            $request->session()->put('user_role', $user->role);
    
            if ($user->role == 0) {
                $request->session()->put('username', $user->username);
            } else {
                $passenger = Passenger::where('user_id', $user->id)->first();
                $request->session()->put('username', $passenger->name);
            }
        }
        return $next($request);
    }
}

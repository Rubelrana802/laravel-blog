<?php

namespace App\Http\Middleware;

use Auth;

use Closure;

class checkRole
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
        if(Auth::check() == false || Auth::user()->$role != true)
        {
            return redirect('/');
        }
        return $next($request);
    }
}

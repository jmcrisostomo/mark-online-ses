<?php

namespace App\Http\Middleware;

use Closure;

class Session
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

        if (session()->has('login_time')) {

        } else {
            redirect()->route('login')->with('not_logged_in', 'You are not logged in.');
        }

        return $next($request);
    }
}

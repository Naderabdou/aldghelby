<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Lang
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // middle ware lang
        if (session()->has('lang')) {
            app()->setLocale(session('lang'));

            // return next
            return $next($request);
        } else {
            // set lang
            session()->put('lang', 'ar');

            // return next
            return $next($request);
        }
    }
}

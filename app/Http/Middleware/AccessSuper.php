<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AccessSuper
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
        if(Auth::user()->hasRole('super')){
            return $next($request);
        }

        return redirect()->route('index');
    }
}

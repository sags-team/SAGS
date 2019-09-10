<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AccessAdmin
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
        if(Auth::user()->hasRole('Administrador sindicato')){
            dd('deu true para admin');
            return $next($request);
        }
        dd('deu false para admin');
        return redirect()->route('index');
    }
}

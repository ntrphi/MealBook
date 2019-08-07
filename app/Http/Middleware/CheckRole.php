<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckRole
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
        if( Auth::check() ){
            if( Auth::user()->role->name == 'Admin' ){
                return $next($request);
            } elseif (Auth::user()->role->name == 'Member')
            return redirect()->route('userpage', Auth::user()->id); 
        }
        return redirect()->route('index'); 
    }
}
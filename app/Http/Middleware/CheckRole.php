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
            if( Auth::user()->role == 1 ){
                return $next($request);
            } elseif (Auth::user()->role == 3)
            return redirect()->route('userpage', ['id' => Auth::user()->id]); 
        }
        return redirect()->route('login'); 
    }
}
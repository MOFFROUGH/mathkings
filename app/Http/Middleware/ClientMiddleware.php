<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth ;
class ClientMiddleware
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
        if (Auth::user()->is_Client()) {
         return $next($request);
        }
        else{
            Auth::logout();
            return redirect('login');
        }
    }
}

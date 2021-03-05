<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CheckLogedIn
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
        if($request->age<=200)
        {
            return redirect('/login');
        }
        return $next($request);
    }
}

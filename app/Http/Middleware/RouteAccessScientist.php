<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class RouteAccessScientist
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
        if(Session::has('user')){
            if(Session::get('user')=='scientist'){
               
            }
        }
        else {
            //throw new \Exception("You can't Access This route");
            return redirect('/');
            
        }
        return $next($request);
    }
}

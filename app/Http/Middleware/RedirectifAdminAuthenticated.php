<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RedirectifAdminAuthenticated
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
        //for normal user 
        if( Auth::guard()->check()){

            return redirect('/home');
        
        }


        //for admin
        if(Auth::guard('admin')->check()){

            return redirect('/admin_home');
        
        }


        return $next($request);
    }
}

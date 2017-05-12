<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AuthenticateAdmin
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

        //if request does not come from admin
        //should be redirected to login page
        if(! Auth::guard('admin')->check()){

            return redirect('/admin_login');
        
        }

        return $next($request);
    }
}

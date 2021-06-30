<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        // dd(Auth::user()->roles);
        $name = Auth::user()->roles;
        foreach($name as $n){
            if( Auth::check() && $n->name === 'admin' or $n->name ==='developer' or $n->name ==='content'){
                return $next($request);
            }else{
                return redirect()->route('trang-chu');
            }
        }
    }
}

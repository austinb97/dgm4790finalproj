<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use App\Role;

class authorizeRole
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
        if(!$request->user()->hasRole($role)){
            if($request->user()->hasRole('admin')){
                return redirect('/admin');
            }
            if($request->user()->hasRole('customer')){
                return redirect('/customerPage');
            }
            abort(401, 'Not authorized');
        }
        return $next($request);
    }
}

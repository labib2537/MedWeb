<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
          // admin role = 1
        // user role = 0
        if(auth()->check()){
            if(auth()->user()->is_admin == 0){
             return $next($request);
            }else{
             return redirect()->route('admin')->with('message', 'Access Denied! You are an admin');
            }
         }else{
             return redirect('/login')->with('message', 'Please login to access the website');
         }
         return $next($request);
    }
}

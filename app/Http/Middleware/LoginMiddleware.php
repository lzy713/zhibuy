<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class loginMiddleware
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
        // return $next($request);//request变量 记录所有的请求参数

        if(session('homeFlag')){
            return $next($request);
        }
        else 
        {
            return redirect('/login');
        }


    }
}

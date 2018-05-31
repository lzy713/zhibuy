<?php

namespace App\Http\Middleware;

use Closure;


class LoginMiddleware
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

                } else {
                    session(['pathInfo'=>$request->getRequestUri()]);
                return redirect('/login');

                }


    }
}

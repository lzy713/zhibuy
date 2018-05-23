<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
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
        //$routeurl =  explode('/', \Request::getRequestUri());
        //$routeurl = $routeurl[1].'/'.$routeurl[2];

        //dd(request()->route()->getAction());//获取数组形式 模块控制器方法
        //dd(\Route::current()->action);
        
        $urls = \Route::current();
        //dd($urls->as);
        $urls = explode('/', $urls->uri);
        $routeurl = $urls[0].'/'.$urls[1];
        //dd($urls,$routeurl);

        //判断是否登录 且 是否允许登录
        if(session('adminFlag') == true && session('adminMsg')->getOriginal('status') != 0){
            if (substr_count(session('menuUrl'),$routeurl)==false)
            {
                return redirect('/admin/outLogin');
            }else{
                return $next($request);
            }
        }else {
            return redirect('/');
        }

    }
}

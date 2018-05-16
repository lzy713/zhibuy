<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * 自定义分页模板
     *
     * @return void
     */
    public function boot()
    {

        //layouts.page是你分页模版的路径
        \Illuminate\Pagination\LengthAwarePaginator::defaultView('layout.page'); 
      
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

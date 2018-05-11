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
        \Illuminate\Pagination\LengthAwarePaginator::defaultView('pages.page');
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

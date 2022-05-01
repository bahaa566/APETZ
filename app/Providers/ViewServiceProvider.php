<?php

namespace App\Providers;

use Blade;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        Blade::componentNamespace(
            'App\\View\\Components\\Admin\\Layouts',
            'admin'
        );

        Blade::componentNamespace(
            'App\\View\\Components\\Admin\\Partials',
            'admin-partials'
        );
    }
}

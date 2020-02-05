<?php

namespace StartBox\Schema;

use Illuminate\Support\ServiceProvider;

class Provider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadFactoriesFrom(__DIR__.'/../database/factories');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }
}
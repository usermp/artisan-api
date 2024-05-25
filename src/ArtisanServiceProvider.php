<?php

namespace Usermp\ArtisanApi;

use Illuminate\Support\ServiceProvider;

class ArtisanServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__. '/routes/api.php');
    }

    public function register()
    {
        $this->publishes([
            __DIR__.'/config/artisanapi.php' => config_path('artisanapi.php'),
        ], 'artisan-api-config');
    }
}
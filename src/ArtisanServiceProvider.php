<?php

namespace Usermp\LaravelLogin;

use Illuminate\Support\ServiceProvider;

class ArtisanServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__. '/routes/api.php');
    }

    public function register()
    {

    }
}
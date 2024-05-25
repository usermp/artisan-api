<?php

use Illuminate\Support\Facades\Route;


Route::get("api/artisan", [Usermp\ArtisanApi\app\Http\Controllers\ArtisanController::class,'store'])
    ->name("artisan");

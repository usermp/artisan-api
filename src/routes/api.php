<?php

use Illuminate\Support\Facades\Route;


Route::post("api/artisan", [Usermp\ArtisanApi\app\Http\Controllers\ArtisanController::class,'store'])
    ->name("artisan");


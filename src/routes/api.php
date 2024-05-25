<?php

use Illuminate\Support\Facades\Route;
use Usermp\ArtisanApi\app\Middleware\CheckAuthToken;

Route::middleware(CheckAuthToken::class)->post("api/artisan", [Usermp\ArtisanApi\app\Http\Controllers\ArtisanController::class,'store'])
    ->name("artisan");


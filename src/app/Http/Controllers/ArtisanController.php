<?php

namespace Usermp\ArtisanApi\app\Http\Controllers;

use Illuminate\Routing\Controller; 
use Illuminate\Support\Facades\Artisan;
use Usermp\ArtisanApi\app\Http\Requests\ArtisanRequest;

class ArtisanController extends Controller
{
    public function store(ArtisanRequest $request)
    {
        $validated = $request->validated();
        Artisan::call($validated['command']);
        return Artisan::output();
    }
}
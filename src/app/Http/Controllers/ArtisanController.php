<?php

namespace Usermp\ArtisanApi\app\Http\Controllers;

use Illuminate\Routing\Controller; 
use Illuminate\Support\Facades\Artisan;
use Usermp\ArtisanApi\app\Http\Requests\ArtisanRequest;
use Illuminate\Http\JsonResponse;

class ArtisanController extends Controller
{
    public function store(ArtisanRequest $request): JsonResponse
    {
        $validated = $request->validated();
        
        if (config("artisanapi.with_key")) {
            try {
                Artisan::call($validated['command']);
                $output = Artisan::output();
                
                return response()->json([
                    'success' => true,
                    'output' => $output
                ], 200);
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'error' => $e->getMessage()
                ], 500);
            }
        }

        return response()->json([
            'success' => false,
            'error' => 'Unauthorized access'
        ], 403);
    }
}

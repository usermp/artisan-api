<?php

namespace Usermp\ArtisanApi\App\Http\Controllers;

use Sentry\SentrySdk;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Artisan;
use Usermp\ArtisanApi\App\Http\Requests\ArtisanRequest;

class ArtisanController extends Controller
{
    public function store(ArtisanRequest $request): string
    {
        $validated = $request->validated();
        $allowedCommands = config('artisanapi.allowed_commands');
        $command = explode(' ', $validated['command']);

        try {
            if (in_array($command[0], $allowedCommands, true)) {
                Artisan::call($command[0]);
                return Artisan::output();
            }

            return 'Error: This command is not allowed';
        } catch (\Exception $e) {
            if (!SentrySdk::getCurrentHub()->getClient()) {
                SentrySdk::init();
            }
            SentrySdk::getCurrentHub()->captureException($e);
            return 'Error: An error occurred while processing the command';
        }
    }
}

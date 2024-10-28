<?php

namespace Usermp\ArtisanApi\app\Http\Controllers;

use Sentry\SentrySdk;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Artisan;
use Usermp\ArtisanApi\app\Http\Requests\ArtisanRequest;

class ArtisanController extends Controller
{
    public function store(ArtisanRequest $request): string
    {
        $validated = $request->validated();
        $allowedCommands = config('artisanapi.allowed_commands');
        
        // Parse command and arguments
        $commandParts = explode(' ', $validated['command']);
        $command = array_shift($commandParts);
        $params = ['name' => $commandParts[0] ?? null];

        // Validate command
        if (!$command || !in_array($command, $allowedCommands, true)) {
            return 'Error: Command is not allowed or invalid';
        }

        try {
            // Execute command with params as an associative array
            Artisan::call($command, $params);
            return Artisan::output();
        } catch (\Exception $e) {
            $this->captureSentryException($e);
            return 'Error: Failed to execute the command';
        }
    }

    private function captureSentryException(\Exception $e): void
    {
        if (!SentrySdk::getCurrentHub()->getClient()) {
            SentrySdk::init();
        }
        SentrySdk::getCurrentHub()->captureException($e);
    }
}

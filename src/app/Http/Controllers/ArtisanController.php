<?php

namespace Usermp\ArtisanApi\app\Http\Controllers;

use Sentry\SentrySdk;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Artisan;
use Usermp\ArtisanApi\app\Http\Requests\ArtisanRequest;

class ArtisanController extends Controller
{
    public function store(ArtisanRequest $request): string
    {
        $validated = $request->validated();
        $allowedCommands = config('artisanapi.allowed_commands');
        $commandParts = explode(' ', $validated['command']);
        $command = $commandParts[0] ?? null;

        if (!$command || !in_array($command, $allowedCommands, true)) {
            return 'Error: Command is not allowed or invalid';
        }

        try {
            Artisan::call($command, array_slice($commandParts, 1));
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

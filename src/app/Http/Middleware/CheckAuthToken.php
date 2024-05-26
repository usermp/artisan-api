<?php

namespace Usermp\ArtisanApi\App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAuthToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $useApiKey = config('artisanapi.with_key');
        $apiKey = config('artisanapi.api_key');

        if ($useApiKey && $request->header('Authorization') !== $apiKey) {
            return 'Error: Authorization token is missing or invalid';
        }

        return $next($request);
    }
}

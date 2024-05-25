<?php

namespace Usermp\ArtisanApi\app\Http\Middleware;

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
        $authHeader = $request->header('Authorization');
        
        if (!$authHeader) {
            return response()->json([
                'success' => false,
                'error' => 'Authorization token is missing'
            ], 401);
        }
        return $next($request);
    }
}

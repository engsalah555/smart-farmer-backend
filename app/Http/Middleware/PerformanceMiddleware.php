<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class PerformanceMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $start = microtime(true);

        $response = $next($request);

        $duration = microtime(true) - $start;
        $ms = round($duration * 1000, 2);

        // Add execution time to response headers (useful for debugging)
        $response->headers->set('X-Performance-Execution-Time', $ms.'ms');

        // Log slow requests (> 500ms)
        if ($ms > 500) {
            Log::warning('Slow Request Detected', [
                'url' => $request->fullUrl(),
                'method' => $request->method(),
                'duration' => $ms.'ms',
                'user_id' => $request->user()?->id,
            ]);
        }

        return $response;
    }
}

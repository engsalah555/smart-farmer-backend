<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GzipCompressionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Only compress if the client supports it and it's not already compressed
        if (in_array('gzip', $request->getEncodings()) && function_exists('gzencode') && ! $response->headers->has('Content-Encoding')) {
            $content = $response->getContent();

            // Only compress if content is large enough to benefit (e.g. > 1KB)
            if (strlen($content) > 1024) {
                $compressed = gzencode($content, 6);

                if ($compressed !== false) {
                    $response->setContent($compressed);
                    $response->headers->set('Content-Encoding', 'gzip');
                    $response->headers->set('Content-Length', strlen($compressed));
                }
            }
        }

        return $response;
    }
}

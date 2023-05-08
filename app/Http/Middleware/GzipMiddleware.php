<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GzipMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        if ($response instanceof Response) {
            $content = gzencode($response->getContent(), 9);
            $response->setContent($content);
            $response->header('Content-Encoding', 'gzip');
            $response->header('Vary', 'Accept-Encoding');
        }
        return $response;
    }
}

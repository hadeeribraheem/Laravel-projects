<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    // The 'handle' method is the main entry point for the middleware.
    // It processes the incoming HTTP request before passing it further into the application.
    public function handle(Request $request, Closure $next): Response
    {
        // Use 'die('OK');' for debugging purposes to check if the middleware is being executed.
        // Uncomment the line below to stop the execution and output 'OK' (used for testing).
        // die('OK');

        // Pass the request to the next middleware or the application, if no other middleware is present.
        return $next($request);
    }
}

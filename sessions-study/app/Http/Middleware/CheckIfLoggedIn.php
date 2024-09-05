<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckIfLoggedIn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is not logged in
        if (!Auth::check()) {
            // Redirect to the login page
            return redirect()->route('login')->with('error', 'You must be logged in to access this page.');
        }

        // If the user is logged in, allow the request to proceed
        return $next($request);
    }
}

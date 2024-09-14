<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ChangeLangMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->hasHeader('lang')) {
            app()->setLocale($request->header('lang'));
        } elseif ($request->has('lang')) {
            app()->setLocale($request->get('lang'));
        } elseif (session()->has('lang')) {
            app()->setLocale(session('lang'));
        } else {
            app()->setLocale('ar');
        }
        return $next($request);
    }
}

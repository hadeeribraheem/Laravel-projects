<?php

namespace App\Http;

use App\Http\Middleware\CheckUser;
use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array<int, class-string|string>
     */
    protected $middleware = [
        // \App\Http\Middleware\TrustHosts::class,
        \App\Http\Middleware\TrustProxies::class,
        \Illuminate\Http\Middleware\HandleCors::class,
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array<string, array<int, class-string|string>>
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            // \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            \Illuminate\Routing\Middleware\ThrottleRequests::class.':api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * The application's middleware aliases.
     *
     * Aliases may be used to conveniently assign middleware to routes and groups.
     *
     * @var array<string, class-string|string>
     */
    // This array defines middleware aliases, allowing you to use short, descriptive names
    // for middleware classes in your routes and controllers.
    protected $middlewareAliases = [
        // Alias for the Authenticate middleware, which ensures that the user is authenticated.
        'auth' => \App\Http\Middleware\Authenticate::class,

        // Alias for basic HTTP authentication, requiring a username and password.
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,

        // Alias for session-based authentication, ensuring that the session is authenticated.
        'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,

        // Alias for setting cache headers on HTTP responses to control caching behavior.
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,

        // Alias for authorization checks, ensuring that the user has permission to perform an action.
        'can' => \Illuminate\Auth\Middleware\Authorize::class,

        // Alias for redirecting authenticated users to another page, typically used to prevent logged-in users from accessing the login or register pages.
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,

        // Alias for requiring the user to confirm their password before accessing sensitive areas.
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,

        // Alias for validating signed URLs, ensuring that the URL hasn't been tampered with.
        'signed' => \App\Http\Middleware\ValidateSignature::class,

        // Alias for throttling requests, limiting the number of requests a user can make in a given time period.
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,

        // Alias for ensuring that the user's email has been verified.
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,

        // Custom alias for the CheckUser middleware, which likely performs custom checks on the user.
        'checkuser'=>CheckUser::class,

    ];
}

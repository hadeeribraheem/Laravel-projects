<?php

namespace App\Filters;

use Closure;

class NameFilter
{
    public function handle($request, Closure $next)
    {
        // Check if the request contains a 'name' field
        if (request()->filled('name')) {
            // If the 'name' field is filled, apply the filter to the query
            return $next($request)->where('name', 'LIKE', '%' . request('name') . '%');
        }

        // If 'name' is not provided, just continue without applying any filter
        return $next($request);
    }
}

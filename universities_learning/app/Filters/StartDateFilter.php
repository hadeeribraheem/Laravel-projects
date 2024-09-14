<?php

namespace App\Filters;

use Closure;

class StartDateFilter
{
    public function handle($request, Closure $next)
    {
        // Check if the request contains a 'start_date' field
        if (request()->filled('start_date')) {
            // If 'start_date' is provided, add a where condition to filter records
            // with 'created_at' greater than or equal to the start date.
            return $next($request)
                ->where('created_at', '>=', request('start_date'));
        }

        // If 'start_date' is not provided, continue the request without applying the filter
        return $next($request);
    }
}

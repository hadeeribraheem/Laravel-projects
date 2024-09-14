<?php

namespace App\Filters;

use Closure;

class EndDateFilter
{
    public function handle($request, Closure $next)
    {
        // Check if the request contains a 'end_date' field
        if (request()->filled('end_date')) {
            // If 'end_date' is provided, add a where condition to filter records
            // with 'created_at' smaller than or equal to the end_date.
            return $next($request)
                ->where('created_at', '<=', request('end_date'));
        }

        // If 'end_date' is not provided, continue the request without applying the filter
        return $next($request);
    }
}

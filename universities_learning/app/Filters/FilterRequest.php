<?php

namespace App\Filters;

use Closure;
use Illuminate\Support\Str;

class FilterRequest
{
    public function handle($request, Closure $next)
    {
        // Get the class name, i.e., 'SubjectIdFilter'
        $filter = class_basename($this);

        // Remove 'Filter' from the class name, resulting in 'SubjectId'
        $filter = str_replace('Filter', '', $filter);

        // Convert 'SubjectId' to snake_case, resulting in 'subject_id'
        $filter = Str::snake($filter);

        //dd($filter);
        // If the request has the field 'subject_id', apply a 'where' clause to the query
        if (request()->filled($filter)) {
            return $next($request)->where($filter, request($filter));
        }

        // If the request doesn't have the field, continue without applying the filter
        return $next($request);
    }
}

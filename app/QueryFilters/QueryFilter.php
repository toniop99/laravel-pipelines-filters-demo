<?php

namespace App\QueryFilters;

abstract class QueryFilter
{
    protected $filterName = '';

    protected abstract  function apply($builder);

    public function handle($request, \Closure $next) {
        if(! request()->has($this->filterName)) {
            return $next($request);
        }

        $builder = $next($request);
        return $this->apply($builder);
    }
}

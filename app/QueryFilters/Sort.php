<?php

namespace App\QueryFilters;

class Sort extends QueryFilter
{

    protected $filterName = 'sort';

    protected function apply($builder)
    {
        return $builder->orderBy('name', request()->input($this->filterName));
    }
}

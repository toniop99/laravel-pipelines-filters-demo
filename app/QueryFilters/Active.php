<?php

namespace App\QueryFilters;

class Active extends QueryFilter
{

    protected $filterName = 'active';

    protected function apply($builder)
    {
        return $builder->where($this->filterName, request()->input($this->filterName));
    }
}

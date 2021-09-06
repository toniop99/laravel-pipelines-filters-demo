<?php

namespace App\QueryFilters;

class Id extends QueryFilter
{

    protected $filterName = 'id';

    protected function apply($builder)
    {
        return $builder->where($this->filterName, request()->input($this->filterName));
    }
}

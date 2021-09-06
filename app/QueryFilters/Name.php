<?php

namespace App\QueryFilters;

class Name extends QueryFilter
{

    protected $filterName = 'name';

    protected function apply($builder)
    {
        return $builder->where($this->filterName, 'like','%' . request()->input($this->filterName) . '%');
    }
}

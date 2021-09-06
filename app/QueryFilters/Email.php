<?php

namespace App\QueryFilters;

class Email extends QueryFilter
{

    protected $filterName = 'email';

    protected function apply($builder)
    {
        return $builder->where($this->filterName, 'like','%' . request()->input($this->filterName) . '%');
    }
}

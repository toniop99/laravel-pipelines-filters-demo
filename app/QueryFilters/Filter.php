<?php

namespace App\QueryFilters;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Collection;

final class Filter
{
    /**
     * @param Builder $query
     * @param array $filters
     * @param bool $pagination
     * @return LengthAwarePaginator|Builder[]|Collection
     */
    public static function applyFilters(Builder $query, array $filters, bool $pagination = true) {
        $result = app(Pipeline::class)
            ->send($query)
            ->through($filters)
            ->thenReturn();

        if($pagination) {
            $data = $result->paginate(20);
        } else {
            $data = $result->get();
        }

        return $data;
    }
}

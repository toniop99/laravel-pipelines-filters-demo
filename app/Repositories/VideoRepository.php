<?php

namespace App\Repositories;

use App\QueryFilters\Active;
use App\QueryFilters\Email;
use App\QueryFilters\Filter;
use App\QueryFilters\Id;
use App\QueryFilters\Name;
use App\QueryFilters\Sort;
use App\User;
use App\Video;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class VideoRepository
{
    /**
     * @param bool $pagination
     * @return LengthAwarePaginator|Builder[]|Collection
     */
    public function allVideosPipelines(bool $pagination = true) {
        return Filter::applyFilters(Video::query(),
            [
                Name::class,
                Id::class,
                Email::class,
                Sort::class,
            ],$pagination);
    }


    /**
     * @param int|null $id
     * @param string|null $name
     * @param bool|null $active
     * @param string|null $email
     * @param string|null $sort
     * @param bool $pagination
     * @return LengthAwarePaginator|Builder[]|Collection
     */
    public function allVideos(int $id = null, string $name = null, bool $active = null, string $email = null, string $sort = null, bool $pagination = false) {
        $query = Video::query();

        if ($active) {
            $query->where('active', $active);
        }

        if ($id) {
            $query->where('id', $id);
        }

        if ($sort) {
            $query->orderBy('name', $sort);
        }

        if ($name) {
            $query->where('name', 'like', '%' . $name . '%');
        }

        if ($email) {
            $query->where('email', 'like', '%' . $email . '%');
        }

        if($pagination) {
            $result = $query->paginate(20);
        } else {
            $result = $query->get();
        }

        return $result;
    }
}

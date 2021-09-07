<?php

namespace App\Repositories;

use App\QueryFilters\Active;
use App\QueryFilters\Email;
use App\QueryFilters\Filter;
use App\QueryFilters\Id;
use App\QueryFilters\Name;
use App\QueryFilters\Sort;
use App\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class UserRepository
{
    /**
     * @param bool $pagination
     * @return LengthAwarePaginator|Builder[]|Collection
     */
    public function allUsersPipelines(bool $pagination = true) {
        return Filter::applyFilters(User::query(),
            [
                Active::class,
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
    public function allUsers(int $id = null, string $name = null, bool $active = null, string $email = null, string $sort = null, bool $pagination = false) {
        $query = User::query();

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

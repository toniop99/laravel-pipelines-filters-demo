<?php

namespace App\Repositories;

use App\QueryFilters\Active;
use App\QueryFilters\Email;
use App\QueryFilters\Id;
use App\QueryFilters\Name;
use App\QueryFilters\Sort;
use App\User;
use Illuminate\Pipeline\Pipeline;

class UserRepository
{
    public function __construct()
    {
    }

    public function allUsers(bool $pagination = true) {
        $data = null;

        $query = User::query();
        $users = app(Pipeline::class)
            ->send($query)
            ->through([
                Active::class,
                Name::class,
                Id::class,
                Email::class,
                Sort::class,
            ])
            ->thenReturn();

        if($pagination) {
            $data = $users->paginate(20);
        } else {
            $data = $users->get();
        }
        return $data;
    }
}

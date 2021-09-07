<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class UserService
{
    protected UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }


    /**
     * @param bool $pagination
     * @return LengthAwarePaginator|Builder[]|Collection
     */
    public function allPipelines(bool $pagination = true)
    {
        return $this->userRepository->allUsersPipelines($pagination);
    }

    /**
     * @param Request $request
     * @return LengthAwarePaginator|Builder[]|Collection
     */
    public function all(Request $request) {
        $active = null;
        $id = null;
        $sort = null;
        $name = null;
        $email = null;

        if ($request->has('active')) {
            $active = $request->input('active');
        }

        if ($request->has('id')) {
            $id = $request->input('id');
        }

        if ($request->has('sort')) {
            $sort = $request->input('sort');
        }

        if ($request->has('name')) {
            $name = $request->input('name');
        }

        if ($request->has('email')) {
            $email = $request->input('email');
        }
        return $this->userRepository->allUsers($id, $name, $active, $email, $sort, true);
    }
}

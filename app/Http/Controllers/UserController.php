<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(Request $request)
    {
        // First Option
//        try {
//            $users = $this->userService->all($request);
//            return view('users.list', compact('users'));
//        } catch (Exception $e) {
//            return view('users.list', ['error' => true, 'message' => $e->getMessage()]);
//        }

        // Second Option
        try {
            $users = $this->userService->allPipelines(true);
            return view('users.list', compact('users'));
        } catch (Exception $e) {
            return view('users.list', ['error' => true, 'message' => $e->getMessage()]);
        }

    }
}

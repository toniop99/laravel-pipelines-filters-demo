<?php

namespace App\Http\Controllers;

use App\QueryFilters\Active;
use App\QueryFilters\Email;
use App\QueryFilters\Id;
use App\QueryFilters\Name;
use App\QueryFilters\Sort;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;

class UserController extends Controller
{
    public function index(Request $request)
    {
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
            ->thenReturn()
            ->paginate(20);

//        if ($request->has('active')) {
//            $query->where('active', $request->input('active'));
//        }
//
//        if ($request->has('id')) {
//            $query->where('id', $request->input('id'));
//        }
//
//        if ($request->has('sort')) {
//            $query->orderBy('name', $request->input('sort'));
//        }
//
//        if ($request->has('name')) {
//            $query->where('name', 'like', '%' . $request->input('name') . '%');
//        }
//
//        if ($request->has('email')) {
//            $query->where('email', 'like', '%' . $request->input('email') . '%');
//        }
//
//        $users = $query->paginate(20);
        return view('users.list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

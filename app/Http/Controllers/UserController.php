<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index()
    {
        try {
            $listUser = User::all(['id', 'name', 'email']);
            return Inertia::render('User/Index', ['listUser' => $listUser]);
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage());
        }
    }

    public function create()
    {
        try {
            return Inertia::render('User/Create');
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage());
        }
    }

    public function store(UserRequest $request)
    {
        try {

            User::create($request->all());

            /* $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);

            $user->save(); */

            return to_route('user.index');
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage());
        }
    }

    public function show(User $user)
    {
        try {
            return Inertia::render('User/Show', ['userV' => $user]);
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage());
        }
    }

    public function edit(User $user)
    {
        try {
            return Inertia::render('User/Edit', ['userE' => $user]);
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage());
        }
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        try {
            $user->name = $request->name;
            $user->email = $request->email;

            $user->save();

            return to_route('user.show', $user->id);
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage());
        }
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();
            return to_route('user.index');
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage());
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\User;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;

class UserController extends Controller
{
    public function index()
    {
        return UserResource::collection(User::whereNameLike(request()->name)->orderByDesc('created_at')->get());
    }

    public function store(StoreUserRequest $request)
    {
        return new UserResource(
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ])
        );
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        return new UserResource(
            tap($user)->update($request->only(['name', 'email']))
        );
    }
}

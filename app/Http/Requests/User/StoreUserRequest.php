<?php

namespace App\Http\Requests\User;

class StoreUserRequest extends BaseRequest
{
    public function requestRules() : array
    {
        return [
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ];
    }
}

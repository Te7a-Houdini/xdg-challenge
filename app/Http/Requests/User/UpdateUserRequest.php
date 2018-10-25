<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends BaseRequest
{
    public function requestRules() : array
    {
        return [
            'email' => 'required|string|email|max:255|unique:users,email,' . $this->route('user')->id,
        ];
    }
}

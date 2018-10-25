<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use Illuminate\Validation\ValidationException;

class SocialAuthController extends Controller
{
    public function redirectToProvider($provider)
    {
        $this->validateProvider($provider);

        return Socialite::driver($provider)->redirect();
    }


    public function handleProviderCallback($provider)
    {
        $this->validateProvider($provider);

        $user = Socialite::driver($provider)->user();
        dd($user);
    }

    private function validateProvider($provider)
    {
        $validator = app('validator')->make(['provider' => $provider], ['provider' => 'required|in:google,facebook,twitter']);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }
}

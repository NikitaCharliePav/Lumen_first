<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Arr;

class UserService
{
    public function createUser(array $data)
    {
        $user = new User();
        $user->setAttribute('login', Arr::get($data, 'login'));
        $user->setAttribute('email', Arr::get($data, 'email'));
        $user->setAttribute('name', Arr::get($data, 'name'));
        $user->setAttribute('birthday_at', Arr::get($data, 'birthday_at'));
        $user->setAttribute('gender', Arr::get($data, 'gender'));
        $user->setAttribute('password', Arr::get($data, 'password'));
        $user->save();

        return $user;
    }
}

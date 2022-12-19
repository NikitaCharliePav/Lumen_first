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
        $user->save();

        return $user;
    }
}

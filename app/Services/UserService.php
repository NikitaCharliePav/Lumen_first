<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Arr;
use Carbon\Carbon;

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

    public function getUsersWithEmail()
    {
        $user = User::select('login', 'email', 'name')->where('email', '!=', null)->orderBy('name')->get();
        return $user;
    }

    public function getNewUsers()
    {
        $date = Carbon::today()->subDay(3)->format('Y-m-d H:i:s');

        $user = User::select('login', 'email', 'name', 'created_at')->where('created_at', '>=', $date)->orderBy('created_at')->get();
        return $user;
    }

    public function getUserByEmail($email)
    {
        $user = User::where('email', $email)->first();
        return $user;
    }

    public function getUsersWithOrders()
    {
        $user = User::has('orders')->with('orders')->get();
        return $user;
    }

    public function getUserBirthday(string $userId)
    {
        $user = User::find($userId);
        $userBirthday = $user->birthday_at;
        return $userBirthday;
    }

    public function getUserById(string $userId)
    {
        $user = User::with('favorites.products')->find($userId);

        return $user;
    }
}

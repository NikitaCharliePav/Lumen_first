<?php

namespace App\Services;

use App\Models\User;
use Carbon\Traits\Date;
use Exception;
use Illuminate\Support\Arr;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class UserService
{
    /**
     * @param array $data
     * @return User
     */
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

    /**
     * @return User|null
     */
    public function getUsersWithEmail()
    {
        $user = User::select('login', 'email', 'name')->where('email', '!=', null)->orderBy('name')->get();
        return $user;
    }

    /**
     * @return User|null
     */
    public function getNewUsers()
    {
        $date = Carbon::today()->subDay(3)->format('Y-m-d H:i:s');

        $user = User::select('login', 'email', 'name', 'created_at')->where('created_at', '>=', $date)->orderBy('created_at')->get();
        return $user;
    }

    /**
     * @param $email
     * @return User|null
     */
    public function getUserByEmail($email)
    {
        $user = User::where('email', $email)->first();
        return $user;
    }

    /**
     * @return User|null
     */
    public function getUsersWithOrders()
    {
        $user = User::has('orders')->with('orders')->get();
        return $user;
    }

    /**
     * @param string $userId
     * @return Date
     */
    public function getUserBirthday(string $userId)
    {
        $user = User::find($userId);
        if(empty($user)){
            throw new Exception('error', 404);
        }
        $userBirthday = $user->birthday_at;
        return $userBirthday;
    }

    /**
     * @param string $userId
     * @return User|null
     */
    public function getUserById(string $userId)
    {
        $minutes = 60;
        $user = Cache::remember("user_$userId", $minutes, function () use ($userId) {
            return User::with('favorites.products')->find($userId);
        });

        return $user;
    }
}

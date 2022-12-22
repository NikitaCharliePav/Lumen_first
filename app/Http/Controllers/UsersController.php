<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderRequest;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\GetUserByEmailRequest;
use App\Services\UserService;
use Illuminate\Http\Request;
use \Illuminate\Routing\Controller;

class UsersController extends Controller
{
    protected UserService $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function createUsers(CreateUserRequest $request)
    {
        $data = $request->input();
        $user = $this->service->createUser($data);
        return response(['success' => true, 'user' => $user], 200);
    }

    public function getUsersWithEmail()
    {
        $user = $this->service->getUsersWithEmail();

        return response($user);
    }

    public  function getNewUsers()
    {
        $user = $this->service->getNewUsers();

        return response($user);
    }

    public function getUserByEmail(GetUserByEmailRequest $request)
    {
        $email = $request->get('email');
        $user = $this->service->getUserByEmail($email);

        return $user;
    }

    public function getUsersWithOrders()
    {
        $user = $this->service->getUsersWithOrders();

        return response($user);
    }

    public function getUserBirthday(string $id)
    {
        $userBirthday = $this->service->getUserBirthday($id);

        return response($userBirthday);
    }

    public  function getUserById(string $id)
    {
        $user = $this->service->getUserById($id);

        return response($user);
    }

}

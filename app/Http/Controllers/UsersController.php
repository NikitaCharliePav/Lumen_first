<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderRequest;
use App\Http\Requests\CreateUserRequest;
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

}

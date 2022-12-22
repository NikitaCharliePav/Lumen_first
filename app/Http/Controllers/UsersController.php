<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderRequest;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\GetUserByEmailRequest;
use App\Services\UserService;
use Illuminate\Http\Request;
use \Illuminate\Routing\Controller;

/**
 * @group Users.
 */
class UsersController extends Controller
{
    /**
     * @var UserService
     */
    protected UserService $service;

    /**
     * @param UserService $service
     */
    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    /**
     * Users
     *
     * Создание юзера.
     * <aside class="success">Возвращает объект пользователя</aside>
     * <aside class="warning">При ошибки валидации возвращает статус 422</aside>
     *
     * @param CreateUserRequest $request
     * @return \Illuminate\Http\Response
     */
    public function createUsers(CreateUserRequest $request)
    {
        $data = $request->input();
        $user = $this->service->createUser($data);
        return response(['success' => true, 'user' => $user], 200);
    }

    /**
     * Users(WithEmail)
     *
     * Получение юзеров у которых заполнено поле email.
     * <aside class="success">Возвращает объект пользователей</aside>
     *
     * @return \Illuminate\Http\Response
     */
    public function getUsersWithEmail()
    {
        $user = $this->service->getUsersWithEmail();

        return response($user);
    }

    /**
     * Users(New)
     *
     * Получение новых юзеров, за последние 3 дня.
     * <aside class="success">Возвращает объект пользователей</aside>
     *
     * @return \Illuminate\Http\Response
     */
    public  function getNewUsers()
    {
        $user = $this->service->getNewUsers();

        return response($user);
    }

    /**
     * Users(ByEmail)
     *
     * Получение юзеров по email.
     * <aside class="success">Возвращает объект пользователя</aside>
     * <aside class="warning">При ошибки валидации возвращает статус 422</aside>
     *
     * @param GetUserByEmailRequest $request
     * @return \Illuminate\Http\Response
     */
    public function getUserByEmail(GetUserByEmailRequest $request)
    {
        $email = $request->get('email');
        $user = $this->service->getUserByEmail($email);

        return response($user);
    }

    /**
     * Users(WithOrder)
     *
     * Получение юзеров с заказами.
     * <aside class="success">Возвращает объект пользователй</aside>
     *
     * @return \Illuminate\Http\Response
     */
    public function getUsersWithOrders()
    {
        $user = $this->service->getUsersWithOrders();

        return response($user);
    }

    /**
     * Users(Birthday)
     *
     * Получение юзеров у которых заполнено поле даты рождения.
     * <aside class="success">Возвращает дату дня рождения пользователя</aside>
     * <aside class="warning">Возвращает ошибку 404 если не нашел пользователя</aside>
     *
     * @param string $id
     * @return \Illuminate\Http\Response
     */
    public function getUserBirthday(string $id)
    {
        $userBirthday = $this->service->getUserBirthday($id);

        return response($userBirthday);
    }

    /**
     * Users(ById)
     *
     * Получение юзера по Id.
     * <aside class="success">Возвращает объект пользователя</aside>
     *
     * @param string $id
     * @return \Illuminate\Http\Response
     */
    public  function getUserById(string $id)
    {
        $user = $this->service->getUserById($id);

        return response($user);
    }

}

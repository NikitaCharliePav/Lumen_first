<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderRequest;
use App\Http\Requests\LastUserOrderRequest;
use App\Services\OrderService;

/**
 * @group Orders.
 */
class OrderController extends Controller
{
    protected OrderService $service;


    public function __construct(OrderService $orderService)
    {
        $this->service = $orderService;
    }


    /**
     * Order
     *
     * Создание заказа.
     * <aside class="success">Возвращает объект класса заказ</aside>
     * <aside class="warning">При ошибки валидации возвращает статус 422. Если передан неизвестный продукт возвращает статус 404</aside>
     *
     * @param CreateOrderRequest $request
     * @return \Illuminate\Http\Response
     */
    public function createOrder(CreateOrderRequest $request)
    {
        $userId = $request->input('user_id');
        $products = $request->input('products');
        $order = $this->service->createOrder($userId, $products);
        return response(['success' => true, 'order' => $order], 200);
    }

    /**
     * Order(lastUser)
     *
     * Получение последнего заказа пользователя.
     * <aside class="success">Возвращает объект последнего заказа пользователя</aside>
     * <aside class="warning">При ошибки валидации возвращает статус 422</aside>
     *
     * @param LastUserOrderRequest $request
     * @return \Illuminate\Http\Response
     */
    public function getLastUserOrder(LastUserOrderRequest $request)
    {
        $userId = $request->input('user_id');
        $order = $this->service->getLastUserOrder($userId);

        return response($order);
    }

    /**
     * Order(SumProducts)
     *
     * Получение суммы стоймости продуктов в заказе.
     * <aside class="success">Возвращает сумму стоймости продуктов в заказе</aside>
     *
     * @param string $id
     * @return \Illuminate\Http\Response
     */
    public function getSumProductsByOrder(string $id)
    {
        $sum = $this->service->getSumProductsByOrder($id);

        return response($sum);

    }
}

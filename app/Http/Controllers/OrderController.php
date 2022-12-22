<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderRequest;
use App\Http\Requests\LastUserOrderRequest;
use App\Services\OrderService;


class OrderController extends Controller
{
    protected OrderService $service;


    public function __construct(OrderService $orderService)
    {
        $this->service = $orderService;
    }


    public function createOrder(CreateOrderRequest $request)
    {
        $userId = $request->input('user_id');
        $products = $request->input('products');
        $order = $this->service->createOrder($userId, $products);
        return response(['success' => true, 'order' => $order], 200);
    }

    public function getLastUserOrder(LastUserOrderRequest $request)
    {
        $userId = $request->input('user_id');
        $order = $this->service->getLastUserOrder($userId);

        return response($order);
    }

    public function getSumProductsByOrder(string $id)
    {
        $sum = $this->service->getSumProductsByOrder($id);

        return response($sum);

    }
}

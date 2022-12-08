<?php

namespace Test\Unit;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Services\OrderService;
use Tests\TestCase;

class CreateOrderTest extends TestCase
{
    private User $user;
    protected array $products;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = User::first();
        $this->products = Product::limit(3)->get()->pluck('id')->toArray();
    }
    public function testCreateOrder(){
        if(empty($this->user)){
            return true;
        }
         $orderService = new OrderService();
         $order = $orderService->createOrder($this->user->id,$this->products);
         $this->assertInstanceOf(Order::class,$order);
    }

}

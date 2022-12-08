<?php

namespace Test\Unit;

use App\Services\ProductsService;
use Illuminate\Pagination\LengthAwarePaginator;
use Tests\TestCase;

class GetProductsTest extends TestCase
{

    public function testGetProducts()
    {
        $limit = 5;
        $productService = new ProductsService();
        $products = $productService->getProducts($limit);
        $this->assertInstanceOf(LengthAwarePaginator::class,$products);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaginationRequest;
use App\Services\ProductsService;


class ProductsController extends Controller
{
    protected ProductsService $service;

    public function __construct(ProductsService $productsService)
    {
        $this->service = $productsService;
    }

    public function getProducts(PaginationRequest $request)
    {
        $limit = $request->get('limit');
        $products = $this->service->getProducts($limit);

        return response($products);
    }
}

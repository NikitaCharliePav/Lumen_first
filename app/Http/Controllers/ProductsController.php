<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetProductByNameRequest;
use App\Http\Requests\PaginationRequest;
use App\Services\ProductsService;
use Illuminate\Http\Request;


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
    public function getProduct(string $id)
    {
        $product = $this->service->getProduct($id);

        return response($product);
    }

    public function getProductByName(GetProductByNameRequest $request)
    {
        $name = $request->get('name');
        $product = $this->service->getProductByName($name);

        return $product;
    }
}

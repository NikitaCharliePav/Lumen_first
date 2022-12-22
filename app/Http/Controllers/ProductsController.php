<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetProductByNameRequest;
use App\Http\Requests\PaginationRequest;
use App\Services\ProductsService;
use Illuminate\Http\Request;

/**
 * @group Products.
 */
class ProductsController extends Controller
{
    protected ProductsService $service;

    /**
     * @param ProductsService $productsService
     */
    public function __construct(ProductsService $productsService)
    {
        $this->service = $productsService;
    }

    /**
     * Products
     *
     * Получение продуктов с пагинацией.
     * <aside class="notice">Пример аннотации😕</aside>
     * <aside class="success">Возвращает объект продуктов с пагинации</aside>
     * <aside class="warning">При ошибки валидации возвращает статус 422</aside>
     * @param PaginationRequest $request
     * @return \Illuminate\Http\Response
     */
    public function getProducts(PaginationRequest $request)
    {
        $limit = $request->get('limit');
        $products = $this->service->getProducts($limit);

        return response($products);
    }

    /**
     * Product(Id)
     *
     * Получение продукта по Id.
     * <aside class="success">Возвращает объект продукта</aside>
     *
     * @param string $id
     * @return \Illuminate\Http\Response
     */
    public function getProduct(string $id)
    {
        $product = $this->service->getProduct($id);

        return response($product);
    }

    /**
     * Product(Name)
     *
     * Получение продукта по имени.
     * <aside class="success">Возвращает объект продукта</aside>
     * <aside class="warning">При ошибки валидации вернеет 422</aside>
     *
     * @param GetProductByNameRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProductByName(GetProductByNameRequest $request)
    {
        $name = $request->get('name');
        $product = $this->service->getProductByName($name);

        return response()->json($product);
    }
}

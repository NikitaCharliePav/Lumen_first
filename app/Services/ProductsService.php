<?php
namespace App\Services;

use App\Models\Product;


class ProductsService
{
    public function getProducts(int $limit = 20)
    {
        return Product::paginate($limit);
    }
}

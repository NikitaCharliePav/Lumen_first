<?php
namespace App\Services;

use App\Models\Product;


class ProductsService
{
    public function getProducts(int $limit = 20)
    {
        return Product::paginate($limit);
    }

    public function getProduct(string $id)
    {
        $product = Product::find($id);
        return $product;
    }

    public function getProductByName($name)
    {
        $product = Product::where('name', $name)->first();
        return $product;
    }
}

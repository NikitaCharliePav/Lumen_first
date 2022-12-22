<?php
namespace App\Services;

use App\Models\Product;
use Illuminate\Pagination\Paginator;


class ProductsService
{
    /**
     * @param int $limit
     * @return Paginator
     */
    public function getProducts(int $limit = 20)
    {
        return Product::paginate($limit);
    }

    /**
     * @param string $id
     * @return Product|null
     */
    public function getProduct(string $id)
    {
        $product = Product::find($id);
        return $product;
    }

    /**
     * @param $name
     * @return Product|null
     */
    public function getProductByName($name)
    {
        $product = Product::where('name', $name)->first();
        return $product;
    }
}

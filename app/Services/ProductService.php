<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Product;

class ProductService implements ProductServiceInterface
{
    public function createProduct(int $categoryId, string $vendor): Product
    {
        $product = new Product();
        $category = Category::find($categoryId);

        $product->category()->associate($category);
        $product->vendor = $vendor;

        $product->save();

        return $product;
    }
}

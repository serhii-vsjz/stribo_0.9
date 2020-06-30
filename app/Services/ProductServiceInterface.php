<?php

namespace App\Services;

use App\Models\Product;

interface ProductServiceInterface
{
    public function createProduct(int $categoryId, string $vendor): Product;
    public function addProductAttributes(Product $product, array $attributes): Product;
}

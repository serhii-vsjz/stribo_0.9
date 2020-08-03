<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Collection;


interface ProductServiceInterface
{
    public function createProduct(int $categoryId, string $vendor): Product;
    public function addProductAttributes(Product $product, array $attributes): Product;
    public function addProductsFromArray(array $arrayPage);
    public function getProductByVendor($vendor): Product;
}

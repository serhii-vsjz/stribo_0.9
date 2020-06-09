<?php


namespace App\Repositories;

use App\Models\Category;
use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    public function all()
    {
        return Product::all();
    }

    public function getByCategory(Category $category)
    {
        return Product::where('category_id', $category->id)->get();
    }
}

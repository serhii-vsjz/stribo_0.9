<?php


namespace App\Services;


use App\Models\Category;

class  CategoryService implements CategoryServiceInterface
{
    public function getCategoryByVendor($name)
    {
        $category = Category::where('vendor', $name)->first();
        return $category;
    }

    public function getCategoryById(int $id): Category
    {
        return Category::find($id);
    }
}

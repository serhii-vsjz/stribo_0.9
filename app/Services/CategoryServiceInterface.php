<?php


namespace App\Services;


use App\Models\Category;

interface CategoryServiceInterface
{
    public function getCategoryById(int $id): Category;
    public function getCategoryByVendor($name);
}

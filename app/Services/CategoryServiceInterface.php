<?php


namespace App\Services;


use App\Models\Category;

interface CategoryServiceInterface
{
    public function getCategoryByName($name): Category;
}

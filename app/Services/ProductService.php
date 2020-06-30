<?php

namespace App\Services;

use App\Models\Attribute;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductAttribute;

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

    public function addProductAttributes(Product $product, array $attributes): Product
    {
        foreach ($attributes as $name => $value)
        {
            if (!($attribute = (Attribute::where('name', $name)->first())))
            {
                $attribute = new Attribute();
                $attribute->name = $name;
                $attribute->group = 'dimensions';

                if (is_numeric($value))
                {
                    if (ctype_digit($value)) {
                        $attribute->type = 'int';
                    } else {
                        $attribute->type = 'float';
                    }

                } else {
                    $attribute->type = 'string';
                }



                $attribute->save();
            }

            $productAttribute = new ProductAttribute();
            $productAttribute->attribute()->associate($attribute);
            $productAttribute->product()->associate($product);
            $productAttribute->setValue($value);
            $productAttribute->save();
        }

        return $product;
    }
}

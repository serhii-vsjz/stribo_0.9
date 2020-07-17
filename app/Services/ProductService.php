<?php

namespace App\Services;

use App\Models\Attribute;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductAttribute;
use Illuminate\Support\Collection;

class ProductService implements ProductServiceInterface
{
    private $categoryService;

    public function __construct(CategoryServiceInterface $categoryService)
    {
        $this->categoryService = $categoryService;
    }

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
            if (!$name)
            {
                continue;
            }

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

    public function addProductsFromArray(array $arrayPage)
    {
        foreach ($arrayPage as $page)
        {
            $headRow = array_shift($page);
            $indexCategory = array_search('Category', $headRow);
            $indexVendor = array_search('Vendor', $headRow);

            foreach ($page as $row)
            {
                $product = new Product();
                $product->vendor = $row[$indexVendor];
                $category = $this->categoryService->getCategoryById($row[$indexCategory]);
                $product->category()->associate($category);
                $product->save();

                unset($headRow[$indexCategory]);
                unset($headRow[$indexVendor]);
                unset($row[$indexCategory]);
                unset($row[$indexVendor]);

                $attributes = array_combine($headRow, $row);

                $this->addProductAttributes($product, $attributes);
            }
        }
    }
}

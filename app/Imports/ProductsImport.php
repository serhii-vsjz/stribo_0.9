<?php

namespace App\Imports;

use App\Models\Product;
use App\Models\ProductAttribute;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
       dd($row);

        die();

        $product = new Product([
            'category_id' => $row[0],
            'vendor' => $row[1],
            'image' => $row[2],
        ]);

        $product->save();

        $productAttribute = new ProductAttribute();
        $productAttribute->product_id = $product->id;
        $productAttribute->attribute_id = $row[3];
        $productAttribute->int_value = $row[4];
        $productAttribute->save();

        return $product;
    }
}

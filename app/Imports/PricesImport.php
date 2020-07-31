<?php

namespace App\Imports;

use App\Models\Price;
use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class PricesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return Product
    */
    public function model(array $row)
    {
        $product = new Product([
            'category_id' => $row[0],
            'vendor' => $row[1],
        ]);

        $product->save();

        $price = new Price([
            'product_id' => $product->id,
            'value' => $row[2],
            'is_calc' => false,
        ]);

        $price->save();

        return $product;
    }
}

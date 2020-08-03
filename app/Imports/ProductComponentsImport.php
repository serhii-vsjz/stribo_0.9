<?php

namespace App\Imports;

use App\Models\ProductComponent;
use App\Services\ProductService;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductComponentsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        $productService = new ProductService();

        $product = $productService->getProductByVendor($row[1]);

        $component = $productService->getProductByVendor($row[2]);

        return new ProductComponent([
            'product_id' => $product->id,
            'component_id' => $component->id,
            'contains' => $row[3],
            'proportion' => $row[4],
            'coefficient' => $row[5],
        ]);
    }
}

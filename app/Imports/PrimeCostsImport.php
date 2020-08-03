<?php

namespace App\Imports;

use App\Models\Category;
use App\Models\PrimeCost;
use App\Services\CategoryServiceInterface;
use App\Services\ProductService;
use App\Services\ProductServiceInterface;
use Maatwebsite\Excel\Concerns\ToModel;

class PrimeCostsImport implements ToModel
{
    private $productService;


    /**
    * @param array $row
    *
    * @return PrimeCost
    */
    public function model(array $row)
    {

        $productService = new ProductService();
        $product = $productService->getProductByVendor($row[1]);


        return new PrimeCost([
            'product_id' => $product->id,
            'cost' => $row[2],
            'is_calc' => $row[3]??0,
        ]);
    }
}

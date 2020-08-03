<?php

namespace App\Imports;

use App\Models\PrimeCost;
use Maatwebsite\Excel\Concerns\ToModel;

class PrimeCostsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return PrimeCost
    */
    public function model(array $row)
    {
        return new PrimeCost([
            'product_id' => $row[0],
            'cost' => $row[1],
        ]);
    }
}

<?php

namespace App\Imports;

use App\Models\Price;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;


class PriceImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return Model|Model[]|null
     */
    public function model(array $row)
    {
        return new Price([
            'product_id' => $row[0],
            'value' => $row[2],
            'is_calc' => false,
        ]);
    }

}

<?php

namespace App\Imports;

use App\Models\Service;
use Maatwebsite\Excel\Concerns\ToModel;

class ServicesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Service([
            'title' => $row[0],
            'cost' => $row[1],
        ]);
    }
}

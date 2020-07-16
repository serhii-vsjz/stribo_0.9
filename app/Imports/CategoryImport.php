<?php

namespace App\Imports;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;

class CategoryImport implements ToModel
{


    /**
     * @param array $row
     *
     * @return Model|Model[]|null
     */
    public function model(array $row)
    {
        return new Category([
            'parent_id' => $row[0],
            'title' => $row[1],
            'vendor' => $row[2],
            'image' => $row[3],
            'drawing' => $row[4],
            'active' => $row[5],
        ]);
    }
}

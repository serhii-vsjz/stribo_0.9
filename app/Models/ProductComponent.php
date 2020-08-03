<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductComponent extends Model
{
    protected $fillable = [
        'product_id',
        'component_id',
        'contains',
        'proportion',
        'coefficient',
    ];
}

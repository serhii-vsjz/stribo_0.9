<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PriceTable extends Model
{
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
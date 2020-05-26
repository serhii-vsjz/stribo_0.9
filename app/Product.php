<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function feature(): HasOne
    {
        return $this->hasOne(FeatureTable::class);
    }

    public function price(): HasOne
    {
        return $this->hasOne(PriceTable::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class ProductAttribute
 * @package App
 * @field int_value
 */
class ProductAttribute extends Model
{

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function attribute(): BelongsTo
    {
        return $this->belongsTo(Attribute::class);
    }

    public function getValue()
    {
        switch ($this->attribute->type) {
            case 'int':
                return $this->int_value;
            case 'float':
                return $this->float_value;
            case 'string':
                return $this->string_value;
        }
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class ProductAttribute
 *
 * @package App
 * @field int_value
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $product_id
 * @property int $attribute_id
 * @property string|null $string_value
 * @property float|null $float_value
 * @property int|null $int_value
 * @property-read \App\Models\Attribute $attribute
 * @property-read \App\Models\Product $product
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductAttribute newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductAttribute newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductAttribute query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductAttribute whereAttributeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductAttribute whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductAttribute whereFloatValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductAttribute whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductAttribute whereIntValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductAttribute whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductAttribute whereStringValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductAttribute whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ProductAttribute extends Model
{
    protected $fillable = [
        'product_id',
        'attribute_id',
        'int_value',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function attribute(): BelongsTo
    {
        return $this->belongsTo(Attribute::class);
    }

    public function getName()
    {
        return $this->attribute->name;
    }

    public function getProductName()
    {
        return $this->product->vendor;
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

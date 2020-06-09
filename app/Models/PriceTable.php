<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\PriceTable
 *
 * @property int $id
 * @property int $product_id
 * @property float $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product $product
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PriceTable newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PriceTable newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PriceTable query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PriceTable whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PriceTable whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PriceTable wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PriceTable whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PriceTable whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PriceTable extends Model
{
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Collection;

/**
 * App\Models\Product
 *
 * @property int $id
 * @property int $category_id
 * @property string $vendor
 * @property string $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $feature_table_id
 * @property int|null $price_table_id
 * @property-read \App\Models\Category $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PriceTable[] $prices
 * @property-read int|null $prices_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProductAttribute[] $productAttributes
 * @property-read int|null $product_attributes_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereFeatureTableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product wherePriceTableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereVendor($value)
 * @mixin \Eloquent
 */
class Product extends Model
{
    protected $fillable = [
        'category_id',
        'vendor',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function price(): HasOne
    {
        return $this->hasOne(Price::class);
    }

    public function productAttributes(): HasMany
    {
        return $this->hasMany(ProductAttribute::class);
    }

    public function getAttributeValueByName($name)
    {
        $id = Attribute::where('name', $name)->first()->get()->id;

        dd($id);

        if(!$productAttribute = $this->productAttributes->where('attribute_id', $id)->first())
        {
            return false;
        }

        $value = $productAttribute->getValue();

        return $value;
    }

    public function getAttributeValueById($id)
    {
        if ($productAttribute = $this->productAttributes->where('attribute_id', $id)->first())
        {
            return $productAttribute->getValue();
        } else {
            return false;
        }
    }

    /**
     * Get all attributes existing in this product.
     *
     * @return Collection
     */
    public function getExistingAttributesId(): Collection
    {
        $attributesId = ProductAttribute::where('product_id', $this->id)->pluck('attribute_id');
        return $attributesId;
    }

    public function getExistingAttributes(): Collection
    {
        $attributesId = ProductAttribute::where('product_id', $this->id)->pluck('attribute_id');
        $attributes = Attribute::whereIn('id', $attributesId)->get();

        return $attributes;
    }

    public function getAttributeNames(): Collection
    {
        $products = $this->products;

        $attributes = collect();
        foreach ($products as $product)
        {
            foreach ($product->productAttributes as $productAttribute)
            {
                if (!$attributes->contains($productAttribute->getName()))
                {
                    $attributes->add($productAttribute->getName());
                }
            }
        }
        return $attributes;
    }

}

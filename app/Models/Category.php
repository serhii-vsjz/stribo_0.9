<?php

namespace App\Models;

use App\Models\Product;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

/**
 * App\Models\Category
 *
 * @property int $id
 * @property int $parent_id
 * @property string $title
 * @property string|null $vendor
 * @property string $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $active
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Category[] $children
 * @property-read int|null $children_count
 * @property-read \App\Models\Category $parent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
 * @property-read int|null $products_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereVendor($value)
 * @mixin \Eloquent
 */
class Category extends Model
{
    protected $fillable = [
        'parent_id',
        'title',
        'vendor',
        'image',
        'drawing',
        'active',
        'hide',
    ];

    public function children(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    /*implemented using an array*/
    /**
     * @return array
     */
    public function getTableProductsWithAttributes(): array
    {
        $products = $this->products;

        // get all existing attributes in products of this category
        $i = 0;
        $attributes[$i][] = 'Vendor';
        foreach ($products as $product) {
            foreach ($product->productAttributes as $productAttribute) {
                if (!(in_array($productAttribute->getName(), $attributes[$i])))
                {
                    $attributes[$i][] = $productAttribute->getName();
                }
            }
        }

        $i = 1;
        foreach ($products as $product) {
            $j = 0;
            $attributes[$i][$j] = $product->vendor;

            foreach ($product->productAttributes as $productAttribute) {
                if ($j = array_search($productAttribute->getName(), $attributes[0]))
                {
                    $attributes[$i][$j] = $productAttribute->getValue();
                } else {
                    $attributes[$i][$j++] = '-';
                }
            }
            $i++;
        }

        return $attributes;
    }

    /**
     *
     * General product attributes for this category
     *
     */
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

    public function getExistingAttributes(): Collection
    {
        $products = $this->products;
        $attributes = collect();
        foreach ($products as $product)
        {
            $attributes = $attributes->concat($product->getExistingAttributes())->unique();
        }

        return $attributes;
    }

    public function getExistingAttributesByGroups()
    {
        $attributes = $this->getExistingAttributes();
        $attributesByGroups = $attributes->groupBy('group');

        return $attributesByGroups->sort();
    }
}

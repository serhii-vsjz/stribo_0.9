<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Price extends Model
{
    protected $fillable = [
        'product_id',
        'value',
        'is_calc',
    ];


    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function costs():BelongsToMany
    {
        return $this->belongsToMany(
            Cost::class,
            'price_cost',
            'price_id',
            'cost_id')->withPivot('contains', 'proportion', 'coefficient');
    }

    /**
     * Get the base price of a product
     *
     *
     *
     */
    public function getValue()
    {
        if ($this->is_calc)
        {
            $value = 0;
            $costs = $this->costs;
            foreach ($costs as $cost)
            {
                $value += $cost->value * $cost->pivot->contains * $cost->pivot->proportion;
            }
            return $value;
        } else {
            return $value = $this->value;
        }
    }

    /*
     *
     *
     */
    public function getPriceByCoefficient($coefficient)
    {
        $coefficient /= 1000;
        $value0 = $this->getValue();
        $value = 0;
        $costs = $this->costs;


        foreach ($costs as $cost)
        {
            if ($cost->pivot->coefficient)
            {
                $value += $cost->value * $coefficient * $cost->pivot->proportion;
            }
        }
        $result = $value0 + $value;


        return $result;
    }


}

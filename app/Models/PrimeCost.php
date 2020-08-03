<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrimeCost extends Model
{
    protected $fillable = [
        'product_id',
        'cost',
        'is_calc',
    ];
    public $components;

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function services()
    {
        return $this->belongsToMany(
            Service::class,
            'prime_cost_service',
            'prime_cost_id',
            'service_id'
        );
    }

    private function getZeroPrimeCost()
    {
        $zeroPrimeCost = 0;

        foreach ($this->components as $component)
        {
            $zeroPrimeCost += $component->primeCost->getValue() * $component->pivot->contains * $component->pivot->proportion;
        }
        return $zeroPrimeCost;
    }

    private function getPrimeCost($coefficient)
    {
        $primeCost = 0;
        $coefficient /= 1000;

        foreach ($this->components as $component)
        {
            if ($component->pivot->coefficient)
            {
                $primeCost += $component->primeCost->getValue() * $coefficient;
            }

        }
        return $primeCost + $this->getZeroPrimeCost();
    }

    private function getServiceCost()
    {
        $serviceCost = 0;

        foreach ($this->services as $service)
        {
            $serviceCost += $service->getCost();
        }

        return $serviceCost;
    }

    public function getValue(int $coefficient = 1)
    {
        $this->components = $this->product->components;

        if (count($this->components))
        {

            return strval($this->getPrimeCost($coefficient) + $this->getServiceCost());
        } else {
             return $this->cost;
        }
    }
}

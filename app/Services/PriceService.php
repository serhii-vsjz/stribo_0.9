<?php


namespace App\Services;


use App\Models\Markup;
use App\Models\Price;
use App\Models\Product;

class PriceService implements PriceServiceInterface
{
    public function setPricesAtBaseMarkup ()
    {
        $markup = Markup::where('is_base', 1)->first()->getValue();

        $products = Product::all();
        foreach ($products as $product)
        {
            $primeCost = $product->primeCost->getValue();
            if ($product->price)
            {
                $product->price->setValue($primeCost * $markup);
                $product->save();
            } else {

                $price = new Price();
                $price->product_id = $product->id;
                $price->setValue($primeCost * $markup);
                $price->save();
            }
        }
    }
}

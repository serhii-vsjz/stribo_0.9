<?php

namespace App\Http\Controllers;

use App\Models\Price;
use App\Models\Product;
use Illuminate\Http\Request;


class PriceController extends Controller
{
    public function getPrice(Request $request)
    {
        $product = Product::find($request->product_id);
        $price = $product->price;
        $result = $price->getPriceByCoefficient($request->stroke);
        return $result;
    }
}

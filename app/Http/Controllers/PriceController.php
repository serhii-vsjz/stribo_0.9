<?php

namespace App\Http\Controllers;

use App\Models\Price;
use App\Models\Product;
use App\Services\PriceServiceInterface;
use Illuminate\Http\Request;


class PriceController extends Controller
{
    public $priceService;
    public function __construct(PriceServiceInterface $priceService)
    {
        $this->priceService = $priceService;
    }

    public function getPrice(Request $request)
    {
        $product = Product::find($request->product_id);
        $price = $product->price;
        $result = $price->getPriceByCoefficient($request->stroke);
        return $result;
    }

    public function setPrice()
    {
        $this->priceService->setPricesAtBaseMarkup();
        return 'ok';
    }
}

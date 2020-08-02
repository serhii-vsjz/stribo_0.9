<?php

namespace App\Http\Controllers;

use App\Models\Price;
use Illuminate\Http\Request;


class PriceController extends Controller
{
    public function getPrice(Request $request)
    {
        $result = $request->product . ' ход = ' .$request->stroke;
        $result = 'Випупу!';
        return $result;
    }
}

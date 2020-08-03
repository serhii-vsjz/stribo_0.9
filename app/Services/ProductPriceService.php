<?php


namespace App\Services;


class ProductPriceService
{
    private $markup;

    public function __construct($markup)
    {
        $this->markup = $markup;
    }
}

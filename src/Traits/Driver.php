<?php

namespace App\Traits;

use App\Interfaces\PriceExtra;

trait Driver
{
    public function addDriver(int &$price)
    {
        $price += PriceExtra::DRIVER;
        return $price;
    }
}
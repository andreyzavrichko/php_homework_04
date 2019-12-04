<?php
namespace App\Classes;
use App\Interfaces\PriceDistance;
use App\Interfaces\PriceExtra;
use App\Interfaces\PriceTime;
class RateBase extends AbstractRate
{
    /**
     * @return float|int
     */
    public function calcPriceDistance()
    {
        $priceDistance = $this->distance * PriceDistance::BASIC;
        return $priceDistance;
    }
    /**
     * @return float|int
     */
    public function calcPriceTime()
    {
        $priceTime = $this->duration * PriceTime::BASIC;
        return $priceTime;
    }
    /**
     * @return float|int
     */
    public function calculatePrice()
    {
        $totalPrice = $this->calcNetPrice();
        if ($this->needGps) {
            $gps = ceil($this->duration / RecountTime::MINUTE_IN_HOUR) * PriceExtra::GPS;
            $totalPrice += $gps;
        }
        return $totalPrice;
    }
}
<?php
namespace App\Classes;
use App\Interfaces\PriceDistance;
use App\Interfaces\PriceExtra;
use App\Interfaces\PriceTime;
class RateDaily extends AbstractRate
{
    public function __construct(int $age, int $distance, int $duration, bool $needGps, bool $needDriver)
    {
        parent::__construct($age, $distance, $duration, $needGps);
        $this->needDriver = $needDriver;
    }
    /**
     * @return float|int
     */
    public function calcPriceDistance()
    {
        $priceDistance = $this->distance * PriceDistance::DAILY;
        return $priceDistance;
    }
    /**
     * @return float|int
     */
    public function calcPriceTime()
    {
        $priceTime = $this->duration * PriceTime::DAILY;
        return $priceTime;
    }
    /**
     * @return float|int
     */
    public function calculatePrice()
    {
        $totalPrice = $this->calcNetPrice();
        if ($this->needGps) {
            $gps = ($this->duration * RecountTime::HOUR_IN_DAY) * PriceExtra::GPS;
            $totalPrice += $gps;
        }
        return $totalPrice;
    }
}
<?php
namespace App\Classes;
use App\Interfaces\PriceDistance;
use App\Interfaces\PriceExtra;
use App\Interfaces\PriceTime;
class RateHourly extends AbstractRate
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
        $priceDistance = $this->distance * PriceDistance::HOURLY;
        return $priceDistance;
    }
    /**
     * @return float|int
     */
    public function calcPriceTime()
    {
        $priceTime = $this->duration * PriceTime::HOURLY;
        return $priceTime;
    }
    public function calculatePrice()
    {
        $totalPrice = $this->calcNetPrice();
        if ($this->needGps) {
            $gps = $this->duration * PriceExtra::GPS;
            $totalPrice += $gps;
        }
        return $totalPrice;
    }
}
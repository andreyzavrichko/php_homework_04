<?php
namespace App\Classes;
use App\Interfaces\Age;
use App\Interfaces\PriceDistance;
use App\Interfaces\PriceExtra;
use App\Interfaces\PriceTime;
use Exception;
class RateStudent extends AbstractRate
{
    public function __construct(int $age, int $distance, int $duration, bool $needGps)
    {
        parent::__construct($age, $distance, $duration, $needGps);
        $this->checkAgeStudent();
    }
    /**
     * @throws Exception
     */
    protected function checkAgeStudent() {
        if ($this->age > Age::STUDENT) {
            throw new Exception('Вы уже выросли из студенческого возраста, возьмите другой тариф!');
        }
    }
    /**
     * @return float|int
     */
    public function calcPriceDistance()
    {
        $priceDistance = $this->distance * PriceDistance::STUDENT;
        return $priceDistance;
    }
    /**
     * @return float|int
     */
    public function calcPriceTime()
    {
        $priceTime = $this->duration * PriceTime::STUDENT;
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
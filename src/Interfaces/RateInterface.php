<?php

namespace App\Interfaces;

interface RateInterface
{
    public function calcPriceDistance();
    public function calcPriceTime();
    public function calcNetPrice();
    public function calculatePrice();
}
<?php

class CarClass
{
    public $color;
    public $brand;
    public $speed;
    public static $carsCount = 0;

    public function __construct($color, $brand, $speed)
    {
        $this->color = $color;
        $this->brand = $brand;
        $this->speed = $speed;
        self::$carsCount++;
    }

    public static function getCarsCount()
    {
        return self::$carsCount;
    }
}
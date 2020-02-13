<?php

class AutoCar
{
    public $color;
    public $wheels;
    public $brand;
    public $speed;

    public function __construct($color, $brand, $speed = 180, $wheels = 4)
    {
        $this->color = $color;
        $this->wheels = $wheels;
        $this->brand = $brand;
        $this->speed = $speed;
    }

    public function getCarInfo()
    {
        $info = "<h3>Car</h3>
            Brand: {$this->brand}<br>
            Color: {$this->color}<br>
            Wheels: {$this->wheels}<br>
            Speed: {$this->speed}<br><br>";

        return $info;
    }
}
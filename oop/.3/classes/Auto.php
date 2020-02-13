<?php

class Auto
{
    public $color;
    public $wheels = 4;
    public $brand;
    public $speed = 180;

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
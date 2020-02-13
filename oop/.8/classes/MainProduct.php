<?php

class MainProduct
{
    public $name;
    public $price;

    public function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function getProductInfo()
    {
        $info = "<hr><b>Product info</b><br>
            Name: {$this->name}<br>
            Price: {$this->price}<br>";

        return $info;
    }
}
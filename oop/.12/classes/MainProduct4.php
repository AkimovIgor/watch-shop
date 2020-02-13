<?php

namespace Classes;

abstract class MainProduct4
{
    public $name;
    private $price;
    private $discount;

    public function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function getProductInfo()
    {
        $info = "<hr><b>Product info</b><br>
            Name: {$this->name}<br>
            Price: {$this->getPrice()}<br>";

        return $info;
    }

    public function setDiscount($discount)
    {
        $this->discount = $discount;
    }

    public function getPrice()
    {
        return $this->price - ($this->discount / 100 * $this->price);
    }

    abstract protected function getName();
}
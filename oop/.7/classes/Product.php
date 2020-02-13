<?php

class Product
{
    public $name;
    public $price;

    public $cpu;
    public $numPages;

    public function __construct($name, $price, $cpu = null, $numPages = null)
    {
        $this->name = $name;
        $this->price = $price;
        $this->cpu = $cpu;
        $this->numPages = $numPages;
    }

    public function getCpu()
    {
        return $this->cpu;
    }

    public function getNumPages()
    {
        return $this->getNumPages;
    }

    public function getProductInfo($type = 'notebook')
    {
        $info = "<hr><b>Product info</b><br>
            Name: {$this->name}<br>
            Price: {$this->price}<br>";

        if ($type == 'notebook') {
            $info .= "CPU: {$this->cpu}<br>";
        } elseif ($type == 'book') {
            $info .= "NumberPages: {$this->numPages}<br>";
        }

        return $info;
    }
}
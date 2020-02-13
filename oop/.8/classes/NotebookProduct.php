<?php

class NotebookProduct extends MainProduct
{
    public $cpu;

    public function __construct($name, $price, $cpu)
    {
        parent::__construct($name, $price);
        $this->cpu = $cpu;
    }

    public function getCpu()
    {
        return $this->cpu;
    }

    public function getProductInfo()
    {
        $info = parent::getProductInfo();
        $info .= "CPU: {$this->cpu}<br>";
        return $info;
    }
}
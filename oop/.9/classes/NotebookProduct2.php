<?php

class NotebookProduct2 extends MainProduct2
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
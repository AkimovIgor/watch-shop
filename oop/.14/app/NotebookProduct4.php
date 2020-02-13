<?php

namespace App;
use Framework\Interfaces\IGadget;
use Framework\MainProduct4;
use Framework\Traits\ColorTrait;

class NotebookProduct4 extends MainProduct4 implements IGadget
{
    use ColorTrait;

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

    public function getName()
    {
        return $this->name;
    }
}
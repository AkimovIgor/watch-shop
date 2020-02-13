<?php

namespace App;
use Framework\Interfaces\I3D1;
use Framework\MainProduct4;

class BookProduct4 extends MainProduct4 implements I3D1
{
    public $numPages;

    public function __construct($name, $price, $numPages)
    {
        parent::__construct($name, $price);
        $this->numPages = $numPages;
    }

    public function getNumPages()
    {
        return $this->numPages;
    }

    public function getProductInfo()
    {
        $info = parent::getProductInfo();
        $info .= "NumberPages: {$this->numPages}<br>";
        return $info;
    }

    public function getName()
    {
        return $this->name;
    }

    public function test()
    {
        return "This is a test method";
    }
}
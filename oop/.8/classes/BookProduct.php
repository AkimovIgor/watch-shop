<?php

class BookProduct extends MainProduct
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
}
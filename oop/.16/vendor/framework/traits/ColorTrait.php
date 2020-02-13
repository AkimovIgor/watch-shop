<?php

namespace Framework\Traits;

trait ColorTrait
{
    public $color;

    public function getColor()
    {
        return $this->color;
    }

    public function setColor($color)
    {
        $this->color = $color;
    }
}
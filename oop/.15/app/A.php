<?php

namespace App;

class A
{
    protected const TEST = "Class A<br>";

    public function getTest()
    {
        return self::TEST;
    }

    public function getStaticTest()
    {
        return static::TEST;
    }

    public function firstAction()
    {
        echo "Выполнено первое действие<br>";
        return $this;
    }

    public function secondAction()
    {
        echo "Выполнено первое действие<br>";
        return $this;
    }
}
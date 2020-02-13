<?php

namespace App;

class A
{
    protected const TEST = "Class A<br>";

    public function __toString()
    {
        return self::class;
    }

    public function __set($name, $value)
    {
        echo "Don't set value {$value} to variable {$name}. Variable {$name} don't exist";
    }

    public function __get($name)
    {
        $name = ucfirst($name);
        
    }

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
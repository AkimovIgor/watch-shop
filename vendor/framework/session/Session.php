<?php

namespace FW\Session;

class Session
{
    public function __set($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    public function __get($name)
    {
        return isset($_SESSION[$name]) ? $_SESSION[$name] : '';
    }

    public function getAll()
    {
        return $_SESSION;
    }
}
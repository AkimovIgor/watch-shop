<?php

namespace FW\Traits;

trait SingletonTrait
{
    private static $instance;

    private function __construct() {}

    private function __sleep() {}

    private function __wakeup() {}

    public static function getInstance()
    {
        if (empty(self::$instance)) {
            self::$instance = new self;
        }
        return self::$instance;
    }
}
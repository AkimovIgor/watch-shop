<?php

namespace FW\Base;

use FW\Database\Db;

abstract class Model
{
    public $attributes = [];
    public $errors = [];
    public $rules = [];

    public function __construct()
    {
        Db::getInstance();
    }
}
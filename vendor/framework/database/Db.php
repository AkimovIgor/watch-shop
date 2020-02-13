<?php

namespace FW\Database;

use FW\Traits\SingletonTrait;
use RedBeanPHP\R;

class Db
{
    use SingletonTrait;

    private function __construct()
    {
        $db = require_once CONFIG . '/db.php';
        R::setup($db['dsn'], $db['user'], $db['password']);
        R::freeze( TRUE );
    }
}
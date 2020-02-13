<?php

define('DEBUG', 1);
define('ROOT', dirname(__DIR__));
define('APP', ROOT . '/app');
define('WEB', ROOT . '/public');
define('CONFIG', ROOT . '/config');
define('CACHE', ROOT . '/tmp/cache');
define('VENDOR', ROOT . '/vendor');
define('FW', VENDOR . '/framework');
define('LIBS', VENDOR . '/framework/libs');
define('LAYOUT', 'app');
define('URL', 'http://' . $_SERVER['HTTP_HOST']);
define('CONTROLLERS', 'App\Controllers\\');

require_once VENDOR . '/autoload.php';
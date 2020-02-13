<?php

use App\A;
use App\B;

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once "vendor/autoload.php";

$a = new A;
$b = new B;

// echo $a->getTest();
// echo $b->getStaticTest();

$a->firstAction()->secondAction();
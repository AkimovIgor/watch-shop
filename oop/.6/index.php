<?php

require_once "classes/CarClass.php";

$car1 = new CarClass('black', 'volvo', 180);
$car2 = new CarClass('silver', 'bmw', 240);
$car3 = new CarClass('red', 'audi', 220);

echo CarClass::getCarsCount();
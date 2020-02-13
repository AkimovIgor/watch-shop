<?php

require_once 'classes/Auto.php';

function dd($data) {
    echo '<pre>';
    print_r($data, true);
    echo '</pre>';
}

$car1 = new Auto();
$car1->color = 'black';
$car1->brand = 'bmw';

$car2 = new Auto();
$car2->color = 'blue';
$car2->brand = 'volvo';
$car2->speed = 195;

$car3 = new Auto();
$car3->color = 'red';
$car3->brand = 'kia';
$car3->speed = 200;


echo $car1->getCarInfo();
echo $car2->getCarInfo();
echo $car3->getCarInfo();

<?php

require_once 'classes/AutoCar.php';

function dd($data) {
    echo '<pre>';
    print_r($data, true);
    echo '</pre>';
}

$car1 = new AutoCar('black', 'bmw');
$car2 = new AutoCar('blue', 'volvo', 195);
$car3 = new AutoCar('red', 'kia', 200);

echo $car1->getCarInfo();
echo $car2->getCarInfo();
echo $car3->getCarInfo();

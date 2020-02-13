<?php

require_once 'classes/Car.php';

function dd($data) {
    echo '<pre>';
    print_r($data, true);
    echo '</pre>';
}

$car1 = new Car();
$car1->color = 'black';
$car1->brand = 'bmw';

$car2 = new Car();
$car2->color = 'blue';
$car2->brand = 'volvo';
$car2->speed = 195;

$car3 = new Car();
$car3->color = 'red';
$car3->brand = 'kia';
$car3->speed = 200;

$cars = [$car1, $car2, $car3];

echo "<h3>Cars</h3>";

foreach($cars as $car) {
    echo "Brand: {$car->brand}<br>
        Color: {$car->color}<br>
        Wheels: {$car->wheels}<br>
        Speed: {$car->speed}<br><br>";
}

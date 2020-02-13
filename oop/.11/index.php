<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once 'interfaces/I3D1.php';
require_once 'interfaces/IGadget.php';
require_once 'classes/MainProduct4.php';
require_once 'classes/BookProduct4.php';
require_once 'classes/NotebookProduct4.php';

function offerCase(IGadget $product) {
    echo "Получите чехол при покупке ноутбука {$product->name}<br>";
}

$book = new BookProduct4('War and Piece', 1200, 1500);
$notebook = new NotebookProduct4('ACER', 35000,'Intel');

$book->setDiscount(25);
offerCase($notebook);
var_dump($notebook instanceof IGadget); // true
echo $book->getProductInfo();
echo $notebook->getProductInfo();
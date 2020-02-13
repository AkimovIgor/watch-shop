<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

use Framework\Interfaces\IGadget;
use App\BookProduct4;
use App\NotebookProduct4;

require_once "vendor/autoload.php";

function offerCase(IGadget $product) {
    echo "Получите чехол при покупке ноутбука {$product->name}<br>";
}

$book = new BookProduct4('War and Piece', 1200, 1500);
$notebook = new NotebookProduct4('ACER', 35000,'Intel');

$book->setDiscount(25);
$notebook->setColor('black');
offerCase($notebook);
echo $book->getProductInfo();
echo $notebook->getProductInfo();

echo '<pre>';
var_dump($book);
var_dump($notebook); die;

<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

use Interfaces\IGadget;
use Classes\BookProduct4;
use Classes\NotebookProduct4;

spl_autoload_register(function($className) {
    $className = str_replace(' ', '/', lcfirst(str_replace('\\', ' ', $className)));
    $fileName = __DIR__ . "/{$className}.php";
    if (file_exists($fileName)) {
        require_once $fileName;
    }
});

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
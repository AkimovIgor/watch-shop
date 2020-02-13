<?php

require_once 'classes/MainProduct.php';
require_once 'classes/BookProduct.php';
require_once 'classes/NotebookProduct.php';

$book = new BookProduct('War and Piece', 1200, 1500);
$notebook = new NotebookProduct('ACER', 35000,'Intel');

echo $book->getProductInfo();
echo $notebook->getProductInfo();
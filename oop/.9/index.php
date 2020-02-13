<?php

require_once 'classes/MainProduct2.php';
require_once 'classes/BookProduct2.php';
require_once 'classes/NotebookProduct2.php';

$book = new BookProduct2('War and Piece', 1200, 1500);
$notebook = new NotebookProduct2('ACER', 35000,'Intel');

$book->setDiscount(25);
echo $book->getProductInfo();
echo $notebook->getProductInfo();
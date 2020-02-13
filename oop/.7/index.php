<?php

require_once 'classes/Product.php';

$book = new Product('War and Piece', 1200, null, 1500);
$notebook = new Product('ACER', 35000, 'Intel');

echo $book->getProductInfo('book');
echo $notebook->getProductInfo();
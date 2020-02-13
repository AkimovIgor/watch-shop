<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once 'interfaces/I3D.php';
require_once 'classes/MainProduct3.php';
require_once 'classes/BookProduct3.php';
require_once 'classes/NotebookProduct3.php';

$book = new BookProduct3('War and Piece', 1200, 1500);
$notebook = new NotebookProduct3('ACER', 35000,'Intel');

$book->setDiscount(25);
echo $book->getProductInfo();
echo $notebook->getProductInfo();
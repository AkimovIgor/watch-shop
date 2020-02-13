<?php

require_once 'classes/FileWriter.php';

$textFile = new FileWriter('test.txt');
$textFile->write("Hello there!\n");

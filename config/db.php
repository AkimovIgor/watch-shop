<?php

$driver = 'mysql';
$host = 'mysql';
$dbName = 'testdb';
$userName = 'root';
$password = 'root';
$charset = 'utf8';

return [
    'dsn' => "$driver:host=$host;dbname=$dbName;charset=$charset",
    'user' => $userName,
    'password' => $password
];
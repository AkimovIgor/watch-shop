<?php

$driver = 'mysql';          // SQL драйвер
$host = 'mysql';            // Имя хоста
$dbName = 'testdb';         // Имя базы данных
$userName = 'root';         // Имя пользователя базы данных
$password = 'root';         // Пароль пользователя базы данных
$charset = 'utf8';          // Кодировка базы данных

return [
    'dsn' => "$driver:host=$host;dbname=$dbName;charset=$charset",
    'user' => $userName,
    'password' => $password
];
<?php

define('DEBUG', 1);                                    // Режим отображения сайта 1 - dev, 0 - prod
define('ROOT', dirname(__DIR__));                 // Корневая директория проекта
define('APP', ROOT . '/app');                          // Главная папка приложения
define('WEB', ROOT . '/public');                       // Публичная папка
define('CONFIG', ROOT . '/config');                    // Папка с конфигурационными файлами
define('CACHE', ROOT . '/tmp/cache');                  // Папка для кэша
define('VENDOR', ROOT . '/vendor');                    // Папка vendor
define('FW', VENDOR . '/framework');                   // Папка ядра фреймворка
define('LIBS', VENDOR . '/framework/libs');            // Папка с самописными функциями
define('LAYOUT', 'app');                               // Шаблон по умолчанию для всех страниц
define('URL', 'http://' . $_SERVER['HTTP_HOST']);      // Адресс сайта
define('CONTROLLERS', 'App\Controllers\\');            // Пространство имен контроллеров

require_once VENDOR . '/autoload.php';                 // Подключение файла автозагрузки классов
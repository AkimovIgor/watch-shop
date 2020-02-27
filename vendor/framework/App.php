<?php

namespace FW;

use FW\Exceptions\ExceptionHandler;
use FW\Routing\Router;

class App
{
    public static $app;

    public function __construct()
    {
        $query = trim($_SERVER['REQUEST_URI'], '/');   // значение строки запроса
        session_start();                                      // старт сессии
        self::$app = Registry::getInstance();                 // инициализация контейнера свойств
        $this->getParams();                                   // получение списка свойств и их назначение
//        new ExceptionHandler();                               // инициализация обработчика исключений
        Router::dispatch($query);                             // перенаправление на нужный маршрут
    }

    /**
     * Получить список всех свойств из файла конфигурации
     * и запись их в контейнер свойств
     *
     * @return void
     */
    public function getParams()
    {
        $params = require_once CONFIG . '/params.php';
        if (!empty($params)) {
            foreach($params as $key => $value) {
                self::$app->setProperty($key, $value);
            }
        }
    }
}
<?php

namespace FW\Routing;

class Router
{
    /**
     * @var array Таблица(список) всех маршрутов
     */
    private static $tableRoutes = [];

    /***
     * @var array Текущий маршрут
     */
    private static $currentRoute = [];

    /**
     * Добавить новый маршрут в таблицу маршрутов
     *
     * @param  string $regExp Регулярное выражение
     * @param  array $route Данные маршрута
     *
     * @return void
     */
    public static function add($regExp, $route = [])
    {
        $regExp =  "^" . trim($regExp, '/') . "$";
        self::$tableRoutes[$regExp] = $route;
    }

    /**
     * Получить список всех маршрутов
     *
     * @return array
     */
    public static function getTableRoutes()
    {
        return self::$tableRoutes;
    }

    /**
     * Получить данные текущего маршрута
     *
     * @return array
     */
    public static function getCurrentRoute()
    {
        return self::$currentRoute;
    }

    /**
     * Перенаправить на указанный URL
     *
     * @param  string $url
     *
     * @return void
     */
    public static function dispatch($url)
    {
        $url = self::removeQueryString($url);
        if (self::matchRoute($url)) {
            $controller = CONTROLLERS . self::$currentRoute['prefix'] . self::upper(self::$currentRoute['controller']) . 'Controller';
            if (class_exists($controller)) {
                $cObj = new $controller(self::$currentRoute);
                $action = self::lower(self::$currentRoute['action']);
                if (method_exists($cObj, $action)) {
                    $cObj->$action();
                    $cObj->getView();
                } else {
                    throw new \Exception("Method $controller::$action not found");
                }
            } else {
                throw new \Exception("Controller {$controller} not found");
            }
        } else {
            throw new \Exception('Page not found', 404);
        }
    }

    /**
     * Искать совпадения в таблице маршрутов с текущим URL
     *
     * @param  string $url
     *
     * @return boolean
     */
    public static function matchRoute($url)
    {
        foreach (self::$tableRoutes as $pattern => $route) {
            if (preg_match("#$pattern#", $url, $matches)) {
                foreach ($matches as $key => $value) {
                    if (is_string($key)) {
                        $route[$key] = $value;
                    }
                }
                if (empty($route['action'])) {
                    $route['action'] = 'index';
                }
                if (empty($route['prefix'])) {
                    $route['prefix'] = '';
                } else {
                    $route['prefix'] .= '\\';
                }
                self::$currentRoute = $route;
                
                return true;
            }
        }
        return false;
    }

    /**
     * Удалить GET параметры из адресной строки
     *
     * @param  string $url
     *
     * @return string
     */
    protected static function removeQueryString($url)
    {
        if ($url) {
            $params = explode('?', $url, 2);
            if (empty($params[0])) {
                $url = '';
            } else {
                $url = $params[0];
            }
        }
        return $url;
    }

    public static function upper($str)
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $str)));
    }

    public static function lower($str)
    {
        return lcfirst(self::upper($str));
    }
}
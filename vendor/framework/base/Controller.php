<?php

namespace FW\Base;

abstract class Controller
{
    public $route;           // текущий маршрут
    public $controller;      // текущий контроллер
    public $model;           // текущая модель
    public $layout;          // текущий шаблон
    public $prefix = '';     // текущий префикс
    public $view;            // текущий вид
    public $data = [];       // передаваемые данные
    public $meta = [];       // мета данные

    public function __construct($route)
    {
        $this->route = $route;
        $this->controller = $route['controller'];
        $this->view = $route['action'];
    }

    /**
     * Установить данные для передачи в представление
     *
     * @param array $data Массив данных
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * Установить мета данные: заголовок страницы, описание, ключевые слова
     *
     * @param string $title Заголовок страницы
     * @param string $desc Описание
     * @param string $kwords Ключевые слова
     */
    public function setMeta($title = '', $desc = '', $kwords = '')
    {
        $this->meta['title'] = $title;
        $this->meta['description'] = $desc;
        $this->meta['keywords'] = $kwords;
    }

    /**
     * Передать данные в представление и отрендерить его
     */
    public function getView()
    {
        $vObj = new View($this->route, $this->meta, $this->layout, $this->view);
        $vObj->render($this->data);
    }

    /**
     * Проверить, является ли текущий запрос AJAX-запросом
     *
     * @return bool
     */
    public function isAjax()
    {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
    }

    /**
     * Передать данные в представление и подключить его, завершив выполнение кода
     * Данный метод подойдет для отображение представления при AJAX-запросах
     *
     * @param string $view Представление
     * @param array $vars Массив параметров
     */
    public function loadView($view, $vars = [])
    {
        if ($vars) extract($vars);
        $this->controller = lower($this->controller);
        require APP . "/views/{$this->prefix}{$this->controller}/$view.php";
        exit();
    }
}
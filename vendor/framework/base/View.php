<?php

namespace FW\Base;

class View
{
    public $route;           // текущий маршрут
    public $controller;      // текущий контроллер
    public $layout;          // текуший шаблон
    public $view;            // текущее представление
    public $model;           // текущая модель
    public $prefix;          // префикс к маршруту
    public $data = [];       // массив данных
    public $meta = [];       // массив мета-данных

    public function __construct($route, $meta, $layout = '', $view = '')
    {
        $this->route = $route;
        $this->controller = $route['controller'];
        $this->model = $route['controller'];
        $this->prefix = $route['prefix'];
        $this->meta = $meta;
        $this->view = $view;
        if ($layout === false) {
            $this->layout = false;
        } else {
            $this->layout = $layout ?: LAYOUT;
        }
    }

    /**
     * Рендер вида и шаблона
     *
     * Подключение файлов представления и шаблона с предварительной буферизацией
     *
     * @param array $data Массив пользовательских данных
     * @throws \Exception
     */
    public function render($data)
    {
        extract($data);
        $viewFile = APP . '/views/' . lower($this->prefix) . lower($this->controller) . '/' . $this->view . '.php';
        if (is_file($viewFile)) {
            ob_start();
            require_once $viewFile;
            $content = ob_get_clean();
        } else {
            throw new \Exception("View {$this->view} is not found", 404);
        }

        $layoutFile = APP . '/views/layouts/' . $this->layout . '.php';
        if (is_file($layoutFile)) {
            $meta = $this->getMeta();
            require_once $layoutFile;
        } else {
            throw new \Exception("Layout {$this->layout} is not found", 404);
        }
    }

    /**
     * Получение сформированного html с мета тегами
     *
     * @return string
     */
    public function getMeta()
    {
        return "<title>{$this->meta['title']}</title>
        <meta name='description' content='{$this->meta['description']}'>
        <meta name='keywords' content='{$this->meta['keywords']}'>";
    }
}
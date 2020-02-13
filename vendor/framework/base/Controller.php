<?php

namespace FW\Base;

abstract class Controller
{
    public $route;
    public $controller;
    public $model;
    public $layout;
    public $prefix = '';
    public $view;
    public $data = [];
    public $meta = [];

    public function __construct($route)
    {
        $this->route = $route;
        $this->controller = $route['controller'];
        $this->view = $route['action'];
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function setMeta($title = '', $desc = '', $kwords = '')
    {
        $this->meta['title'] = $title;
        $this->meta['description'] = $desc;
        $this->meta['keywords'] = $kwords;
    }

    public function getView()
    {
        $vObj = new View($this->route, $this->meta, $this->layout, $this->view);
        $vObj->render($this->data);
    }

    public function isAjax()
    {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
    }

    public function loadView($view, $vars = [])
    {
        if ($vars) extract($vars);
        require APP . "/views/{$this->prefix}{$this->controller}/$view.php";
        exit();
    }
}
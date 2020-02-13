<?php

namespace App\Widgets\Menu;

use FW\App;

class MainMenu
{
    protected $data;                      // данные из БД
    protected $tree;                      // HTML дерево
    protected $menuHtml;                  // сформированное меню
    protected $tpl;                       // имя подключаемого шаблона
    protected $tplPath;                   // путь к подключаемому шаблону
    protected $table = 'categories';      // имя таблицы с данными в БД
    protected $container = 'ul';          // контейнер для меню
    protected $class = 'nav';             // имя класса контейнера
    protected $attributes = [];           // атрибуты меню
    protected $prepend = '';

    public function __construct($options = [])
    {
        $this->tplPath = APP . '/widgets/menu/menu_tpl/default.php';
        $this->getOptions($options);
        $this->run();
    }

    /**
     * Получить список опций для меню 
     * и установить значение опции, если она существует
     *
     * @param  array $options Массив опций
     *
     * @return void
     */
    protected function getOptions($options)
    {
        if (!empty($options)) {
            foreach ($options as $option => $val) {
                if (property_exists($this, $option)) {
                    $this->$option = $val;
                }
            }
        }
    }

    /**
     * Запуск всех методов
     *
     * @return void
     */
    protected function run()
    {
        $this->data = App::$app->getProperty('categories'); // получить данные из контейнера
        $this->tree = $this->getTree();                     // сформировать дерево
        $this->menuHtml = $this->getMenuHtml($this->tree);  // сформировать html при помощи дерева
        $this->outputHtml();                                // вывести html на экран
    }

    /**
     * Вывод Html разметки на экран
     *
     * @return void
     */
    protected function outputHtml()
    {
        $attrs = '';
        if (! empty($this->attributes)) {
            foreach ($this->attributes as $k => $v) {
                $attrs .= " {$k}='{$v}'";
            }
        }
        echo "<{$this->container} class='{$this->class}'{$attrs}>";
        echo $this->menuHtml;
        echo "</{$this->container}>";
    }

    /**
     * Сформировать Html дерево
     *
     * @return array
     */
    protected function getTree()
    {
        $tree = [];
        $data = $this->data;
        foreach ($data as $id => &$node) {
            if (!$node['parent_id']) {
                $tree[$id] = &$node;
            } else {
                $data[$node['parent_id']]['childs'][$id] = &$node;
            }
        }
        return $tree;
    }

    /**
     * Сформировать готовый Html из дерева элементов
     *
     * @param  array $tree Массив для html дерева
     * @param  string $tab Символ для отображения уровня вложенности в списках
     *
     * @return string
     */
    protected function getMenuHtml($tree, $tab = '')
    {
        $str = '';
        foreach ($tree as $id => $category) {
            $str .= $this->categoryToTemplate($category, $tab, $id);
        }
        return $str;
    }

    /**
     * Буферизация и подключение шаблона
     *
     * @param  array $category Массив текущей категории
     * @param  string $tab Табуляция для отображения уровня вложенности в списках
     * @param  int $id Идентификатор текущей категории
     *
     * @return string
     */
    protected function categoryToTemplate($category, $tab, $id)
    {
        ob_start();
        require $this->tplPath;
        return ob_get_clean();
    }
}
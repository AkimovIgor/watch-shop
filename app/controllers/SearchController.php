<?php

namespace App\Controllers;

use FW\App;
use RedBeanPHP\R;

class SearchController extends BaseController
{
    public function typeahead()
    {
        if ($this->isAjax()) {
            $query = ! empty($_GET['query']) ? hsc($_GET['query']) : null;
            if ($query) {
                $products = R::getAll("SELECT id, title FROM products WHERE title LIKE ? LIMIT 11", ["%{$query}%"]);
                echo json_encode($products);
            }
        }
        die;
    }

    public function index()
    {
        $query = ! empty($_GET['s']) ? hsc($_GET['s']) : null;
        $products = null;
        if ($query) {
            $products = R::find('products', 'title LIKE ?', ["%{$query}%"]);
        }
        $currency = $this->currency;
        $tops = R::findAll('products', 'is_top = 1');
        $categories = App::$app->getProperty('categories');
        $brands = R::findAll('brands');

        $this->setMeta('Поиск по запросу: ' . $query);
        $this->setData(compact('products', 'query', 'currency', 'tops', 'categories', 'brands'));
    }
}
<?php

namespace App\Controllers;

use App\Models\BaseModel;
use FW\App;
use FW\Pagination\Paginator;
use RedBeanPHP\R;
use App\Models\Search;

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

        $currency = $this->currency;
        $min = isset($_GET['min']) ? (int)$_GET['min'] / $currency['value'] : 0 * $currency['value'];
        $max = isset($_GET['max']) ? (int)$_GET['max'] / $currency['value'] : 2000 * $currency['value'];
        $filter = isset($_GET['filter']) ? $_GET['filter'] : [];
        $order = isset($_GET['order']) && !empty($_GET['order']) ? $_GET['order'] : 'title|DESC';
        $orderList = ['title|DESC', 'title|ASC', 'price|ASC', 'price|DESC', 'rating|DESC', 'rating|ASC'];
        if (! in_array($order, $orderList)) redirect();
        $orderBy = explode('|', $order);
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = isset($_GET['perpage']) ? (int)$_GET['perpage'] : App::$app->getProperty('pagination_per_page');

        $sql = "status = 1 AND price BETWEEN $min AND $max AND title LIKE ?";
        
        if ($filter) {
            $filter = explode(',', $filter);
            $sqlStr = 'SELECT product_id FROM modifications WHERE ';
            foreach ($filter as $val) {
                $sqlStr .= "title = '{$val}' OR ";
            }
            $sqlStr = rtrim($sqlStr, ' OR ');
            $sql .= " AND id IN ($sqlStr)";
        }
        $search = new BaseModel();

        $totalCount =  R::count('products', $sql, ["%{$query}%"]);
        
        $pagination = new Paginator($currentPage, $perpage, $totalCount);
        
        $offset = $pagination->getOffset();
        $products = $search->getAllForPaginate('products', $sql, $orderBy[1], $orderBy[0], $perpage, $offset, ["%{$query}%"]);

        $tops = R::findAll('products', 'is_top = 1');
        $categories = App::$app->getProperty('categories');
        $brands = R::findAll('brands');

        if ($this->isAjax()) {
            $this->loadView('search_tpl', compact('products', 'currency', 'pagination', 'min', 'max', 'order', 'filter', 'perpage'));
        }

        $this->setMeta('Поиск по запросу: ' . $query);
        $this->setData(compact('query', 'categories', 'products', 'tops', 'brands', 'currency', 'pagination', 'min', 'max', 'filter', 'order', 'perpage'));
    }
}
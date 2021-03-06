<?php

namespace App\Controllers;

use App\Models\BaseModel;
use FW\App;
use FW\Pagination\Paginator;
use RedBeanPHP\R;

class ShopController extends BaseController
{
    public function index()
    {
        // получить данные из запроса
        $currency = $this->currency;
        $min = isset($_GET['min']) ? (int)hsc($_GET['min']) / $currency['value'] : 0 * $currency['value'];
        $max = isset($_GET['max']) ? (int)hsc($_GET['max']) / $currency['value'] : 2000 * $currency['value'];
        $filter = isset($_GET['filter']) ? $_GET['filter'] : [];
        $order = isset($_GET['order']) && !empty($_GET['order']) ? $_GET['order'] : 'title|DESC';
        $orderList = ['title|DESC', 'title|ASC', 'price|ASC', 'price|DESC', 'rating|DESC', 'rating|ASC'];
        if (! in_array($order, $orderList)) redirect();
        $orderBy = explode('|', $order);

        $model = new BaseModel();

        $sql = "status = 1 AND price BETWEEN $min AND $max";

        // сформировать фильтр
        if ($filter) {
            $filter = explode(',', $filter);
            $sqlStr = 'SELECT product_id FROM modifications WHERE ';
            foreach ($filter as $val) {
                $sqlStr .= "title = '{$val}' OR ";
            }
            $sqlStr = rtrim($sqlStr, ' OR ');
            $sql .= " AND id IN ($sqlStr)";
        }
        // получить список товаров и сформировать постраничную навигацию
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = isset($_GET['perpage']) ? (int)$_GET['perpage'] : App::$app->getProperty('pagination_per_page');
        $totalCount =  R::count('products', $sql);
        $pagination = new Paginator($currentPage, $perpage, $totalCount);
        $offset = $pagination->getOffset();
        $products = $model->getAllForPaginate('products', $sql, $orderBy[1], $orderBy[0], $perpage, $offset);

        // получение дополнительного контента
        $categories = App::$app->getProperty('categories');
        $tops = R::findAll('products', 'is_top = 1');
        $brands = R::findAll('brands');

        // проверить, был ли сделан AJAX запрос
        if ($this->isAjax()) {
            $this->loadView('shop_tpl', compact('products', 'currency', 'pagination', 'min', 'max', 'order', 'perpage'));
        }

        // установить мета-данные и передать нужные данные в представление
        $this->setMeta('DarkLook | Shop');
        $this->setData(compact('categories', 'products', 'tops', 'brands', 'currency', 'pagination', 'min', 'max', 'filter', 'order', 'perpage'));
    }
}
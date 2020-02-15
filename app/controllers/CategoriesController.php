<?php

namespace App\Controllers;

use App\Models\Category;
use FW\App;
use FW\Pagination\Paginator;
use RedBeanPHP\R;

class CategoriesController extends BaseController
{
    public function index()
    {
        echo "Category";
    }

    public function show()
    {
        $slug = ! empty($this->route['slug']) ? $this->route['slug'] : $_GET['slug'];
        if ($this->isAjax()) {
            $min = isset($_GET['min']) ? $_GET['min'] : null;
            $max = isset($_GET['max']) ? $_GET['max'] : null;
            $currency = $this->currency;
            $catModel = new Category();
            $catId = $catModel->getCatId($slug);
            $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
            $perPage = App::$app->getProperty('pagination_per_page');
            $totalCount =  R::count('products', "status = 1 AND category_id = $catId AND price BETWEEN $min AND $max");
            $pagination = new Paginator($currentPage, $perPage, $totalCount);
            $offset = $pagination->getOffset();
            $products = $catModel->getAllForPaginate('products', "status = 1 AND category_id = $catId AND price BETWEEN $min AND $max", 'DESC', 'title', $perPage, $offset);
            $this->loadView('categories_tpl', compact('products', 'currency', 'pagination'));
        }
        $catModel = new Category();
        $categories = App::$app->getProperty('categories');
        $cat = $catModel->getCategory($slug);
        $catId = $catModel->getCatId($slug);
        $products = $catModel->getProducts($slug);
        $currency = $this->currency;
        $tops = R::findAll('products', 'is_top = 1');
        $brands = R::findAll('brands');

        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
        $perPage = App::$app->getProperty('pagination_per_page');
        $totalCount = count($products);
        $pagination = new Paginator($currentPage, $perPage, $totalCount);
        $offset = $pagination->getOffset();
        $products = $catModel->getAllForPaginate('products', 'status = 1 AND category_id = ' . $catId, 'DESC', 'title', $perPage, $offset);

        // dd($products);
        $this->setMeta('Категория ' . $cat['title']);
        $this->setData(compact('categories', 'cat', 'products', 'tops', 'brands', 'currency', 'pagination'));
    }

    // public function modificate()
    // {
    //     $min = isset($_GET['min']) ? $_GET['min'] : null;
    //     $max = isset($_GET['max']) ? $_GET['max'] : null;
    //     $currency = $this->currency;
    //     $catModel = new Category();
    //     $products = R::count('products', "status = 1 AND price price >= $min AND price <= $max");
    //     $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
    //     $perPage = App::$app->getProperty('pagination_per_page');
    //     $totalCount = count($products);
    //     $pagination = new Paginator($currentPage, $perPage, $totalCount);
    //     $offset = $pagination->getOffset();
    //     $products = $catModel->getAllForPaginate('products', "status = 1 AND price >= $min AND price <= $max", 'DESC', 'title', $perPage, $offset);

    //     if ($this->isAjax()) {
    //         $this->loadView('categories_tpl', compact('categories', 'category', 'products', 'tops', 'brands', 'currency', 'pagination'));
    //     }
    // }
}
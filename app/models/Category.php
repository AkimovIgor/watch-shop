<?php

namespace App\Models;

use FW\App;
use RedBeanPHP\R;

class Category extends BaseModel
{
    public function getProducts($category)
    {
        $categories = App::$app->getProperty('categories');
        if ($categories) {
            foreach($categories as $id => $item) {
                if ($item['parent_id'] != 0 && $item['slug'] == $category) {
                    $products = R::find('products', 'category_id = ?', [$id]);
                    return $products;
                }
            }
        }
        return false;
    }

    public function getCategory($slug)
    {
        $categories = App::$app->getProperty('categories');
        if ($categories) {
            foreach($categories as $id => $item) {
                if ($item['slug'] == $slug) {
                    return $item;
                }
            }
        }
    }

    public function getCatId($slug)
    {
        $categories = App::$app->getProperty('categories');
        if ($categories) {
            foreach($categories as $id => $item) {
                if ($item['slug'] == $slug) {
                    return $id;
                }
            }
        }
    }
}
<?php

namespace App\Models;

use FW\App;
use RedBeanPHP\R;

class Category extends BaseModel
{
    /**
     * Получить список продуктов с определенной категорией
     *
     * @param string $category URL категории
     * @return array|object|bool
     */
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

    /**
     * Получить данные категории по её URL
     *
     * @param string $slug URL категории
     * @return array|bool
     */
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
        return false;
    }

    /**
     * Получить идентификатор категории по её URL
     *
     * @param string $slug URL категории
     * @return int|bool
     */
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
        return false;
    }
}
<?php

namespace App\Models;

use FW\App;

class Breadcrumbs extends BaseModel
{
    /**
     * Получить "хлебные крошки" в html
     *
     * @param int $categoryId Идентификатор категории
     * @param string $name Имя продукта
     * @return string
     */
    public static function getBreadcrumbs($categoryId, $name = '')
    {
        $categories = App::$app->getProperty('categories');
        $breadcrumbsArr = self::getBreadcrumbsParts($categories, $categoryId);
        $breadcrumbs = "<li><a href='/'>Home</a></li>";
        if ($breadcrumbsArr) {
            foreach($breadcrumbsArr as $slug => $title) {
                if ($slug != 'categories') {
                    $breadcrumbs .= "<li><a href='/categories/{$slug}'>{$title}</a></li>";
                } else {
                    $breadcrumbs .= "<li><a href='/{$slug}'>{$title}</a></li>";
                }
            }
        }
        if ($name) {
            $breadcrumbs .= "<li class='active'>{$name}</li>";
        }
        return $breadcrumbs;
    }

    /**
     * Получить массив с частями "хлебных крошек"
     *
     * @param $categories Массив всех категорий
     * @param $id Идентификатор текущей категории
     * @return array|bool
     */
    public static function getBreadcrumbsParts($categories, $id)
    {
        if (! $id) return false;
        $breadcrumbs = [];
        foreach($categories as $key => $val) {
            if (isset($categories[$id])) {
                $breadcrumbs[$categories[$id]['slug']] = $categories[$id]['title'];
                $id = $categories[$id]['parent_id'];
            } else {
                break;
            }
        }
        return array_reverse($breadcrumbs);
    }
}
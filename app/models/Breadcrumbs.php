<?php

namespace App\Models;

use FW\App;

class Breadcrumbs extends BaseModel
{
    public static function getBreadcrumbs($categoryId, $name = '')
    {
        $categories = App::$app->getProperty('categories');
        $breadcrumbsArr = self::getBreadcrumbsParts($categories, $categoryId);
        $breadcrumbs = "<li><a href='/'>Home</a></li>";
        if ($breadcrumbsArr) {
            foreach($breadcrumbsArr as $slug => $title) {
                $breadcrumbs .= "<li><a href='/categories/{$slug}'>{$title}</a></li>";
            }
        }
        if ($name) {
            $breadcrumbs .= "<li class='active'>{$name}</li>";
        }
        return $breadcrumbs;
    }

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
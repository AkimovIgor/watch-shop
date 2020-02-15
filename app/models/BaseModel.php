<?php

namespace App\Models;

use FW\Base\Model;
use RedBeanPHP\R;

class BaseModel extends Model
{
    public static function getCategoryData()
    {
        $categories = R::getAssoc('SELECT * FROM categories');
        return $categories;
    }

    public function getAllForPaginate($table, $where = '', $orderBy = 'ASC', $key = 'id', $perPage, $offset)
    {
        $items = R::find($table, $where . " ORDER BY {$key} " . $orderBy . " LIMIT $offset, $perPage");
        return $items;
    }
}
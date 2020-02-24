<?php

namespace App\Models;

use RedBeanPHP\R;

class Search extends BaseModel
{
    public function getAllForPaginate($table, $where = '', $orderBy = 'ASC', $key = 'id', $perPage, $offset)
    {
        $items = R::find($table, $where . " ORDER BY {$key} " . $orderBy . " LIMIT $offset, $perPage");
        return $items;
    }
}
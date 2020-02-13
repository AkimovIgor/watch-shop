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
}
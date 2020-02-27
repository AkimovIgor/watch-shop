<?php

namespace App\Models;

use FW\Base\Model;
use RedBeanPHP\R;

class BaseModel extends Model
{
    /**
     * Получить массив всех категорий
     *
     * @return array
     */
    public static function getCategoryData()
    {
        $categories = R::getAssoc('SELECT * FROM categories');
        return $categories;
    }

    /**
     * Получить список элементов для формирования пагинации
     *
     * @param string $table Имя таблицы
     * @param string $sql Дополнительный SQL-код
     * @param string $orderBy Порядок сортировки
     * @param string $key Поле, по которому будет осуществляться сортировка
     * @param int $perPage Лимит выборки
     * @param int $offset Смещение выборки
     * @param array $bind Массив подготовленных параметров
     * @return array
     */
    public function getAllForPaginate($table, $sql = '', $orderBy = 'ASC', $key = 'id', $perPage, $offset, $bind = [])
    {
        $items = R::find($table, $sql . " ORDER BY {$key} " . $orderBy . " LIMIT $offset,$perPage", $bind);
        return $items;
    }
}
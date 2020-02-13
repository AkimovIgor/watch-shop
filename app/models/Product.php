<?php

namespace App\Models;

class Product extends BaseModel
{
    
    /**
     * Установить последний просмотренный товар
     *
     * @param  int $id
     *
     * @return void
     */
    public function setRecentlyViewed($id)
    {
        $recentlyViewed = $this->getAllRecentlyViewed();
        if (! $recentlyViewed) {
            setcookie('recentlyViewed', $id, time() + 3600 * 24, '/');
        } else {
            $recentlyViewed = explode(',', $recentlyViewed);
            if (! in_array($id, $recentlyViewed)) {
                $recentlyViewed[] = $id;
                $recentlyViewed = implode(',', $recentlyViewed);
                setcookie('recentlyViewed', $recentlyViewed, time() + 3600 * 24, '/');
            }
        }
    }

    /**
     * Получить последние просмотренные товары
     *
     * @param  int $count
     * 
     * @return array|false
     */
    public function getRecentlyViewed($count)
    {
        if (isset($_COOKIE['recentlyViewed'])) {
            $recentlyViewed = explode(',', $_COOKIE['recentlyViewed']);
            $recentlyViewed = array_slice($recentlyViewed, -$count);
            return $recentlyViewed;
        }
        return false;
    }

    /**
     * Получить список всех просмотренных товаров из куки
     *
     * @return string|false
     */
    public function getAllRecentlyViewed()
    {
        if (isset($_COOKIE['recentlyViewed'])) {
            return $_COOKIE['recentlyViewed'];
        }
        return false;
    }
}
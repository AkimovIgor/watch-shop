<?php

namespace App\Models;

use FW\App;

/**
 * Модель корзины
 *
 * @package App\Models
 */
class Cart extends BaseModel
{
    /**
     * Добавить продукт в корзину
     *
     * @param object $product Объект добавляемого продукта
     * @param int $qty Количество добавляемого продукта
     * @param array|null $mod Модификация добавляемого продукта
     */
    public function addToCart($product, $qty = 1, $mod = null)
    {
        if (! isset($_SESSION['cart_currency'])) {
            $_SESSION['cart_currency'] = App::$app->getProperty('currency');
        }
        if ($mod) {
            $id = $product->id . '-' . $mod['id'];
            $modTitle = $mod['title'];
            $title = $product->title;
            $price = $mod['price'];
        } else {
            $id = $product->id;
            $title = $product->title;
            $price = $product->price;
        }
        
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['qty'] = $_SESSION['cart'][$id]['qty'] + $qty;
        } else {
            $_SESSION['cart'][$id] = [
                'qty' => $qty,
                'title' => $title,
                'mod' => isset($modTitle) ? $modTitle : '',
                'price' => $price,
                'slug' => $product->slug,
                'image' => $product->image
            ];
        }
        
        $_SESSION['cart_total']['total_qty'] = isset($_SESSION['cart_total']['total_qty']) ? $_SESSION['cart_total']['total_qty'] + $qty : $qty;
        $_SESSION['cart_total']['total_price'] = isset($_SESSION['cart_total']['total_price']) ? $_SESSION['cart_total']['total_price'] + $qty * ($price) : $qty * ($price);
        
    }

    /**
     * Удалить продукт из корзины
     *
     * @param int $id Идентификатор удаляемого продукта
     */
    public function deleteItem($id)
    {
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart_total']['total_qty'] -= $_SESSION['cart'][$id]['qty'];
            $_SESSION['cart_total']['total_price'] -= $_SESSION['cart'][$id]['price'] * $_SESSION['cart'][$id]['qty'];
            unset($_SESSION['cart'][$id]);
        }
    }

    /**
     * Обновить добавленный в корзину продукт
     *
     * @param int $id Идентификатор обновляемого продукта
     * @param int $qty Новое количество обновляемого продукта
     */
    public function updateItem($id, $qty = 1)
    {
        if (isset($_SESSION['cart'][$id])) {
            $oldQty = $_SESSION['cart'][$id]['qty'];
            $_SESSION['cart'][$id]['qty'] = $qty;
            $newQty = $oldQty - $qty;
            $_SESSION['cart_total']['total_qty'] = $_SESSION['cart_total']['total_qty'] - $newQty;
            $_SESSION['cart_total']['total_price'] -= $_SESSION['cart'][$id]['price'] * $newQty;
        }
    }
}
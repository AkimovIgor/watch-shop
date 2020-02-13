<?php

namespace App\Models;

use FW\App;

class Cart extends BaseModel
{
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
                'price' => $price * $_SESSION['cart_currency']['value'],
                'slug' => $product->slug,
                'image' => $product->image
            ];
        }
        
        $_SESSION['cart_total']['total_qty'] = isset($_SESSION['cart_total']['total_qty']) ? $_SESSION['cart_total']['total_qty'] + $qty : $qty;
        $_SESSION['cart_total']['total_price'] = isset($_SESSION['cart_total']['total_price']) ? $_SESSION['cart_total']['total_price'] + $qty * ($price * $_SESSION['cart_currency']['value']) : $qty * ($price * $_SESSION['cart_currency']['value']);
        
    }

    public function deleteItem($id)
    {
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart_total']['total_qty'] -= $_SESSION['cart'][$id]['qty'];
            $_SESSION['cart_total']['total_price'] -= $_SESSION['cart'][$id]['price'] * $_SESSION['cart'][$id]['qty'];
            unset($_SESSION['cart'][$id]);
        }
    }

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

    public function getAllItems()
    {
        
    }
}
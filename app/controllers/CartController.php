<?php

namespace App\Controllers;

use App\Models\Cart;
use FW\App;
use RedBeanPHP\R;

class CartController extends BaseController
{
    public function index()
    {
        $products = $_SESSION['cart'];
        $currency = $this->currency;
        $tops = R::findAll('products', 'is_top = 1');
        $categories = App::$app->getProperty('categories');
        $brands = R::findAll('brands');
        $this->setMeta();
        $this->setData(compact('products', 'currency', 'tops', 'categories', 'brands'));
    }

    public function add()
    {
        // dd($_GET);
        $id = ! empty($_GET['id']) ? (int) htmlspecialchars($_GET['id']) : null;
        $quantity = ! empty($_GET['qty']) ? (int) htmlspecialchars($_GET['qty']) : null;
        $mod = ! empty($_GET['mod']) ? (int) htmlspecialchars($_GET['mod']) : null;
        $modification = null;

        if ($id) {
            $product = R::findOne('products', 'id = ?', [$id]);
            if ($product) {
                $modification = R::findOne('modifications', 'id = ? AND product_id = ?', [$mod, $id]);
            }
        }

        $cart = new Cart();
        $cart->addToCart($product, $quantity, $modification);
        $currency = $this->currency;
        if ($this->isAjax()) {
            $this->loadView('cart_tpl', compact('currency'));
        }
        redirect();
    }

    public function delete()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if ($id) {
            $cart = new Cart();
            $cart->deleteItem($id);
            $currency = $this->currency;
            if ($this->isAjax()) {
                $this->loadView('cart_tpl', compact('currency'));
            }
        }
        redirect();
    }

    public function deleteMain()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if ($id) {
            $cart = new Cart();
            $cart->deleteItem($id);
            $products = $_SESSION['cart'];
            $currency = $this->currency;
            if ($this->isAjax()) {
                $this->loadView('cart_tpl_2', compact('products', 'currency'));
            }
        }
        redirect();
    }

    public function update()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $qty = isset($_GET['qty']) ? $_GET['qty'] : null;
        
        if ($id) {
            $cart = new Cart();
            $cart->updateItem($id, $qty);
            $products = $_SESSION['cart'];
            $currency = $this->currency;
            if ($this->isAjax()) {
                $this->loadView('cart_tpl_2', compact('products', 'currency'));
            }
        }
        redirect();
    }

    public function updateCart()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $qty = isset($_GET['qty']) ? $_GET['qty'] : null;
        
        if ($id) {
            $cart = new Cart();
            $cart->updateItem($id, $qty);
            $products = $_SESSION['cart'];
            $currency = $this->currency;
            if ($this->isAjax()) {
                $this->loadView('cart_tpl', compact('products', 'currency'));
            }
        }
        redirect();
    }
}
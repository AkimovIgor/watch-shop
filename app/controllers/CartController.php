<?php

namespace App\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
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

    public function deleteOrder()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if ($id) {
            $cart = new Cart();
            $cart->deleteItem($id);
            $products = $_SESSION['cart'];
            $currency = $this->currency;
            if ($this->isAjax()) {
                $this->loadView('checkout-order', compact('products', 'currency'));
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

    public function updateOrder()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $qty = isset($_GET['qty']) ? $_GET['qty'] : null;
        
        if ($id) {
            $cart = new Cart();
            $cart->updateItem($id, $qty);
            $products = $_SESSION['cart'];
            $currency = $this->currency;
            if ($this->isAjax()) {
                $this->loadView('checkout-order', compact('products', 'currency'));
            }
        }
        redirect();
    }

    public function checkout()
    {
        $products = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
        $currency = $this->currency;
        $tops = R::findAll('products', 'is_top = 1');
        $categories = App::$app->getProperty('categories');
        $brands = R::findAll('brands');
        $this->setMeta('Оформление заказа');
        $this->setData(compact('products', 'currency', 'tops', 'categories', 'brands'));
    }

    public function signin()
    {
        $userModel = new User();
        if (! empty($_POST)) {
            $data = $_POST;
            $remember = isset($data['remember']);
            $userModel->load($data);
            $userModel->setRules([
                'required' => [
                    ['login'], 
                    ['password']
                ]
            ]);
            if (! $userModel->validate($data) || ! $user = $userModel->checkUser()) {
                $userModel->setErrors();
                $userModel->setOld($data);
                
            } else {
                $userModel->success('Вы успешно авторизованы!');
                $userModel->setUserData($user, $remember);
                echo json_encode(2);
                die;
            }
            if ($this->isAjax()) {
                $this->loadView('checkout-login');
            }
            redirect();
        }
    }

    public function signup()
    {
        $userModel = new User();
        if (! empty($_POST)) {
            $data = $_POST;
            $userModel->load($data);
            if (! $userModel->validate($data) || ! $userModel->checkUnique()) {
                $userModel->setErrors();
                $userModel->setOld($data);
                
            } else {
                $userModel->attributes['password'] = password_hash($data['password'], 1);
                $userModel->save('users');
                $userModel->success('Регистрация прошла упешно!');
                echo json_encode(2);
                die;
            }
            if ($this->isAjax()) {
                $this->loadView('checkout-register');
            }
            redirect();
        }
    }

    public function confirmOrder()
    {
        $user = isset($_COOKIE['user']) ? $_COOKIE['user'] : isset($_SESSION['user']) ? $_SESSION['user'] : null;
        if (! $user) {
            redirect();
        }
        if (! empty($_POST)) {
            $data = $_POST;
            $order = new Order();
            $order->load($data);
            if (!$order->validate($data)) {
                $order->setErrors();
                redirect();
            } else {
                $orderId = $order->saveOrder($data, $user);
                $order->mailOrder($orderId, $user['email']);
                redirect('/');
            }
            
        }
    }
}
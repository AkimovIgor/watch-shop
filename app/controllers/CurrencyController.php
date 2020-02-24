<?php

namespace App\Controllers;

use FW\App;

class CurrencyController extends BaseController
{
    public function change()
    {
        $currency = isset($_GET['curr']) ? $_GET['curr'] : null;
        if ($currency) {
            $currencies = App::$app->getProperty('currencies');

            if (array_key_exists($currency, $currencies)) {
//                foreach ($currencies[$currency] as $key => $val) {
//                    if (array_key_exists($key, $_SESSION['cart_currency'])) {
//                        $_SESSION['cart_currency'][$key] = $val;
//                    }
//                }
//                $_SESSION['cart_currency']['code'] = $currency;
                setcookie('currency', $currency, time() + 3600 * 24, '/');
            }
        }
        redirect();
    }
}
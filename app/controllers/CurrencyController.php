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
                setcookie('currency', $currency, time() + 20, '/');
            }
        }
        redirect();
    }
}
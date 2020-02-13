<?php

namespace App\Widgets\Currency;

use FW\App;
use RedBeanPHP\R;

class Currency
{
    protected $tpl;             // шаблон виджета
    protected $allCurrencies;   // массив всех валют
    protected $activeCurrency;  // текущая валюта

    public function __construct()
    {
        $this->tpl = APP . '/widgets/currency/currency_tpl/currency.php'; // подключение шаблона виджета
        $this->run();                                                     // запуск всех методов
    }
    
    /**
     * Запустить все методы
     *
     * @return void
     */
    protected function run()
    {
        $this->allCurrencies = App::$app->getProperty('currencies');
        $this->activeCurrency = App::$app->getProperty('currency');
        echo $this->getHtml();
    }

    
    /**
     * Получить список всех валют
     *
     * @return array
     */
    public static function getAllCurrencies()
    {
        $currencies = R::getAssoc('SELECT code, title, symbol_left, symbol_right, value, base FROM currency ORDER BY base DESC');
        return $currencies;
    }

    /**
     * Получить текущую активную валюту
     *
     * @param  array $currencies
     *
     * @return array
     */
    public static function getActiveCurrency($currencies)
    {
        if (isset($_COOKIE['currency']) && array_key_exists($_COOKIE['currency'], $currencies)) {
            $key = $_COOKIE['currency'];
        } else {
            $key = key($currencies);
        }
        $currency = $currencies[$key];
        $currency['code'] = $key;
        return $currency;
    }

    /**
     * Подключить шаблон и буферизировать вывод
     *
     * @return string
     */
    protected function getHtml()
    {
        ob_start();
        require_once $this->tpl;
        return ob_get_clean();
    }
}
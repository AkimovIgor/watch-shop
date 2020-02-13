<?php

namespace App\Controllers;

use App\Models\BaseModel;
use App\Widgets\Currency\Currency;
use FW\App;
use FW\Base\Controller;

class BaseController extends Controller
{
    public $currency;

    public function __construct($route)
    {
        parent::__construct($route);
        new BaseModel();
        App::$app->setProperty('currencies', Currency::getAllCurrencies());
        App::$app->setProperty('currency', Currency::getActiveCurrency(App::$app->getProperty('currencies')));
        App::$app->setProperty('categories', BaseModel::getCategoryData());
        $this->currency = App::$app->getProperty('currency');
    }
}
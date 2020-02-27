<?php


namespace App\Controllers;


use FW\App;

class AboutUsController extends BaseController
{
    public function index()
    {
        $currency = $this->currency;
        $categories = App::$app->getProperty('categories');
        $this->setMeta('DarkLook | About Us');
        $this->setData(compact('categories', 'currency'));
    }
}
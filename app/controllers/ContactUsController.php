<?php


namespace App\Controllers;


use App\Models\ContactUs;
use FW\App;

class ContactUsController extends BaseController
{
    public function index()
    {
        $currency = $this->currency;
        $categories = App::$app->getProperty('categories');
        $this->setMeta('DarkLook | Contact Us');
        $this->setData(compact('categories', 'currency'));
    }

    public function sendMessage()
    {
        if (! empty($_POST)) {
            $message = new ContactUs();
            $data = $_POST;

            if (! isset($data['name']) || ! isset($data['email'])) {
                $data['name'] = isset($_COOKIE['user']) ? $_COOKIE['user']['name'] : isset($_SESSION['user']) ? $_SESSION['user']['name'] : null;
                $data['email'] = isset($_COOKIE['user']) ? $_COOKIE['user']['email'] : isset($_SESSION['user']) ? $_SESSION['user']['email'] : null;
                if (!$data['name'] && !$data['email']) redirect();
            }

            $message->load($data);
            if (! $message->validate($data) || ! $message->checkUnique()) {
                $message->setErrors();
                $message->setOld($data);
            } else {
                $message->send($data);
                echo json_encode(2);
                die;
            }
            if ($this->isAjax()) {
                $this->loadView('contact_tpl');
            }
        }
        redirect();
    }
}
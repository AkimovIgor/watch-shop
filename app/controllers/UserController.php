<?php

namespace App\Controllers;

use App\Models\User;

class UserController extends BaseController
{
    public function index()
    {
        
    }

    public function register()
    {
        $this->setMeta('Register');
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
                $this->loadView('login_tpl');
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
                $this->loadView('register_tpl');
            }
            redirect();
        }
    }

    public function login()
    {
        $this->setMeta('Login');
    }

    public function logout()
    {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }
        if (isset($_COOKIE['user'])) {
            setcookie('user[id]', null, time() - 5, '/');
            setcookie('user[login]', null, time() - 5, '/');
            setcookie('user[email]', null, time() - 5, '/');
            setcookie('user[name]', null, time() - 5, '/');
            setcookie('user[role]', null, time() - 5, '/');
        }
        redirect();
    }
}
<?php

namespace App\Controllers;

use App\Models\User;
use FW\App;
use RedBeanPHP\R;

class UserController extends BaseController
{
    /**
     * Страница регистрации нового пользователя
     */
    public function register()
    {
        $currency = $this->currency;
        $categories = App::$app->getProperty('categories');
        $this->setMeta('Register');
        $this->setData(compact('currency', 'categories'));
    }

    /**
     * Авторизировать пользователя
     */
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

    /**
     * Зарегистрировать нового пользователя
     */
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

    /**
     * Страница авторизации пользователя
     */
    public function login()
    {
        $currency = $this->currency;
        $categories = App::$app->getProperty('categories');
        $this->setMeta('Login');
        $this->setData(compact('currency', 'categories'));
    }

    /**
     * Выход из учетной записи пользователя
     */
    public function logout()
    {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }
        if (isset($_COOKIE['user'])) {
            setcookie('user[id]', null, time() - 5, '/');
            setcookie('user[login]', null, time() - 5, '/');
            setcookie('user[email]', null, time() - 5, '/');
            setcookie('user[address]', null, time() - 5, '/');
            setcookie('user[name]', null, time() - 5, '/');
            setcookie('user[role]', null, time() - 5, '/');
        }
        redirect('/');
    }

    /**
     * Страница профиля пользователя
     */
    public function profile()
    {
        $user = isset($_COOKIE['user']) ? $_COOKIE['user'] : isset($_SESSION['user']) ? $_SESSION['user'] : null;
        if (! $user) redirect();
        $currency = $this->currency;
        $categories = App::$app->getProperty('categories');
        $user = R::findOne('users', 'login = ? AND email = ?', [$user['login'], $user['email']]);
        $this->setMeta('DarkLook | ' . $user->name);
        $this->setData(compact('user', 'categories', 'currency'));
    }

    public function changeProfile()
    {
        $userData = isset($_COOKIE['user']) ? $_COOKIE['user'] : isset($_SESSION['user']) ? $_SESSION['user'] : null;
        if (! $userData) redirect();
        $data = $_POST;

        if (! empty($data)) {
            $userModel = new User();
            $userModel->load($data);
            $userModel->setRules([
                'lengthMin' => [
                    ['login', 4],
                    ['name', 3]
                ],
                'email' => [
                    ['email']
                ]
            ]);

            if (!$userModel->validate($data) || !$userModel->checkUserData($userData, $data)) {
                $userModel->setErrors();
                $userModel->setOld($data);

            } else {
                if (empty($userModel->attributes['password'])) {
                    unset($userModel->attributes['password']);
                } else {
                    $userModel->attributes['password'] = password_hash($data['confirm-password'], 1);
                }
                $user = $userModel->update('users', $userData['id']);
                $userModel->success('Профиль успешно обновлен!');
                $userModel->setUserData($user);
                echo json_encode(2);
                die;
            }

            if ($this->isAjax()) {
                $this->loadView('profile_tpl');
            }
            redirect();
        }


    }
}
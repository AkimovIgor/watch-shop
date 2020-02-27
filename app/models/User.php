<?php

namespace App\Models;

use RedBeanPHP\R;

class User extends BaseModel
{
    /**
     * @var array Массив атрибутов
     */
    public $attributes = [
        'login' => '',
        'password' => '',
        'email' => '',
        'name' => '',
        'address' => '',
        'role' => 1,
    ];

    /**
     * @var array Массив валидационных правил
     */
    public $rules = [
        'required' => [
            ['login'], 
            ['password'], 
            ['confirm-password'],
            ['email'], 
            ['name'], 
            ['address']
        ],
        'email' => [
            ['email']
        ],
        'lengthMin' => [
            ['password', 6]
        ],
        'equals' => [
            ['password', 'confirm-password']
        ]
    ];

    /**
     * Проверить уникальность пользователя
     *
     * Проверить, существует ли пользователь с таким логином или email
     *
     * @return bool
     */
    public function checkUnique()
    {
        $user = R::findOne('users', 'login = ? OR email = ?', [$this->attributes['login'], $this->attributes['email']]);
        if ($user) {
            if ($user->login == $this->attributes['login']) {
                $this->errors['login'][] = 'Такой логин уже занят';
            }
            if ($user->email == $this->attributes['email']) {
                $this->errors['email'][] = 'Такой email уже занят';
            }
            return false;
        }
        return true;
    }

    /**
     * Проверить, существует ли пользователь
     *
     * Проверить, совпадает ли логин и пароль
     *
     * @return bool|object
     */
    public function checkUser()
    {
        $user = R::findOne('users', 'login = ?', [$this->attributes['login']]);
        if ($user && password_verify($this->attributes['password'], $user->password)) {
            return $user;
        } else {
            $this->errors['login'][] = 'Неверный логин или пароль';
            return false;
        }
    }

    public function checkUserData($user, $data)
    {

        foreach ($data as $key => $val) {
            if ($key != 'password' && $key != 'confirm-password') {
                if (empty($data[$key])) {
                    $this->attributes[$key] = $user[$key];
                }
            }
        }
        if(!empty($data['password']) && empty($data['confirm-password'])) {
            $this->errors['confirm-password'][] = "Введите новый пароль";
            return false;
        }
        if(empty($data['password']) && !empty($data['confirm-password'])) {
            $this->errors['password'][] = "Введите старый пароль";
            return false;
        }
        $currUser = R::findOne('users', 'login = ?', [$user['login']]);
        if(!empty($data['password']) && !password_verify($this->attributes['password'], $currUser->password)) {
            $this->errors['password'][] = "Неверный старый пароль";
            return false;
        }
        return true;
    }

    /**
     * Запомнить пользователя
     *
     * Записать данные пользователя в сессию
     * Если отмечен чекбокс "Запомнить меня", записать данные пользователя в куки
     *
     * @param object|array $user Данные пользователя
     * @param bool $remember Статус чекбокса
     */
    public function setUserData($user, $remember = false)
    {
        $_SESSION['user']['id'] = $user->id;
        $_SESSION['user']['name'] = $user->name;
        $_SESSION['user']['login'] = $user->login;
        $_SESSION['user']['email'] = $user->email;
        $_SESSION['user']['address'] = $user->address;
        $_SESSION['user']['role'] = $user->role;
        if ($remember) {
            setcookie('user[id]', $user->id, time() + 3600, '/');
            setcookie('user[name]', $user->name, time() + 3600, '/');
            setcookie('user[login]', $user->login, time() + 3600, '/');
            setcookie('user[email]', $user->email, time() + 3600, '/');
            setcookie('user[address]', $user->address, time() + 3600, '/');
            setcookie('user[role]', $user->role, time() + 3600, '/');
        }
    }
}
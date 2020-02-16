<?php

namespace App\Models;

use RedBeanPHP\R;

class User extends BaseModel
{
    public $attributes = [
        'login' => '',
        'password' => '',
        'email' => '',
        'name' => '',
        'address' => '',
        'role' => 1,
    ];

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

    public function setUserData($user, $remenber = false)
    {
        $_SESSION['user']['id'] = $user->id;
        $_SESSION['user']['name'] = $user->name;
        $_SESSION['user']['login'] = $user->login;
        $_SESSION['user']['email'] = $user->email;
        $_SESSION['user']['role'] = $user->role;
        if ($remenber) {
            setcookie('user[id]', $user->id, time() + 3600, '/');
            setcookie('user[name]', $user->name, time() + 3600, '/');
            setcookie('user[login]', $user->login, time() + 3600, '/');
            setcookie('user[email]', $user->email, time() + 3600, '/');
            setcookie('user[role]', $user->role, time() + 3600, '/');
        }
    }
}
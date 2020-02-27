<?php

namespace FW\Base;

use FW\Database\Db;
use RedBeanPHP\R;
use Valitron\Validator;

abstract class Model
{
    public $attributes = [];     // массив атрибутов модели, соответствующих полям в БД
    public $errors = [];         // массив ошибок
    public $rules = [];          // массив валидационных правил

    public function __construct()
    {
        Db::getInstance();
    }

    /**
     * Загрузить данные в модель
     *
     * Заполнить данными атрибуты модели
     *
     * @param array $data Масси данных
     */
    public function load($data)
    {
        foreach($data as $name => $value) {
            if (isset($this->attributes[$name])) {
                $this->attributes[$name] = $value;
            }
        }
    }

    /**
     * Установить валидационные правила для полей
     *
     * @param array $rules Массив валидационных правил
     */
    public function setRules(array $rules = [])
    {
        if ($rules) {
            $this->rules = $rules;
        }
    }

    /**
     * Валидировать данные
     *
     * @param array $data Массив данных
     * @return bool
     */
    public function validate($data)
    {
        $v = new Validator($data);
        
        $v->rules($this->rules);
        if ($v->validate()) {
            return true;
        }
        $this->errors = $v->errors();
        return false;
    }

    /**
     * Установить ошибки
     *
     * Записать в сессию массив ошибок
     */
    public function setErrors()
    {
        $_SESSION['errors'] = $this->errors;
    }

    /**
     * Установить сообщение об успехе
     *
     * @param string $message Текст сообщения
     */
    public function success($message = '')
    {
        $_SESSION['success'] = $message;
    }

    /**
     * Установить старое значение поля
     *
     * @param mixed $data Данные поля
     */
    public function setOld($data)
    {
        $_SESSION['old'] = $data;
    }

    /**
     * Сохранить нового пользователя в БД
     *
     * @param $table
     * @throws \RedBeanPHP\RedException\SQL
     */
    public function save($table)
    {
        $user = R::dispense($table);
        foreach($this->attributes as $name => $value) {
            if ($name != 'remember' || $name != 'confirm-password') {
                $user->$name = $value;
            }
        }
        R::store($user);
    }

    public function update($table, $id)
    {
        $user = R::load($table, $id);
        foreach($this->attributes as $name => $value) {
            if ($name != 'remember' || $name != 'confirm-password') {
                $user->$name = $value;
            }
        }
        R::store($user);
        return $user;
    }
}
<?php

namespace FW\Base;

use FW\Database\Db;
use RedBeanPHP\R;
use Valitron\Validator;

abstract class Model
{
    public $attributes = [];
    public $errors = [];
    public $rules = [];

    public function __construct()
    {
        Db::getInstance();
    }

    public function load($data)
    {
        foreach($data as $name => $value) {
            if (isset($this->attributes[$name])) {
                $this->attributes[$name] = $value;
            }
        }
    }

    public function setRules(array $rules = [])
    {
        if ($rules) {
            $this->rules = $rules;
        }
    }   

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

    public function setErrors()
    {
        $_SESSION['errors'] = $this->errors;
    }

    public function success($message = '')
    {
        $_SESSION['success'] = $message;
    }

    public function setOld($data)
    {
        $_SESSION['old'] = $data;
    }

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
}
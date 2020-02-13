<?php

namespace FW;

use FW\Traits\SingletonTrait;

class Registry
{
    // подключение Singleton
    use SingletonTrait;

    /**
     * @var array Контейнер свойств
     */
    private $properties = [];

    /**
     * Установить свойство
     *
     * @param  string $name Имя свойства
     * @param  mixed $value Значение свойства
     *
     * @return void
     */
    public function setProperty($name, $value)
    {
        $this->properties[$name] = $value;
    }

    /**
     * Получить свойство
     *
     * @param  string $name Имя свойства
     *
     * @return mixed
     */
    public function getProperty($name)
    {
        if (! empty($this->properties[$name])) {
            return $this->properties[$name];
        }
        return null;
    }

    /**
     * Получить все свойства
     *
     * @return array
     */
    public function getAllProperties()
    {
        return $this->properties;
    }
}
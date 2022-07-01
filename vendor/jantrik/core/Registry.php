<?php

namespace jantrik;

class Registry{

    use TSingletone;

    protected static $properties = [];

    // Сохраним в свойство ключ и значения, переданные в агрумент
    public function setProperty($name, $value) {
        self::$properties[$name] = $value;
    }

    // Если ключ в свойство существует, тогда мы его возвращаем, в противном - вернем null
    public function getProperty($name) {
        if (isset(self::$properties[$name])) {
            return self::$properties[$name];
        }

        return null;
    }

    // Метод распечатывает свойство
    public function getProperties() {
        return self::$properties;
    }
}
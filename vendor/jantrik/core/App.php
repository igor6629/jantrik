<?php

namespace jantrik;

class App {

    public static $app;

    public function __construct() {
        // Уберём символ / в адресной строке
        $query = trim($_SERVER['QUERY_STRING'], '/');

        // Откроем сессию
        session_start();

        // Вызовем класс Registry
        self::$app = Registry::insctance();

        // Вызовем метод с параметрами сайта
        $this->getParams();

        // Вызовем класс обработки ошибок
        new ErrorHandler();

        // Вызовем класс маршрутизации
        Router::dispatch($query);
    }

    // Будем получать наши параметры
    protected function getParams() {
        $params = require_once CONFIG . '/params.php';

        // Возьмём все значения из подключаемого файла
        if (!empty($params)) {
            foreach ($params as $k => $v) {
                self::$app->setProperty($k, $v);
            }
        }
    }
}
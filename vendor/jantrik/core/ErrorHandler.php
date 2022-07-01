<?php

namespace jantrik;

// Класс обработки ошибок
class ErrorHandler {

    public function __construct() {
        if (DEBUG){
            // Показать ошибки
            error_reporting(-1);
        }else{
            // Скрыть ошибки
            error_reporting(0);
        }

        set_exception_handler([$this, 'exceptionHandler']);
    }

    // Обработка перехваченных исключений
    public function exceptionHandler($e) {
        $this->logErrors($e->getMessage(), $e->getFile(), $e->getLine());
        $this->displayError('Исключение', $e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode());
    }

    // Логирование ошибок и отправки сообщения в файл
    protected function logErrors($message = '', $file = '', $line = '') {
        error_log("[" . date('Y-m-d H:i:s') . "] Текст ошибки: {$message} | Файл: {$file}, | Строка: {$line}\n=======================\n", 3, ROOT . '/tmp/errors.log');
    }

    // Вывод страницы с ошибкой
    protected function displayError($errno, $errstr, $errfile, $errline, $responce = 404) {
        http_response_code($responce);

        if ($responce == 404 && !DEBUG) {
            require_once WWW . '/errors/404.php';
            die;
        }

        if (DEBUG) {
            require_once WWW . '/errors/dev.php';
        }else {
            require_once WWW . '/errors/prod.php';
        }

        die;
    }
}
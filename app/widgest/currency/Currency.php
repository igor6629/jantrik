<?php

namespace app\widgest\currency;

use jantrik\App;

class Currency {
    // Шаблон вывода выподающего списка
    protected $tpl;

    // Список всех доступных валют
    protected $currencies;

    // Активная валюта
    protected $currency;

    public function __construct() {
        $this->tpl = __DIR__ . '/currency_tpl/currency.php';
        $this->run();
    }

    // Принимает список полученных валют и активную валюту
    protected function run() {
        $this->currencies = App::$app->getProperty('currencies');
        $this->currency = App::$app->getProperty('currency');

        echo $this->getHtml();
    }

    // Получает все валюты из таблицы
    public static function getCurrencies() {
        return \R::getAssoc("SELECT code, title, symbol_left, symbol_right, value, base FROM currency ORDER BY base DESC");
    }

    // Получает активную валюту
    public static function getCurrency($currencies) {
        // Если существует в Куках активная валюта и (сущ. в массиве некий эл-нт)
        if (isset($_COOKIE['currency']) && array_key_exists($_COOKIE['currency'],$currencies)) {
            $key = $_COOKIE['currency'];
        }else {
            // key() вернёт текущий элемент массива
           $key = key($currencies);
        }

        // Сохраним массив текущей валюты в переменную
        $currency = $currencies[$key];
        $currency['code'] = $key;

        return $currency;
    }

    // Получает и формирует html разметку
    protected function getHtml() {
        ob_start();
        require_once $this->tpl;
        return ob_get_clean();
    }
}
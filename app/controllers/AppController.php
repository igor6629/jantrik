<?php

namespace app\controllers;

use app\models\AppModel;
use app\widgest\currency\Currency;
use jantrik\App;
use jantrik\base\Controller;
use jantrik\Cache;
use Valitron\Validator;

class AppController extends Controller {

    // Создадим объект Модели
    public function __construct($route) {
        parent::__construct($route);
        new AppModel();

        // Вызовем метод получения валюты
        App::$app->setProperty('currencies', Currency::getCurrencies());
        App::$app->setProperty('currency', Currency::getCurrency(App::$app->getProperty('currencies')));

        // Заполним кэш
        App::$app->setProperty('cats', self::cacheCategory());

        // Валидация кириллицы
        Validator::addRule('alpharu', function ($field, $value) {
            return preg_match('/^[а-яё]+$/iu', $value);
        }, 'должно содержать только кириллицу');
    }

    // Закэшировать не только меню, но и категории
    public static function cacheCategory() {
        // Создаём объект кэша
        $cache = Cache::insctance();
        $cats = $cache->get('cats');

        // Если ничего не получили, тогда получим из БД
        if (!$cats) {
            $cats = \R::getAssoc("SELECT * FROM category");
            $cache->set('cats', $cats);
        }

        return $cats;
    }
}
<?php

namespace app\models;

use jantrik\App;
use Valitron\Validator;

class Cart extends AppModel {

    // Массив свойств модели
    public $attributes = [
        'name' => '',
        'lastname' => '',
        'email' => '',
        'address' => '',
    ];

    // Массив правил
    public $rules = [
        'required' => [  // Обязательное заполнение
            ['name'],
            ['lastname'],
            ['email'],
            ['address'],
        ],
        'email' => [  // Проверка email
            ['email'],
        ],
        'alpharu' => [
            ['name'],
            ['lastname'],
        ]
    ];

    // Массив названий полей
    public $names = [
        'name' => 'Имя',
        'lastname' => 'Фамилия',
        'email' => 'E-Mail',
        'address' => 'Адрес',
    ];

    // Метод работы с корзиной
    public function addToCart($product, $qty = 1, $mod = null) {
        // Если нет такой сессии, то создадим её
        if (!isset($_SESSION['cart.currency'])) {
            $_SESSION['cart.currency'] = App::$app->getProperty('currency');
        }

        // Если выбрана модификация, то возьмём её значения
        if ($mod) {
            $ID = "{$product->id}-{$mod->id}";
            $title = "{$product->title} ({$mod->title})";
            $price = $mod->price;
        // Иначе, возьмём значения товара
        } else {
            $ID = $product->id;
            $title = $product->title;
            $price = $product->price;
        }

        // Если в корзину добавили товар, который там уже есть - прибавляем его количество
        if (isset($_SESSION['cart'][$ID])) {
            $_SESSION['cart'][$ID]['qty'] += $qty;
        } else {
            // Добавление товара в сессию
            $_SESSION['cart'][$ID] = [
              'qty' => $qty,
              'title' => $title,
              'alias' => $product->alias,
              'price' => $price * $_SESSION['cart.currency']['value'],
              'img' => $product->img,
            ];
        }

        $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty'] + $qty : $qty;
        $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $qty * ($price * $_SESSION['cart.currency']['value']) : $qty * ($price * $_SESSION['cart.currency']['value']);
    }

    // Удаление из корзины
    public function deleteItem($id) {
        $qtyMinus = $_SESSION['cart'][$id]['qty'];
        $sumMinus = $_SESSION['cart'][$id]['qty'] * $_SESSION['cart'][$id]['price'];
        $_SESSION['cart.qty'] = $_SESSION['cart.qty'] - $qtyMinus;
        $_SESSION['cart.sum'] = $_SESSION['cart.sum'] - $sumMinus;

        unset($_SESSION['cart'][$id]);
    }

    // Пересчёт валюты в корзине
    public static function recalc($curr) {
        // Меняем итоговую сумму
        if (isset($_SESSION['cart.currency'])) {
            if ($_SESSION['cart.currency']['base']) {
                $_SESSION['cart.sum'] = $_SESSION['cart.sum'] * $curr->value;
            } else {
                $_SESSION['cart.sum'] = $_SESSION['cart.sum'] / $_SESSION['cart.currency']['value'] * $curr->value;
            }

            // Меняем цену каждого товара
            foreach ($_SESSION['cart'] as $k => $v) {
                if ($_SESSION['cart.currency']['base']){
                    $_SESSION['cart'][$k]['price'] *= $curr->value;
                }else {
                    $_SESSION['cart'][$k]['price'] = $_SESSION['cart'][$k]['price'] / $_SESSION['cart.currency']['value'] * $curr->value;
                }
            }

            // Меняем в сессии
            foreach ($curr as $k => $v) {
                $_SESSION['cart.currency'][$k] = $v;
            }
        }
    }

    // Проверка статуса пользователя
    public static function isAdmin() {
        return (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin');
    }

    // Проверка авторизации
    public static function checkAuth() {
        return isset($_SESSION['user']);
    }
}
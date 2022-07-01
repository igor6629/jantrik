<?php

namespace app\controllers;

use app\models\Cart;

class CurrencyController extends AppController {

    public function changeAction() {
        // Если не пуст _GET_ тогда возьмём его значения, иначе запишем null
        $currency = !empty($_GET['curr']) ? $_GET['curr'] : null;

        if ($currency) {
            $curr = \R::findOne('currency', 'code = ?', [$currency]);

            // Если не пуст $curr, запишем эту валюту в Куки
            if (!empty($curr)) {
                setcookie('currency', $currency, time() + 3600*24*7, '/');
                Cart::recalc($curr);
            }
        }

        redirect();
    }
}
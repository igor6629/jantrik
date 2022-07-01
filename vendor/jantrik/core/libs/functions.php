<?php

    function debug($arr, $die = false) {
        echo '<pre>' . print_r($arr, true) . '</pre>';
        if ($die) die;
    }

    // Функция перезагрузки
    function redirect($http = false) {
        if ($http) {
            $redirect = $http;
        }else {
            $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
        }

        header("Location: $redirect");
        exit;
    }

    // Цена для объекта
    function price($param, $curr =[]) { ?>
       <p><span class="price" id="base-price" data-base="<?=$param->price * $curr['value']?>"><?=$curr['symbol_left']?><?=$param->price * $curr['value']?><?=$curr['symbol_right']?></span>
    <?php if ($param->old_price):?>
            <del class="prev-price"><?=$curr['symbol_left']?><?=$param->old_price * $curr['value']?><?=$curr['symbol_right']?></del></p>
        <?php endif;
    };

    // Цена для массива
    function priceForArray($param, $curr =[]){ ?>
        <p><span class="price"><?=$curr['symbol_left']?><?=$param['price'] * $curr['value']?><?=$curr['symbol_right']?></span>
        <?php if($param['old_price']):?>
            <del class="prev-price"><?=$param['old_price'] * $curr['value']?></del></p>
        <?php endif;
    };

    // Скидка в % для объекта
    function discount($param){
        if ($param->old_price):
            $discount = ($param->old_price - $param->price) / ($param->old_price / 100);?>
            <span class="sticker-new">-<?=round($discount, 0)?>%</span>
        <?php endif;
    }

    // Скидка в % для объекта
    function discountForArray($param){
        if ($param['old_price']):
            $discount = ($param['old_price'] - $param['price']) / ($param['old_price'] / 100);?>
            <span class="sticker-new">-<?=round($discount, 0)?>%</span>
        <?php endif;
    }

    // htmlspecialchars - безопасность сайта
    function h($str){
        return htmlspecialchars($str, ENT_QUOTES);
    }
    // Рейтинг товара
    function rating($param) {
        if ($param) : ?>
        <div class="rating">
            <div class="rating__body">
                <div class="rating__active">
                    <div class="rating__items">
                        <input type="radio" class="rating__item" value="1" name="rating">
                        <input type="radio" class="rating__item" value="2" name="rating">
                        <input type="radio" class="rating__item" value="3" name="rating">
                        <input type="radio" class="rating__item" value="4" name="rating">
                        <input type="radio" class="rating__item" value="5" name="rating">
                    </div>
                </div>
                <div class="rating__value pl-0"><span class="rating__value_int"><?= $param->rating != NULL ? $param->rating : 0 ;?></span></div>
            </div>
        <?php endif;
    }

    // Рейтинг товара для массива
    function ratingForArray($param) {
        if ($param) : ?>
            <div class="rating">
            <div class="rating__body">
                <div class="rating__active">
                    <div class="rating__items">
                        <input type="radio" class="rating__item" value="1" name="rating">
                        <input type="radio" class="rating__item" value="2" name="rating">
                        <input type="radio" class="rating__item" value="3" name="rating">
                        <input type="radio" class="rating__item" value="4" name="rating">
                        <input type="radio" class="rating__item" value="5" name="rating">
                    </div>
                </div>
                <div class="rating__value pl-0"><span class="rating__value_int"><?= $param['rating'] != NULL ? $param['rating'] : 0 ;?></span></div>
            </div>
        <?php endif;
    }

    // Количество товаров в заказе (аккаунт пользователя)
    function countProducts($id) {
        $count_products = R::count('order_product', 'order_id = ?', [$id]);
        return $count_products;
    }

    // Title товара в отзывах (Admin)
    function titleProduct($id) {
        $product = \R::findOne('product', 'id = ?', [$id]);
        return $product;
    }

    // Случайный код для восстановления пароля
    function random_number($length = 6) {
        $arr = array(
            '1', '2', '3', '4', '5', '6', '7', '8', '9', '0'
        );

        $res = '';
        for ($i = 0; $i < $length; $i++) {
            $res .= $arr[random_int(0, count($arr) - 1)];
        }
        return $res;
    }







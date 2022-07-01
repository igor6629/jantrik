<?php

namespace app\models;

use jantrik\App;

class Wishlist extends AppModel {

    public function addToWishlist($product) {
        // Если нет такой сессии, то создадим её
        if (!isset($_SESSION['wishlist'])) {
            $_SESSION['wishlist'] = App::$app->getProperty('wishlist');
        }

        $id = $product->id;
        $title = $product->title;
        $price = $product->price;
        $old_price = $product->old_price;
        $alias = $product->alias;
        $img = $product->img;
        $status = $product->status;

        // Добавление товара в сессию
        $_SESSION['wishlist'][$id] = [
            'id' => $id,
            'title' => $title,
            'price' => $price,
            'old_price' => $old_price,
            'img' => $img,
            'alias' => $alias,
            'status' => $status,
        ];
    }

    public function deleteItem($id) {
        unset($_SESSION['wishlist'][$id]);
    }
}
<?php

namespace app\models;

use jantrik\App;

class Compare extends AppModel {

    public function addToCompare($product) {
        // Если нет такой сессии, то создадим её
        if (!isset($_SESSION['compare'])) {
            $_SESSION['compare'] = App::$app->getProperty('compare');
        }

        $id = $product->id;
        $title = $product->title;
        $price = $product->price;
        $old_price = $product->old_price;
        $alias = $product->alias;
        $img = $product->img;
        $status = $product->status;
        $description = $product->description;
        $rating = $product->rating;

        // Добавление товара в сессию
        $_SESSION['compare'][$id] = [
            'id' => $id,
            'title' => $title,
            'price' => $price,
            'old_price' => $old_price,
            'img' => $img,
            'alias' => $alias,
            'status' => $status,
            'description' => $description,
            'rating' => $rating,
        ];
    }

    public function deleteItem($id) {
        unset($_SESSION['compare'][$id]);
    }

}
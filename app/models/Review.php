<?php

namespace app\models;

use jantrik\App;
use Valitron\Validator;

class Review extends AppModel {

    // Массив свойств модели
    public $attributes = [
        'name' => '',
        'theme' => '',
        'message' => '',
    ];

    // Массив правил
    public $rules = [
        'required' => [  // Обязательное заполнение
            ['name'],
            ['theme'],
            ['message'],
        ],
        'alpharu' => [
            ['name'],
        ]
    ];

    // Массив названий полей
    public $names = [
        'name' => 'Имя',
        'theme' => 'Тема',
        'message' => 'Сообщение',

    ];

    public function saveReview($data) {
        $review = \R::dispense('review');

        // Заполняем данными таблицу
        $review->product_id = $data['product_id'];
        $review->user_id = $data['user_id'];
        $review->quality = $data['simple-rating_quality'];
        $review->price = $data['simple-rating_price'];
        $review->delivery = $data['simple-rating_delivery'];
        $review->general = ($review->delivery + $review->price + $review->quality) / 3;
        $review->name = !empty(trim(h($data['name']))) ? trim(h($data['name'])) : null;
        $review->theme = !empty(trim(h($data['theme']))) ? trim(h($data['theme'])) : null;
        $review->message = !empty(trim(h($data['message']))) ? trim(h($data['message'])) : null;

        // Заполним таблицу отзыва товара
        \R::store($review);

        // Обновление общей оценки
        \R::exec("UPDATE `product` SET rating = (SELECT AVG(general) FROM `review` WHERE product_id = $review->product_id) WHERE id = $review->product_id");
    }
}
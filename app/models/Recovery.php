<?php

namespace app\models;

use jantrik\App;

class Recovery extends AppModel {

    // Массив свойств модели
    public $attributes = [
        'password' => '',
    ];

    // Массив правил
    public $rules = [
        'required' => [  // Обязательное заполнение
            ['password'],
            ['password-confirm'],
        ],
        'lengthMin' => [  // Мин кол-во символов
            ['password', 8],
        ],
        'equals' => [
            ['password-confirm', 'password']
        ],
        'ascii' => [
            ['password']
        ]
    ];

    // Массив названий полей
    public $names = [
        'password' => 'Пароль',
        'password-confirm' => 'Повторный пароль',
    ];
}
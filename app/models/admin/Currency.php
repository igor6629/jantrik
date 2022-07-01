<?php

namespace app\models\admin;

use app\models\AppModel;

class Currency extends AppModel {

    // Аттрибуты модели
    public $attributes = [
      'title' => '',
      'code' => '',
      'symbol_left' => '',
      'symbol_right' => '',
      'value' => '',
      'base' => '',
    ];

    // Правила валидации
    public $rules = [
        'required' => [
            ['title'],
            ['code'],
            ['value'],
        ],
        'numeric' => [
            ['value'],
        ],
    ];
}
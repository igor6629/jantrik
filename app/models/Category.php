<?php

namespace app\models;

use jantrik\App;

class Category extends AppModel {

    // Массив аттрибутов
    public $attributes = [
        'title' => '',
        'parent_id' => '',
        'keywords' => '',
        'description' => '',
        'alias' => '',
    ];
    // Набор правил
    public $rules = [
        'required' => [
            'title',
            'alias'
        ]
    ];

    // Получение id вложенной категории
    public function getIds($id) {
        // Получаем массив со всеми категориями
        $cats = App::$app->getProperty('cats');
        $ids = null;

        foreach ($cats as $k => $v) {
            if ($v['parent_id'] == $id) {
                $ids .= $k . ',';
                $ids .= $this->getIds($k);
            }
        }

        return $ids;
    }
}
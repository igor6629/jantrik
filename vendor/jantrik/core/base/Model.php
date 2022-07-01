<?php

namespace jantrik\base;

use jantrik\Db;
use Valitron\Validator;

abstract class Model {

    // Массив свойств модели
    public $attributes = [];

    // Массив с ошибками
    public $errors = [];

    // Массив с правилами для валидации
    public $rules = [];

    // Массив для наименования полей
    public $names = [];

    public function __construct() {
        Db::insctance();
    }

    // Загружает данные из формы в модель
    public function load($data) {
        foreach ($this->attributes as $name => $value) {
            if (isset($data[$name])) {
                $this->attributes[$name] = $data[$name];
            }
        }
    }

    // Сохранение введённых данных
    public function save($table) {
        $tbl = \R::dispense($table);

        foreach ($this->attributes as $name => $value) {
            $tbl->$name = $value;
        }

        return \R::store($tbl);
    }

    // Обновление записи в таблице
    public function update($table, $id) {
        $bean = \R::load($table, $id);

        foreach ($this->attributes as $name => $value) {
            $bean->$name = $value;
        }

        return \R::store($bean);
    }

    // Валидация данных
    public function validate($data) {
        Validator::langDir(WWW . '/validator/lang');
        Validator::lang('ru');

        $v = new Validator($data);

        // Передача правил
        $v->rules($this->rules);

        // Переименование полей
        $v->labels($this->names);

        if ($v->validate()) {
            return true;
        }

        $this->errors = $v->errors();
        return false;
    }

    // Получаем ошибки
    public function getErrors() {
        $errors = '<ul>';

        foreach ($this->errors as $error) {
            foreach ($error as $item) {
                $errors .= "<li>$item</li>";
            }
        }

        $errors .= '</ul>';
        $_SESSION['error'] = $errors;
    }
}
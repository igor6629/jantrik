<?php

namespace app\models\admin;

class User extends \app\models\User {

    // Массив свойств модели
    public $attributes = [
        'id' => '',
        'login' => '',
        'name' => '',
        'email' => '',
        'address' => '',
        'password' => '',
        'role' => '',
    ];

    // Массив правил
    public $rules = [
        'required' => [  // Обязательное заполнение
            ['login'],
            ['name'],
            ['email'],
            ['role'],
        ],
        'email' => [  // Проверка email
            ['email'],
        ],
        'lengthMin' => [  // Мин кол-во символов
            ['login', 6],
            ['password', 8],
        ],
    ];

    // Массив названий полей
    public $names = [
        'login' => 'Логин',
        'name' => 'Имя',
        'email' => 'E-Mail',
        'address' => 'Адрес',
        'password' => 'Пароль',
        'password-confirm' => 'Повторный пароль',
    ];

    // Проверка на повторение полей
    public function checkUnique() {
        $user = \R::findOne('user', '(login = ? OR email = ?) AND id <> ?', [$this->attributes['login'], $this->attributes['email'], $this->attributes['id']]);

        if ($user) {
            if ($user->login == $this->attributes['login']) {
                $this->errors['unique'][] = 'Этот логин уже занят';
            }

            if ($user->email == $this->attributes['email']) {
                $this->errors['unique'][] = 'Этот E-mail уже занят';
            }

            return false;
        }

        return true;
    }

}
<?php

namespace app\models;

class EditUser extends \app\models\admin\User {
    // Массив свойств модели
    public $attributes = [
        'id' => '',
        'login' => '',
        'name' => '',
        'email' => '',
        'address' => '',
        'password' => '',
        'newpassword' => '',
        'c-password' => '',
        'role' => '',
    ];

    // Массив правил
    public $rules = [
        'alpharu' => [
            ['name'],
        ],
        'alphaNum' => [
            ['login'],
        ],
        'required' => [  // Обязательное заполнение
            ['login'],
            ['name'],
            ['address'],
            ['email'],
            ['role'],
        ],
        'email' => [  // Проверка email
            ['email'],
        ],
        'lengthMin' => [  // Мин кол-во символов
            ['login', 6],
            ['password', 8],
            ['newpassword', 8],
            ['address', 10],
            ['c-password', 8],
        ],
        'equals' => [
            ['newpassword', 'c-password'],
            ['c-password', 'newpassword']
        ],
        'ascii' => [
            ['newpassword']
        ]
    ];

    // Массив названий полей
    public $names = [
        'login' => 'Логин',
        'name' => 'Имя',
        'email' => 'E-Mail',
        'address' => 'Адрес',
        'password' => 'Пароль',
        'newpassword' => 'Новый пароль',
        'c-password' => 'Подтверждение пароля'
    ];

    public function checkPassword($user, $login) {
        $account = \R::findOne('user', "login = ?", [$login]);

        // Если нашли логин, тогда проверим пароль
        if ($account) {
            if (password_verify($user->attributes['password'], $account->password))
            {
                if ($user->attributes['newpassword'] && $user->attributes['c-password'])
                {
                    if ($user->attributes['newpassword'] == $user->attributes['c-password'])
                    {
                        return true;
                    }
                    else
                    {
                        return false;
                    }
                }
                else
                {
                    return false;
                }
            }
        }

        return false;
    }
}
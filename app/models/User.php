<?php

namespace app\models;

use jantrik\App;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class User extends AppModel {

    // Массив свойств модели
    public $attributes = [
        'login' => '',
        'name' => '',
        'email' => '',
        'address' => '',
        'password' => '',
        'role' => 'user',
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
          ['email'],
          ['address'],
          ['password'],
          ['password-confirm'],
        ],
        'email' => [  // Проверка email
            ['email'],
        ],
        'lengthMin' => [  // Мин кол-во символов
            ['login', 6],
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
        'login' => 'Логин',
        'name' => 'Имя',
        'email' => 'E-Mail',
        'address' => 'Адрес',
        'password' => 'Пароль',
        'password-confirm' => 'Повторный пароль',
    ];

    // Проверка на повторение полей
    public function checkUnique() {
        $user = \R::findOne('user', 'login = ? OR email = ?', [$this->attributes['login'], $this->attributes['email']]);

        if ($user) {
            if ($user->login == $this->attributes['login']){
                $this->errors['unique'][] = 'Этот логин уже занят';
            }
            if ($user->email == $this->attributes['email']){
                $this->errors['unique'][] = 'Этот E-mail уже занят';
            }

            return false;
        }

        return true;
    }

    // Проверка логина, админ авторизуется или пользователь
    public function login($isAdmin = false) {
        // Получим данные пользователя и найдем в базе
        $login = !empty(trim($_POST['login'])) ? trim($_POST['login']) : null;
        $password = !empty(trim($_POST['password'])) ? trim($_POST['password']) : null;

        // Если нашли логин и пароль, тогда
        if ($login && $password) {
            // Если это админ, тогда авторизируем его (поле должно быть admin)
            if ($isAdmin) {
                $user = \R::findOne('user', "login = ? AND role = 'admin'", [$login]);
            } else { // Если обычный пользователь, достанем его логин из БД
                $user = \R::findOne('user', "login = ?", [$login]);
            }

            // Если нашли логин, тогда проверим пароль
            if ($user) {
                if (password_verify($password, $user->password)) {
                    // Занесём данные в сессию
                    foreach ($user as $k => $v) {
                        if ($k != 'password') $_SESSION['user'][$k] = $v;
                    }

                    return true;
                }
            }
        }

        return false;
    }

    // Проверяет, авторизован ли пользователь
    public static function checkAuth() {
        return isset($_SESSION['user']);
    }

    // Проверяет роль пользователя
    public static function isAdmin() {
        return (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin' );
    }

    // Восстановление пароля
    public function recoveryPassword() {
        // Получим введённый email пользователя
        $email = !empty(trim($_POST['email'])) ? trim($_POST['email']) : null;

        // Если получили email
        if ($email) {
            // Найдём его в базе данных
            $user = \R::findOne('user', "email = ?", [$email]);

            // Если нашли
            if ($user) {
                $email = $user->email;
                // Занесём в сессию email
                $_SESSION['email'] = $email;
                // Создадим уникальный код и поместим его в сессию
                $_SESSION['code'] = random_number();
                // Создадим время действия кода
                $_SESSION['time'] = time() + 600;

                return true;
            }else {
                $_SESSION['error-recovery'] = 'Данный почтовый адрес не найден';

                return false;
            }
        }
    }

    // Проверка кода
    public static function getCode($time) {
        // Получим введённый код пользователя
        $code = $_POST['code'] ?? '';

        if ($time < $_SESSION['time']) {
            // Если код совпадает с введённым - вернём true
            if ($_SESSION['code'] == $code) {
                return true;
            } else {
                $_SESSION['error-recovery-code'] = 'Код введён неверно';
                return false;
            }
        } else {
            $_SESSION['error-time'] = 'Срок действия кода истёк';
            redirect('recovery');
        }
    }

    public static function sendCode($user_email) {
        // Create the Transport
        $transport = (new Swift_SmtpTransport(App::$app->getProperty('smtp_host'), App::$app->getProperty('smtp_port'), App::$app->getProperty('smtp_protocol')))
            ->setUsername(App::$app->getProperty('smtp_login'))
            ->setPassword(App::$app->getProperty('smtp_password'))
        ;
        // Create the Mailer using your created Transport
        $mailer = new Swift_Mailer($transport);

        // Создание письма
        ob_start();
        require APP . '/views/mail/code.php';
        $body = ob_get_clean();

        // Письмо клиенту
        $message_client = (new Swift_Message("Восстановление пароля"))
            ->setFrom([App::$app->getProperty('smtp_login') => App::$app->getProperty('shop_name')])
            ->setTo($user_email)
            ->setBody($body, 'text/html')
        ;

        $result = $mailer->send($message_client);

        $_SESSION['success']['send-code'] = 'На ваш почтовый адрес был отправлен код для восстановления пароля, срок действия кода - 10 минут';
    }
}